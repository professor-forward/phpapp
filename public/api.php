<?php

$all = getallheaders();

$shared_secret = $all["x-api-key"] ?? null;

switch ($shared_secret) {
case "professorcharlesxavier":
  $client = "xmen";
  break;
default:
  $client = null;
}

if (!$client) {
  $reply = [
      "error" => "Invalid token.",
      "token" => $shared_secret,
  ];
  header("Content-Type: application/json");
  echo json_encode($reply);
  exit;
}

$mutant = $all["x-men"] ?? $_GET["x-men"] ?? null;

switch ($mutant) {
case "Wolverine":
  $name = "Logan";
  break;
default:
  $name = "Unknown";
}

$reply = ["mutant" => $mutant, "name" => $name];
header("Content-Type: application/json");
echo json_encode($reply);









