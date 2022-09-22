<?php
$servername = "us-cdbr-east-06.cleardb.net";
$username = "bf2b4db78430a0";
$password = "ef420036";
$db="heroku_15f16b4c96fc55b";
$conn = mysqli_connect("$servername", "$username", "$password","$db");
mysqli_set_charset($conn,'utf8');


$sql="select * from users";
$result=mysqli_query($conn,$sql);
while ($row=$result->fetch_assoc()){
    var_dump($row);
}


//// Xatolikni tekshirish uchun

//$e_message = "";
//try {
//
//
//} catch (\Exception $e) {
//    $e_message .= $e->getMessage();
//    $e_message .= $e->getLine();
//    $e_message .= $e->getFile();
//    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $e_message]);
//
//} catch (Throwable $e) {
//    $e_message .= $e->getMessage();
//    $e_message .= $e->getLine();
//    $e_message .= $e->getFile();
//    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $e_message]);
//
//}