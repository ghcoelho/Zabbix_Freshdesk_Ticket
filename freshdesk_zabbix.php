#!/usr/bin/php5

<?php
$fd_domain = "URL FreshDesk";
$token = "Insert your Token";
$password = "";

$data = array(
    "helpdesk_ticket" => array(
        "description" => $argv[2],
        "subject" => $argv[3],
        "email" => $argv[1],
        "priority" => $argv[4],
        "status" => 2
    ),
    "cc_emails" => "E-mail copy to Support"
);

$json_body = json_encode($data, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);

$header[] = "Content-type: application/json";
$connection = curl_init("$fd_domain/helpdesk/tickets.json");
curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
curl_setopt($connection, CURLOPT_HEADER, false);
//curl_setopt($connection, CURLOPT_USERPWD, "$token:$password");
curl_setopt($connection, CURLOPT_USERPWD, "$token");
curl_setopt($connection, CURLOPT_POST, true);
curl_setopt($connection, CURLOPT_POSTFIELDS, $json_body);
curl_setopt($connection, CURLOPT_VERBOSE, 0);

$response = curl_exec($connection);
echo $response;
?>"
