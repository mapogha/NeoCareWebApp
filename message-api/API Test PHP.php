<?php

/*
 * Code by Toziri.
 */


$url = 'http://mshastra.com/sendsms_api_json.aspx';


$jsonData = array(
    array(
        "user" => "YOUR PROFILE ID", 
        "pwd" => "YOUR PASSWORD", 
        "number" => "255XXXXXXXXX",
        "msg" => "testing form API",
        "sender" => "YOUR SENDER ID",
        "language" => "English"
    )
);


$jsonDataEncoded = json_encode($jsonData);


$ch = curl_init($url);


curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


$result = curl_exec($ch);


if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    
    echo 'Server Response: ' . $result;
}


curl_close($ch);

?>