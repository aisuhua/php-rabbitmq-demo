<?php
require_once __DIR__.'/../../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection(
    '192.168.31.111',
    5670,
    'root',
    'root123',
    '/',
    false,
    'AMQPLAIN',
    null,
    'en_US',
    3.0,
    40,
    null,
    false,
    20
);
$channel = $connection->channel();

$channel->exchange_declare('direct_logs', 'direct', false, false, false);

list($queue_name, ,) = $channel->queue_declare('', false, false, true, false);

$severities = array_slice($argv, 1);
if(empty($severities))
{
    file_put_contents('php://stderr', "Usage: $argv[0] [info] [warning] [error]\n");
    exit(1);
}

foreach ($severities as $severity)
{
    $channel->queue_bind($queue_name, 'direct_logs', $severity);
}

echo ' [*] Waiting for logs. To exit press CTRL+C', "\n";

$callback = function($msg) {
    echo " [x] Received ", $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
};

$channel->basic_consume($queue_name, '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();