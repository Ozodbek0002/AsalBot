<?php

include 'Telegram.php';

$telegram = new Telegram('5516988832:AAGFKzAY-Y2Q8arkPi18PSC2zGfwMPS0JnI');

$chat_id = $telegram->ChatID();  // foydalanuvchi ID si
$chat_name = $telegram->FirstName();  // foydalanuvchi nomi
$text = $telegram->Text(); // foydalanuvchi yuborgan text

file_put_contents('users/step.txt', '1');
$stepfile = file_get_contents('users/step.txt');

$orderTypes = ["1kg = 25 000 sum", "2kg = 50 000 sum", "3kg = 75 000 sum", "4kg = 100 000 sum"];

if ($text == '/start') {
    showStart();
} elseif ($text == '🍯 Biz haqimizda') {
    showAbout();
} elseif ($text == '🍯 Buyurtma berish') {
    showOrder();
} elseif (in_array($text, $orderTypes)) {
    askContact();
} else {
    askContact();
}


//Funksiyalar
function showAbout()
{
    global $chat_id, $telegram;
    $content = [
        'chat_id' => $chat_id,
        'text' => " Biz haqimizda bilib oling <a href='https://telegra.ph/Biz-haqimizda-08-10'>Link</a> ",
        'parse_mode' => "html"
    ];
    $telegram->sendMessage($content);
}

function showStart()
{
    global $telegram, $chat_id;
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

function showOrder()
{
    global $telegram, $chat_id;
    $option = [
        [
            $telegram->buildKeyboardButton("1kg = 25 000 sum")
        ],
        [
            $telegram->buildKeyboardButton("2kg = 50 000 sum")
        ],
        [
            $telegram->buildKeyboardButton("3kg = 75 000 sum")
        ],
        [
            $telegram->buildKeyboardButton("4kg = 100 000 sum")
        ],
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyb,
        'text' => " Hajim tanlandi endi telefon raqamingizni jo`natsangiz ",
    ];
    $telegram->sendMessage($content);

}

function askContact()
{
    global $telegram, $chat_id;
    file_put_contents('/users/step.txt', 'phone');
    $option = [
        [
            $telegram->buildKeyboardButton("Raqamni jo`natish",$request_contact = true)
        ],
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyb,
        'text' => " Malumot qabul qilindi ",
    ];
    $telegram->sendMessage($content);
}

