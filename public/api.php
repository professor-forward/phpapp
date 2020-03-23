<?php

$headers = getallheaders();

if (isset($headers["X-Men"])) {
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
} else {
    http_response_code(400);
    $reply = [
        "error" => "Please provide an X-Men mutant and reveal their human name.",
        "headers" => $headers,
    ];
}

header("Content-Type: application/json");
echo json_encode($reply);
