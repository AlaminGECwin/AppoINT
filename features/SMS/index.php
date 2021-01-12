<?php
try{
$soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
$paramArray = array(
'userName' => "01721303127",
'userPassword' => "ZSFHl-87,jhG-Ghn6bhcdjj%4%ZSFHl-87,jhG-dGhn6%",
'mobileNumber' => "01721303127",
'smsText' => "I have sent the message to you",
'type' => "TEXT",
'maskName' => '', 'campaignName' => '',
);
  $value = $soapClient->__call("OneToOne", array($paramArray));
 echo $value->OneToOneResult;
 echo "<h1>Message has been sent successfully<h1>";
 } catch (Exception $e) {
 echo $e->getMessage();
}