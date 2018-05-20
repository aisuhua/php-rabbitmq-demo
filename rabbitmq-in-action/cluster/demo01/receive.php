<?php
require_once __DIR__.'/../../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$exchange = 'exchange-demo';
$queue_name = 'queue-demo';
$binding_key = 'queue-demo';
$consumer_tag = 'tag-demo';

$channel->queue_declare($queue_name, false, true, false, false);
$channel->exchange_declare($exchange, 'direct', false, true, false);

$channel->queue_bind($queue_name, $exchange, $binding_key);

echo ' [*] Waiting for message. To exit press CTRL+C', "\n";

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

$channel->basic_consume($queue_name, $consumer_tag, false, false, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();