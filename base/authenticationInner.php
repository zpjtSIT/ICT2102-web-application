<?php

$url = 'http://ict2102group8.tk:3000/';
$urllogin = $url . "login";

$login = 0;

if(!isset($_COOKIE['token'])) {
    $_COOKIE['token'] = null;
    header('Location: '."index.php");
} else {

    $token = $_COOKIE['token'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urllogin);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = [
        'Content-Type: application/json; charset=utf-8',
        'token: ' . $token
    ];

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $server_output = curl_exec($ch);

    curl_close($ch);

    $token_result = json_decode($server_output);

    if (!$token_result->respond) {
       $_COOKIE['token'] = null;
       header('Location: '."index.php");
    } else {
       $login = 1;
    }
}
?>