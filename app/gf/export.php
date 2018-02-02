<?php
if (!$_POST) die('приветик'); // если глобальный массив POST не передан значит приветик
// иначе продолжаем

$response = array(); // сюда будем писать то что будем возвращать скрипту

$name = isset($_POST['name']) ? $_POST['name'] : false; // сунем каждое поле в отдельную переменную
$email = isset($_POST['email']) ? $_POST['email'] : false;
$phone = isset($_POST['phone']) ? $_POST['phone'] : false;
// $plan = $_POST['plan'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_campaign = $_POST['utm_campaign'];
$utm_term = $_POST['utm_term'];


// теперь подготовим данные для отправки в гугл форму
$url = 'https://docs.google.com/forms/d/e/1FAIpQLScatpr29lsc3-qPjsDjT2_p6LfTVFw5Gc6tO2RgxNViFSPxuw/formResponse'; // куда слать, это атрибут action у гугл формы
$data = array(); // массив для отправки в гугл форм
$data['entry.1405076119'] = $name;
$data['entry.25521918'] = $email;
$data['entry.882584547'] = $phone;
// $data['entry.367410407'] = $plan;
$data['entry.199889172'] = $utm_source;
$data['entry.1881624589'] = $utm_medium;
$data['entry.1252320012'] = $utm_campaign;
$data['entry.432273211'] = $utm_term;


$data = http_build_query($data); // теперь сериализуем массив данных в строку для отправки


$options = array( // задаем параметры запроса
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => $data,
    ),
);
$context  = stream_context_create($options); // создаем контекст отправки
$result = file_get_contents($url, false, $context); // отправляем

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