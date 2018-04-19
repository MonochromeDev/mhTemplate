<?php

$gf_action = isset($_POST['gf_action']) ? $_POST['gf_action'] : false;
$data = array(); // массив для отправки в гугл форм
// form inputs
$data['entry.1405076119'] = isset($_POST['name']) ? $_POST['name'] : false;
$data['entry.25521918'] = isset($_POST['email']) ? $_POST['email'] : false;
$data['entry.882584547'] = isset($_POST['phone']) ? $_POST['phone'] : false;
// utm
$data['entry.199889172'] = isset($_POST['utm_source']) ? $_POST['utm_source'] : false;
$data['entry.1881624589'] = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : false;
$data['entry.1252320012'] = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : false;
$data['entry.432273211'] = isset($_POST['utm_term']) ? $_POST['utm_term'] : false;
$data['entry.367410407'] = isset($_POST['plan']) ? $_POST['plan'] : false;
// hidden inputs

$response = array(); // сюда будем писать то что будем возвращать скрипту
// теперь подготовим данные для отправки в гугл форму
$data = http_build_query($data); // теперь сериализуем массив данных в строку для отправки
$options = array( // задаем параметры запроса
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => $data,
    ),
);
$context  = stream_context_create($options); // создаем контекст отправки
$result = file_get_contents($gf_action, false, $context); // отправляем

if (!$result) { // если что-то не так
    $response['ok'] = 0; // пишем что все плохо
    $response['message'] = '<p class="error">Что-то пошло не так, попробуйте отправить позже.</p>'; // пишем ответ
    die(json_encode($response)); //выводим массив в json формате и умираем
}

$response['ok'] = 1; // если дошло до сюда, значит все ок
$response['message'] = '<p class="">Все ок, отправилось.</p>'; // пишем ответ
echo json_encode($data);
die(json_encode($response)); //выводим массив в json формате и умираем

?>