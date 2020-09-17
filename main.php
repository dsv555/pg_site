<?php

function send_mime_mail(
    $name_from, // имя отправителя
    $email_from, // email отправителя
    $name_to, // имя получателя
    $email_to, // email получателя
    $data_charset, // кодировка переданных данных
    $send_charset, // кодировка письма
    $subject, // тема письма
    $body, // текст письма
    $html = FALSE, // письмо в виде html или обычного текста
    $reply_to = FALSE
) {
    $to = mime_header_encode($name_to, $data_charset, $send_charset)
        . ' <' . $email_to . '>';
    $subject = mime_header_encode($subject, $data_charset, $send_charset);
    $from =  mime_header_encode($name_from, $data_charset, $send_charset)
        . ' <' . $email_from . '>';
    if ($data_charset != $send_charset) {
        $body = iconv($data_charset, $send_charset, $body);
    }
    $headers = "From: $from\r\n";
    $type = ($html) ? 'html' : 'plain';
    $headers .= "Content-type: text/$type; charset=$send_charset\r\n";
    $headers .= "Mime-Version: 1.0\r\n";
    if ($reply_to) {
        $headers .= "Reply-To: $reply_to";
    }
    return mail($to, $subject, $body, $headers);
}

function mime_header_encode($str, $data_charset, $send_charset)
{
    if ($data_charset != $send_charset) {
        $str = iconv($data_charset, $send_charset, $str);
    }
    return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$compony = filter_input(INPUT_POST, 'compony', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

$html = '<table>';
$html .= '<tr> <td>Ваше имя:</td> <td>' . $name . '</td></tr>';
$html .= '<tr> <td>Название компании:</td> <td>' . $compony . '</td></tr>';
$html .= '<tr> <td>Ваш e-mail:</td> <td></td>' . $email . '</tr>';
$html .= '<tr> <td>Контактный телефон:</td> <td>' . $phone . '</td></tr>';
$html .= '</table>';

echo send_mime_mail(
    'bvs@podari-zhizn.ru.',
    'bvs@podari-zhizn.ru.',
    'bvs@podari-zhizn.ru',
    'bvs@podari-zhizn.ru',
    'KOI8-R',
    'KOI8-R',
    'Заявка на участия акции',
    $html,
    true
);
exit;
