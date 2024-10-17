<?php
    // ini_set('display_errors', 1);
    // error_reporting(E_ALL);

    require_once '../../config.php';



    function manuallyValidateGoogleIdToken($idToken, $clientId) {
        if (isset($idToken)) {
            $id_token = trim($idToken);
            try {
                $res = (new \GuzzleHttp\Client())->request('GET', 'https://www.googleapis.com/oauth2/v3/tokeninfo', ['query' => ['id_token' => $id_token]]);
                $payload = json_decode($res->getBody()->getContents(), true);
                // You still need to check that the aud claim contains one of your app's client IDs
                if ($payload['aud'] !== $clientId) {
                    throw new \Exception("App Isn't valid", 422);
                }
                return $payload;

            } catch (RequestException $e) {
                //IF token isn't valid you will be here
                if ($e->hasResponse()) {
                    /** @var \GuzzleHttp\Psr7\Response $resp */
                    $resp = $e->getResponse();
                    $error = json_decode($resp->getBody()->getContents(), true)['error_description'];
                    throw new \Exception($error, $resp->getStatusCode());
                }
            }
        }
    }




    try {
        $clientId = '263571625126-qfl7rd29j2drnogstmvqiq345plsrugj.apps.googleusercontent.com';
        $clientSecret = 'Y07P7JrKu_yua1Yi3K2u05XP';

        $client = new Google_Client(['client_id' => $clientId]);

        $data = json_decode(file_get_contents('php://input'));


        if (!isset($data->idToken)) {
            throw new Exception('"idToken" parameter not provided');
        }

        $payload = manuallyValidateGoogleIdToken($data->idToken, $clientId);
        $payload = (object) $payload;

        $user = $db->query("SELECT * FROM `mod_members` WHERE `email` = '".$payload->email."'")->fetch();
        if ($user) {
            $db->query("UPDATE `mod_members` SET `google_uid` = '".$payload->sub."' WHERE `id` = ".$user->id);
        } else {
            $imgFilename = 'google_img_'.$payload->sub.'.jpg';
            (new GuzzleHttp\Client())->request(
                'GET',
                $payload->picture,
                ['sink' => fopen(__DIR__.'/../../files/user_pic/'.$imgFilename, 'w')]
            );
            $db->query("
                INSERT INTO `mod_members` (`google_uid`, `email`, `username`, `pass`, `name`, `pic`, `stat`) VALUES (
                    '".$payload->sub."',
                    '".$payload->email."',
                    '".$payload->name."',
                    '--dummy-password--".bin2hex(random_bytes(22))."',
                    '".$payload->name."',
                    '".$imgFilename."',
                    1
                )
            ");
            $user = $db->query("SELECT * FROM `mod_members` WHERE `id` = ".$db->lastInsertId())->fetch();
        }

        $_SESSION['user'] = $user->id.'_'.$user->pass;

        echo json_encode(['isSuccessful' => true, 'memberId' => $user->id]);
    }
    catch (Exception $e) {
        header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error', true, 500);
        $errMsg = $e->getMessage();
        echo json_encode(['isSuccessful' => false, 'error' => $errMsg]);
    }
