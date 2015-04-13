<?php

$data['server'] = $_SERVER;
$data['post'] = $_POST;

$data_serial = json_encode($data);

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$status = $redis->rPush('website-form-request', $data_serial);
$redis->close();

?>