<?php
$redirect_uri   = 'http://local.zohoauth.com/callback.php';
$scope          = 'ZohoBooks.bills.READ,ZohoSheet.dataAPI.READ,ZohoSheet.dataAPI.UPDATE';
// ZohoBooks.bills.READ,ZohoSheet.dataAPI.READ,ZohoSheet.dataAPI.UPDATE

// Self Client
$client_id       = '1000.V8R6EAI0JCGOCL4LEBLI2FO9Q6JT1F';
$client_secret   = '83395a905fa9792a279336dca5fc3107c41a0f20d6';
$code           = '1000.7015972e65ad7f3d40b6c6170ef5d190.ab934c9944085e6a9f75cb05ff84bb8e';

// Web Client
//$client_id       = '1000.WLQG4XQP8S9EDOWPTGRIKHJJ20T1PN';
//$client_secret   = '5620c2d180b5efc18cca8fb83fa956493594bfee37';

//Auth
$url = 'https://accounts.zoho.com/oauth/v2/auth';
/*
    https://accounts.zoho.com/oauth/v2/auth
    ?response_type=code&
    client_id=1000.GMB0YULZHJK411284S8I5GZ4CHUEX0&
    scope=AaaServer.profile.Read&
    redirect_uri=https://www.zylker.com/oauthredirect&
    prompt=consent
*/
// $f = array();
// $f['client_id'] = $client_id;
// $f['scope'] = $scope;
// $f['response_type'] = 'code';
// $f['redirect_uri'] = $redirect_uri;
//$f['prompt'] = 'consent';

$fields = array(
    'scope' => $scope,
    'client_id' => $client_id,
    'response_type' => 'code',
    //'prompt' => 'consent',
    'redirect_uri' => $redirect_uri
);

/*
$url = "https://accounts.zoho.com/oauth/v2/auth?response_type=code&".
    "client_id=1000.P6GW1RRFF0B05TMADFGZDJC5TFQ0LK&" .
    "scope=ZohoBooks.settings.All,ZohoBooks.bills.READ,ZohoSheet.dataAPI.READ,ZohoSheet.dataAPI.UPDATE&" .
    "redirect_uri=http://local.zohoauth.com/callback.php&" .
    "";
    header('Location:'. $url);
    exit;
*/





//url-ify the data for the POST
$fields_string = http_build_query($fields);
//open connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//execute post
$result = curl_exec($ch);

var_dump($result);

var_dump($_REQUEST);
exit;

//header('location:' . $redirect_uri);
exit;


//---
//Token
$url = 'https://accounts.zoho.com/oauth/v2/token';
/*
    https://accounts.zoho.com/oauth/v2/token?
    client_id=1000.GMB0YULZHJK411248S8I5GZ4CHUEX0&
    grant_type=authorization_code&
    client_secret=122c324d3496d5d777ceeebc129470715fbb856b7&
    redirect_uri=https://www.zylker.com/oauthredirect&
    code=1000.86a03ca5dbfccb7445b1889b8215efb0.cad9e1ae4989a1196fe05aa729fcb4e1

    https://accounts.zoho.com/oauth/v2/token?
    client_id=1000.WLQG4XQP8S9EDOWPTGRIKHJJ20T1PN&
    grant_type=authorization_code&
    client_secret=5620c2d180b5efc18cca8fb83fa956493594bfee37&
    redirect_uri=http://local.zohoauth.com/callback.php&
    code=1000.7015972e65ad7f3d40b6c6170ef5d190.ab934c9944085e6a9f75cb05ff84bb8e



    $f = array();
    $f['client_id'] = $client_id;
    $f['grant_type'] = 'authorization_code';
    $f['client_secret'] = $client_secret;
    $f['redirect_uri'] = $redirect_uri;
    $f['code'] = $code;

    //$urllll = 'https://accounts.zoho.com/oauth/v2/token?client_id=1000.WLQG4XQP8S9EDOWPTGRIKHJJ20T1PN&grant_type=authorization_code&client_secret=5620c2d180b5efc18cca8fb83fa956493594bfee37&redirect_uri=http://local.zohoauth.com/callback.php&code=1000.7015972e65ad7f3d40b6c6170ef5d190.ab934c9944085e6a9f75cb05ff84bb8e';
*/

//The data you want to send via POST
//$fields[] = $f;
$fields = array(
    'code' => $code,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirect_uri
);


//---


// self client
//echo 'Auth Code : ' . htmlspecialchars($_GET["code"]);

//$uri            = 'http://local.zohoauth.com/callback.php';
//$scope          = 'ZohoBooks.settings.All,ZohoBooks.bills.READ,ZohoSheet.dataAPI.READ,ZohoSheet.dataAPI.UPDATE';
 
$url = 'https://accounts.zoho.com/oauth/v2/token?';
$fields = array(
    'code' => '1000.94bb2954388b68feb81b7dbf34a2a37c.606304233c7226bdbb40ebe2192b76e7',
    'client_id' => '1000.P6GW1RRFF0B05TMADFGZDJC5TFQ0LK',
    'client_secret' => 'df2af56ae9994ca4a849bc4a3b7fb1e304697cf24e',
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'http://local.zohoauth.com/callback.php'
);

 
$postvars = http_build_query($fields);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
$result = curl_exec($ch);

//var_dump($result);
curl_close($ch);
$token_response = json_decode($result);
echo '<pre/>';
print_r($token_response);
exit;
