<?php

include 'Telegram.php';

$telegram = new Telegram('5516988832:AAGFKzAY-Y2Q8arkPi18PSC2zGfwMPS0JnI');

$chat_id = $telegram->ChatID();  // foydalanuvchi ID si
$chat_name = $telegram->FirstName();  // foydalanuvchi nomi
$text = $telegram->Text(); // foydalanuvchi yuborgan text

if ($text == '/start') {
    showStart();
} elseif ($text == '🍯 Biz haqimizda ') {
    $content = [
        'chat_id' => $chat_id,
        'text' => " Biz haqimizda bilib oling <a href='https://telegra.ph/Biz-haqimizda-08-10'>Link</a> ",
        'parse_mode' => "html"
    ];
    $telegram->sendMessage($content);
} elseif ($text == '🍯 Buyurtma berish') {


}


//Funksiyalar
function showStart()
{
    global $telegram, $chat_id, $starText;
    $option = [
        [
            $telegram->buildKeyboardButton("🍯 Biz haqimizda")
        ],
        [
            $telegram->buildKeyboardButton("🍯 Buyurtma berish")
        ]
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyb,
        'text' => " Assalomu Alaykum biz sof va tabiy asal bilan shug'ullanamiz  ",
    ];

    $telegram->sendMessage($content);

}

function showContact()
{
    global $telegram, $chat_id, $starText;


}

function getNumber()
{

}

