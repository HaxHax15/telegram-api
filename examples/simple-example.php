<?php

chdir(dirname(__FILE__) . '/../');
include('vendor/autoload.php');
include('examples/conf.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

use \unreal4u\TelegramLog;
use \unreal4u\Telegram\Methods\GetMe;
use \unreal4u\Telegram\Methods\SendMessage;

$tgLog = new TelegramLog(BOT_TOKEN);

$getMe = new GetMe();
$userInformation = $tgLog->performApiRequest($getMe);

printf(
    'This bot is called <strong>%s</strong> (username %s) and has id <strong>%d</strong>%s',
    $userInformation->first_name,
    $userInformation->username,
    $userInformation->id,
    PHP_EOL
);

$sendMessage = new SendMessage();
$sendMessage->chat_id = '10955729';
$sendMessage->text = 'Hello world to the user... now revamped!';
$tgLog->performApiRequest($sendMessage);