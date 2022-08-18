<?php

include 'Telegram.php';

$telegram = new Telegram('5556639565:AAGvOzJy27T4TEizvw958xdidtiyv_xkXRY');

$chat_id = $telegram->ChatID();  // foydalanuvchi ID si
$chat_name = $telegram->FirstName();  // foydalanuvchi nomi
$text = $telegram->Text(); // foydalanuvchi yuborgan text
$data=$telegram->getData();
$message=$data['message'];
$orderTypes = ["1kg = 25 000 sum", "2kg = 50 000 sum", "3kg = 75 000 sum", "4kg = 100 000 sum"];

if ($text == "/start") {
    showStart();
} elseif ($text == "🍯 Biz haqimizda") {
    showAbout();
} elseif ($text == "🍯 Buyurtma berish") {
    showOrder();
} elseif (in_array($text, $orderTypes)) {
    askContact();
} elseif ($text == "Asosiy"){
    showStart();
}elseif ($text == "Telefon yuborildi"){
    askPhone();
}
else {
    $content = [
        'chat_id' => $chat_id,
        'text' => $text,
    ];
    $telegram->sendMessage($content);
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
        ],
        [
            $telegram->buildKeyboardButton("Asosiy")
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
            $telegram->buildKeyboardButton("1kg = 25 000 sum"), $telegram->buildKeyboardButton("2kg = 50 000 sum")
        ],

        [
            $telegram->buildKeyboardButton("3kg = 75 000 sum"), $telegram->buildKeyboardButton("4kg = 100 000 sum")
        ],

        [
            $telegram->buildKeyboardButton("Asosiy")
        ]
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
    global $telegram, $chat_id,$text;

    $text = "Telefon yuborildi";
    $option = [
        [
            $telegram->buildKeyboardButton("📱 Telefon raqamni yuborish",$request_contact = true)
        ],
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyb,
        'text' => "✅ Kerakli miqdor tanlandi . Telefon raqamingizni yuboring 👇",
    ];

    $telegram->sendMessage($content);

}

function askPhone(){
    global $telegram,$chat_id,$text;
    $content = [
        'chat_id' => $chat_id,
        'text' => $text,
    ];
    $telegram->sendMessage($content);

//    $option=[
//        [$telegram->buildKeyboardButton("🔻 Joylashuvni yuborish",$request_contact=false,$request_location=true)],
//        [$telegram->buildKeyboardButton("🚘 O'zim boraman")]
//    ];
//    $keyboard=$telegram->buildKeyBoard($option,$onetime=true,$resize=true);
//    $content=[
//        'chat_id'=>$chat_id,
//        'reply_markup'=>$keyboard,
//        'text'=>"  🗺 Urganch tumani bo'ylab yetkazib berish bepul !\n🚛 Yetkazib berish uchun manzilni kiriting yoki joylashuvni yuboring. Istasangiz o'zingiz kelib olib ketishingiz ham mumkin. \n 🏢 Bizning manzil: Urganch tumani Kattabog' mahallasi Ummon ko'chasi 28-uy"
//    ];
//    $telegram->sendMessage($content);

}
