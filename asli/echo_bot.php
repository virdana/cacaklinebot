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

$channelAccessToken = 'l1LR+B5q/1/EXQAybE0JQb/bMnp4Q8epX/sM6DDsAHyI0p1OM1LV6b9BJXLnVWgIxLLnjfqXBECBe5YJquLx9KGXzQEjX57ThkwfEP4/gVDLKNq/PsXVQxSzmJBBi/oCnksYRfmm8UWJUcb/4u4YCAdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'cbabe081c8d4ab61ff0998d0d3ec46c5';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':

                    if($message['text'] == '1') {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => 'Haai'
                                )
                            )
                        ));
                    }
                    if($message['text'] == '2') {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => 'Helloooo'
                                )
                            )
                        ));
                    }
                    if($message['text'] == '3') {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => 'Uwis talahh'
                                )
                            )
                        ));
                    }
                    if($message['text'] == '4') {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => 'Teros aee'
                                )
                            )
                        ));
                    }
                    else {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => 'MBOHH!'
                                )
                            )
                        ));   
                    }

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
};
