<?php
$JSONsosit = file_get_contents("php://input");
$data = json_decode($JSONsosit, true);
foreach ($data as $one) {
    usleep(300000);
    $ch = curl_init("http://localhost:4000/items");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($one));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
}

$url = 'http://localhost:4000/items';

$ch2 = curl_init();

curl_setopt($ch2, CURLOPT_URL, $url);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);

$response2 = curl_exec($ch2);
curl_close($ch2);

echo $response2;
?>