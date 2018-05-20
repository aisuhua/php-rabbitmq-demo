<?php
require_once __DIR__.'/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$exchange = 'upload-pictures';
$channel->exchange_declare($exchange, 'fanout', false, true, false);

$message = json_encode([
    'user_id' => $argv[1],
    'image_id' => $argv[2],
    'image_path' => $argv[3]
]);

$msg = new AMQPMessage($message, [
    'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
    'content_type' => 'application/json'
]);

$channel->basic_publish($msg, $exchange);

echo " [x] Sent '{$message}'\n";

$channel->close();
$connection->close();
