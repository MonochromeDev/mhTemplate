<?php
require_once 'GetResponseAPI3.class.php';

if (isset($_POST['email'])) {

$email = $_POST['email'];


$getresponse = new GetResponse('d05c95f79701b99fbb78fc020a5dc32e');

$response = $getresponse->addContact(array(
'email'             => $email,
'dayOfCycle'        => 0,
'campaign'          => array('campaignId' => '49Jpm')
));

}

?>