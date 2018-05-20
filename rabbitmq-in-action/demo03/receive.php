<?php
require_once __DIR__.'/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$exchange = 'amq.rabbitmq.trace';

list($queue_name, ) = $channel->queue_declare('', false, false, true, false);

$channel->queue_bind($queue_name, $exchange, '#');
//$channel->queue_bind($queue_name, $exchange, 'publish.#');
//$channel->queue_bind($queue_name, $exchange, 'deliver.#');

echo ' [*] Waiting for logs. To exit press CTRL+C', "\n";

$callback = function($msg) {

    echo " [x] Received ", $msg->delivery_info['routing_key'] . ':' . $msg->body, PHP_EOL;

    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$channel->basic_consume($queue_name, '', false, false, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();