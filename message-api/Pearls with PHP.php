<?php

/*
 * Code by Toziri.
 */

class SMSHandler
{
    public function sendSMS()
    {
        $profileid = "Your Profile ID";
        $pwd = "Your Password";
        $senderid = "Your Sender ID";
        $CountryCode = "+255";
        $mobileno = "Your Phone number without 0 i.e 6XXXXXXXXX";
        $msgtext = "This is a test message";

        $url = "http://mshastra.com/sendurlcomma.aspx?" . http_build_query([
            'user' => $profileid,
            'pwd' => $pwd,
            'senderid' => $senderid,
            'CountryCode' => $CountryCode,
            'mobileno' => $mobileno,
            'msgtext' => $msgtext,
            'msgtype' => 0,
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curl_scraped_page = curl_exec($ch);

        if ($curl_scraped_page === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("cURL Error: $error");
        }

        curl_close($ch);

        return $curl_scraped_page;
    }
}

try {
    $smsHandler = new SMSHandler();
    $response = $smsHandler->sendSMS();
    echo "Response from server: " . $response;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
