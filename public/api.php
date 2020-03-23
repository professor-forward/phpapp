<?php

$headers = getallheaders();

header("Content-Type: application/json");

if (isset($headers["Authentication"])) {
    list($type, $token) = explode(" ", $headers["Authentication"], 2);

    $dbconn = pg_connect("host=localhost port=5432 dbname=phpapp");
    $sql = 'SELECT name, data FROM clients WHERE token = $1';
    $result = pg_query_params($dbconn, $sql, [$token]);
    $data = pg_fetch_all($result);

    if (empty($data)) {
        http_response_code(401);
        $reply = [
            "error" => "Invalid token.",
            "token" => $token,
            "type" => $type,
        ];
        echo json_encode($reply);
        exit;
    }
} else {
    http_response_code(400);
    $reply = [
        "error" => "Please provide a valid Authentication header for this API.",
        "headers" => $headers,
    ];
    echo json_encode($reply);
    exit;
}

if (!isset($headers["X-Men"])) {
    http_response_code(400);
    $reply = [
        "error" => "Please provide an X-Men mutant and reveal their human name.",
        "headers" => $headers,
    ];
    echo json_encode($reply);
    exit;
}

http_response_code(200);
switch($mutant = $headers["X-Men"]) {
case "Wolverine":
    $name = "Logan";
    break;
case "Magento":
    $name = "Eric";
    break;
default:
    $name = "Unknown";
}
$reply = ["mutant" => $mutant, "name" => $name];
echo json_encode($reply);