<!--<meta http-equiv='refresh' content='10; url=http://salonsyq.beget.tech/'>   <!--Редирект -->
<?php
session_start();
 // Принимаем значения полей которые нам отправил Ajax
$name = trim(strip_tags($_POST["name"]));
$email = trim(strip_tags($_POST["email"]));
$phone = trim(strip_tags($_POST["phone"]));
$body = trim(strip_tags($_POST["body"]));
$spam = trim(strip_tags($_POST["spam"]));
//$exit = strlen(trim(strip_tags($_POST["erconts"]))); 
 
 // Создаём массив для ошибок.
$error = array();
 
 // Проверка переменных с данными от отправителя.
if (strlen($name) <= 2){ $error[] = "Вы забыли своё имя ?)"; }
if ($phone == 0) {
if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))){ 
    $error[] = "Укажите корректный email или номер телефона!"; }
}
if (strlen($body) <= 2){ $error[] = "Сообщения то нет !!!"; }

 // Если есть ошибки, то выводим их.
if (count($error))
{
    echo implode('<br>',$error); // Переводим массив в строку.
}else
{
    // Отправка email    salon-sahar@bk.ru, 01anatoliy83@mail.ru
    $address = "salon-sahar@bk.ru, 01anatoliy83@mail.ru";
    $subject = "Сообщение с сайта";
    $mes = "Имя: $name \nТелефон: $phone \nE-mail: $email \nТекст: $body";
    if (strlen($spam) == 0){
        mail( $address,$subject,$mes,"Content-type: text/plain; charset = UTF-8\r\nFrom: $email");
        echo 'Сообщение успешно отправлено!'; // Ответ Ajax'у
        $ex = 29;
    }
    
    if ($ex == 29) {
        //echo $ex.'+';
                    ('#name').val('');
                    ('#phone').val('');
                    ('#email').val('');
                    ('#body').val('');
                    ( ".bg_message>div" ).css( "visibility", "hidden" );
                    }
    
}
?>