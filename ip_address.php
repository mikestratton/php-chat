<?php

$remote_ip = $_SERVER['REMOTE_ADDR'];
echo 'REMOTE IP ADDRESS: ' . $remote_ip;

// is remote address using a proxy?
$is_forwarded = isset($_SERVER['HTTP_X_FORWARDED_FOR']);

if($is_forwarded == true) {
    $forwarded_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

} else {
    $forwarded_ip = "IP ADDRESS NOT FORWARDED";
}
