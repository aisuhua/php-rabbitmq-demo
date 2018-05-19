<?php
require_once __DIR__.'/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$channel->exchange_declare('hello-exchange', 'direct', false, false, false);

$channel->queue_declare('hello-queue', false, false, false, false);
$channel->queue_bind('hello-queue', 'hello-exchange', 'suhua');

echo ' [*] Waiting for logs. To exit press CTRL+C', "\n";

$callback = function($msg) {
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    $body = $msg->body;

    if($body == 'quit') {
        $msg->delivery_info['channel']->basic_cancel('hello-tag');
        echo $body, PHP_EOL;
    } else {
        echo " [x] Received ", $body, "\n";
    }
};

$channel->basic_consume('hello-queue', 'hello-tag', false, false, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();