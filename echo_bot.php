<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'GC//4vRrioXV3WWDLxomtTnv3uFvk4p60P+rkiGxyXE8Bc+93Z2cFvBaaGYboMtLsQHwWn01xGJ528RnN7mh4JYOLEf8Fa/oXLbloFKuXCqokArc32eLLa8TCJVEufWhLpeABehigqgQbah0QFrCwAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '59870a04061d8d1e920aa07fd60de3dc';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
/*foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $message['text']
                            )
                        )
                    ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }

};*/


$replyToken = $client->parseEvents()[0]['replyToken'];

$profil = $client->profil($userId);
$message = $client->parseEvents()[0]['message'];
$pesan_datang = $message['text'];

$balas = array(
    'replyToken' => $replyToken, 
    'messages' => array(
            array(
                    'type' => 'text',
                    'text' => 'Apaan?'
                )
        ));

if($message['type'] == 'text') {
    if($pesan_datang == '2') {
        $balas['messages'][0]['text'] = 'Apaan?';
}


$result =  json_encode($balas);
file_put_contents('./balasan.json',$result);
$client->replyMessage($balas);