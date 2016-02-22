<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('./createSession.php');
 
$session = createSession(33838, 'PWQJEMXxPA3R93a', 't8Mz2wBTQrh3etg', 'admin_pos', 'admin123');
$token = $session->token;
 
$chat_dialog_id = '5513e91f535c12b98f0212f1';
 
$attachment = array( array(
  type => 'image', 
  url => 'https://qbprod.s3.amazonaws.com/70a9a896466f44b2b70ee79386e86f3e00', 
  id => 580795
));
 
$data = array(
  'chat_dialog_id' => $chat_dialog_id,
  'message' => 'This is a message',
  'attachments' => (object) $attachment,
);
 
$request = json_encode($data);
 
$ch = curl_init('https://api.quickblox.com/chat/Message.json');  
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'QuickBlox-REST-API-Version: 0.1.0',
  'QB-Token: ' . $token
));
 
$resultJSON = curl_exec($ch);
$pretty = json_encode(json_decode($resultJSON), JSON_PRETTY_PRINT);
 
echo $pretty;
 
?>