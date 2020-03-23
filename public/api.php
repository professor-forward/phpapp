<?php

$reply = ["hello" => "world"];
header("Content-Type: application/json");
echo json_encode($reply);
