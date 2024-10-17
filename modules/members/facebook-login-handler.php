<?php
    // ini_set('display_errors', 1);
    // error_reporting(E_ALL);

    require_once '../../config.php';



    try {
        $appId = '520910498248341';
        $appSecret = 'e0f4a9e1bc61391914de448ef8007f10';

        $data = json_decode(file_get_contents('php://input'));

        $fb = new Facebook\Facebook([
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v2.10'
        ]);

        $accessToken = $data->accessToken;

        try {
            $response = $fb->get('/me/permissions', $accessToken);
        }
        catch (Facebook\Exceptions\FacebookResponseException $e) {
            throw new Exception('Graph returned an error: '.$e->getMessage());
        }
        catch (Facebook\Exceptions\FacebookSDKException $e) {
            throw new Exception('Facebook SDK returned an error: '.$e->getMessage());
        }

        $emailPermission = reset(array_filter($response->getGraphEdge()->asArray(), function($item) {
            return $item['permission'] === 'email';
        }));

        if (!$emailPermission) {
            $e = new Exception('No email permission included at all in this access token');
            $e->errType = 'ERR_NO_EMAIL_PERMISSION';
            throw $e;
        } elseif ($emailPermission['status'] === 'declined') {
            $e = new Exception('Email permission declined in this access token');
            $e->errType = 'ERR_EMAIL_PERMISSION_DECLINED';
            throw $e;
        }

        try {
            $response = $fb->get('/me?fields=id,name,email', $accessToken); // Returns a `Facebook\FacebookResponse` object
        }
        catch (Facebook\Exceptions\FacebookResponseException $e) { // When Graph returns an error
            throw new Exception('Graph returned an error: '.$e->getMessage());
        }
        catch (Facebook\Exceptions\FacebookSDKException $e) { // When validation fails or other local issues
            throw new Exception('Facebook SDK returned an error: '.$e->getMessage());
        }

        $fbUser = (object) $response->getGraphUser()->asArray();

        $user = $db->query("SELECT * FROM `mod_members` WHERE `email` = '".$fbUser->email."'")->fetch();
        if ($user) {
            $db->query("UPDATE `mod_members` SET `fb_uid` = '".$fbUser->id."' WHERE `id` = ".$user->id);
        } else {
            $imgFilename = 'fb_img_'.$fbUser->id.'.jpg';
            (new GuzzleHttp\Client())->request(
                'GET',
                'http://graph.facebook.com/'.$fbUser->id.'/picture?type=large',
                ['sink' => fopen(__DIR__.'/../../files/user_pic/'.$imgFilename, 'w')]
            );
            $db->query("
                INSERT INTO `mod_members` (`fb_uid`, `email`, `username`, `pass`, `name`, `pic`, `stat`) VALUES (
                    '".$fbUser->id."',
                    '".$fbUser->email."',
                    '".$fbUser->name."',
                    '--dummy-password--".bin2hex(random_bytes(22))."',
                    '".$fbUser->name."',
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
        echo json_encode([
            'isSuccessful' => false,
            'error' => [
                'message' => $e->getMessage(),
                'type' => $e->errType
            ]
        ]);
    }
