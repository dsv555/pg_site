<?php

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;

$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;
$mail->Username = 'dubserg@kvokka.com';
$mail->Password = 'serjoga55';

// От кого
$mail->setFrom('dubserg@kvokka.com', 'dubserg@kvokka.com');

// Кому
$mail->addAddress('dubserg@kvokka.com', 'dubserg@kvokka.com');

// Тема письма
$mail->Subject = 'Заявка на участие акции';

// Тело письма
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$compony = filter_input(INPUT_POST, 'compony', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

$html = '<table>';
$html .= '<tr> <td>Ваше имя:</td> <td>' . trim($name) . '</td></tr>';
$html .= '<tr> <td>Название компании:</td> <td>' . trim($compony) . '</td></tr>';
$html .= '<tr> <td>Ваш e-mail:</td> <td></td>' . trim($email) . '</tr>';
$html .= '<tr> <td>Контактный телефон:</td> <td>' . trim($phone) . '</td></tr>';
$html .= '</table>';

$mail->msgHTML($html);

$mail->send();


// bvs@podari-zhizn.ru
