<?php
require_once __DIR__.'/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$exchange = 'upload-pictures';
$channel->exchange_declare($exchange, 'fanout', false, true, false);

$queue_name = 'resize-picture';
$channel->queue_declare($queue_name, false, true, false, false);

$channel->queue_bind($queue_name, $exchange);

echo ' [*] Waiting for message. To exit press CTRL+C', "\n";

$callback = function($msg) {
    if($msg->get('content_type') != 'application/json')
    {
        $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);

        echo "failed: content_type must be json\n";
        return false;
    }

    $body = json_decode($msg->body, true);

    print_r($body);

    resize_picture($body['image_id'], $body['image_path']);

    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$channel->basic_qos(null, 1, null);
$channel->basic_consume($queue_name, '', false, false, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();

function resize_picture($image_id, $image_path) {
    echo sprintf("Resizing picture: %s %s\n", $image_id, $image_path);
}