
<?php
$baseUrl = 'http://localhost/BDM-CI-paoly';


$paypal_hostname = 'www.sandbox.paypal.com';


$pdt_identity_token = 'ItOfgG6egfuaWVN2mk3xhoDbf5hdfBMpb0BBhM4ils6A-g2sRHU9JEJFBQq';

$tx = $_GET['tx'];

$query = "cmd=_notify-synch&tx=$tx&at=$pdt_identity_token";

$request = curl_init();

curl_setopt($request, CURLOPT_URL, "https://$paypal_hostname/cgi-bin/webscr");
curl_setopt($request, CURLOPT_POST, TRUE);
curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($request, CURLOPT_POSTFIELDS, $query);


curl_setopt($request, CURLOPT_SSL_VERIFYPEER, TRUE);

curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($request, CURLOPT_HTTPHEADER, array("Host: $paypal_hostname"));

// Ejecutamos la solicitud
$response = curl_exec($request);
curl_close($request);

if (!$response) {
    //HTTP ERROR
    echo "Error";
    return;
}

// Dividimos $response por líneas
$lines = explode("\n", trim($response));
$keyarray = array();

// Validamos la respuesta
if (strcmp($lines[0], "SUCCESS") == 0) {
    for ($i = 1; $i < count($lines); $i++) {
        $temp = explode("=", $lines[$i], 2);
        $keyarray[urldecode($temp[0])] = urldecode($temp[1]);
    }

    $mc_gross = $keyarray['mc_gross'];
    $payment_status = $keyarray['payment_status'];
    $quantity = $keyarray['quantity'];
    $item_name = $keyarray['item_name'];

    header("location: $baseUrl/valoracion.php");
    return;
} else if (strcmp($lines[0], "FAIL") == 0) {

    echo "FAIL";
    return;
}
