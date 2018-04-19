<?php
  $mh_action = isset($_POST['mh_action']) ? $_POST['mh_action'] : false;
  $send_data = array();
  //form inputs
  $send_data['name'] = isset($_POST['name']) ? $_POST['name'] : false; // сунем каждое поле в отдельную переменную
  $send_data['email'] = isset($_POST['email']) ? $_POST['email'] : false;
  $send_data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : false;
  //hidden inputs
  $send_data['sum'] = isset($_POST['sum']) ? $_POST['sum'] : false;
  $send_data['sum_usd'] = isset($_POST['sum_usd']) ? $_POST['sum_usd'] : false;
  $send_data['plan'] = isset($_POST['plan']) ? $_POST['plan'] : false;
  $send_data['product'] = isset($_POST['product']) ? $_POST['product'] : false;

  $send_data['ga_client_id'] = isset($_POST['ga_client_id']) ? $_POST['ga_client_id'] : false;
  $send_data['country'] = isset($_POST['country']) ? $_POST['country'] : false;
  $send_data['referer'] = isset($_POST['referer']) ? $_POST['referer'] : false;
  //utm
  $send_data['utm_source'] = isset($_POST['utm_source']) ? $_POST['utm_source'] : false;
  $send_data['utm_campaign'] = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : false;
  $send_data['utm_term'] = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : false;
  $send_data['utm_medium'] = isset($_POST['utm_term']) ? $_POST['utm_term'] : false;


 if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, $mh_action); // url to send data (action)
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