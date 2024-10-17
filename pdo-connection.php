<?php
    require_once 'db.php';
    $dbConfig = (object) $dbnfo;

    if (!isset($link)) { // Old mysql connection, to be removed when site is fully migrated to PDO
        $link = mysql_connect($dbConfig->host, $dbConfig->user, $dbConfig->pass) or die(mysql_error());
        mysql_select_db($dbConfig->name, $link) or die(mysql_error());
        mysql_query("SET NAMES 'utf8'");
    }

    $db = new PDO(
        'mysql:host='.$dbConfig->host.';dbname='.$dbConfig->name.';charset=utf8',
        $dbConfig->user,
        $dbConfig->pass,
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
?>
