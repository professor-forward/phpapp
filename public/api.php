<?php

$reply = getallheaders();
header("Content-Type: application/json");
echo json_encode($reply);
