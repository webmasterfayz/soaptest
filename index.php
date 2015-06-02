<?php 
$login=base64_encode("NTV");
$pass=base64_encode("nt58vu5c5Pon563A51");
$URL = "http://ckt.webservice.sportsflash.com.au/securewebservice.asmx";
$state='ToBePlayed';
$xml_data = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthenticationHeader xmlns="http://schema.sportsflash.com.au/Cricket/">
     <UserName>'.$login.'</UserName>
      <Password>'.$pass.'</Password>
    </AuthenticationHeader>
  </soap:Header>
  <soap:Body>
    <GetSeriesList xmlns="http://schema.sportsflash.com.au/Cricket/">
      <clientId>194</clientId>
      <localeId>en</localeId>
      <state>'.$state.'</state>
    </GetSeriesList>
  </soap:Body>
</soap:Envelope>';
$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);


print_r($output);
?>