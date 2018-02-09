<?php

  $name = isset($_POST['name']) ? $_POST['name'] : false; // сунем каждое поле в отдельную переменную
  $email = isset($_POST['email']) ? $_POST['email'] : false;
  $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
  $utm_source = $_POST['utm_source'];
  $utm_medium = $_POST['utm_medium'];
  $utm_campaign = $_POST['utm_campaign'];
  $utm_term = $_POST['utm_term'];
  $product = $_POST['product'];
  $referer = $_POST['referer'];
  $ga_client_id = $_POST['ga_client_id'];
  $country = $_POST['country'];
  $plan = $_POST['plan'];
  $sum = $_POST['sum'];

  $send_data = array();

  $send_data['name'] = $name;
  $send_data['email'] = $email;
  $send_data['phone'] = $phone;
  $send_data['product'] = $product;
  $send_data['utm_source'] =  $utm_source;
  $send_data['utm_campaign'] = $utm_campaign;
  $send_data['utm_term'] = $utm_term;
  $send_data['utm_medium'] = $utm_medium;
  // $send_data['referer'] = $referer;
  $send_data['plan'] = $plan;
  $send_data['sum'] = $sum;
  // $send_data['sum_usd'] = $sum_usd;
  $send_data['ga_client_id'] = $ga_client_id;
  $send_data['country'] = $country;



  // $send_data['additional'] = 'no_amo';

 if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, ''); // url to send data (action)
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($send_data));
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
  }
  $output = array($send_data);
  echo json_encode($output);



?>