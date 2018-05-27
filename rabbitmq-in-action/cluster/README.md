# Cluster

RabbitMQ heartbeats

```php
# read_write_timeout must be at least 2x the heartbeat
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
    30,
    null,
    true,
    15
);
```

- [Detecting Dead TCP Connections with Heartbeats and TCP Keepalives](http://www.rabbitmq.com/heartbeats.html)
- [rabbitmq——heartbeat](https://my.oschina.net/hncscwc/blog/195343)

HAProxy timeout

```
# client and server timeout must larger than rabbitmq heartbeat
defaults
    log global
    mode    http
    option  httplog
    option  dontlognull
    timeout connect 5000
    timeout client  50000
    timeout server  50000
```

- [HAProxy 最佳實踐筆記](http://fangpeishi.com/haproxy_best_practice_notes.html)
- [Time format](https://cbonte.github.io/haproxy-dconv/1.6/configuration.html#2.5)

## Troubleshooting

```sh
rm -rf /var/lib/rabbitmq/mnesia/*
```

- [Clustering Guide](https://www.rabbitmq.com/clustering.html)


## Links

- [PHP-AMQP RabbitMQ Connection Timeouts](http://www.shallop.com/blog/2016/2/php-amqp-rabbitmq-connection-timeouts)
- [Broken pipe or closed connection](https://github.com/jakubkulhan/bunny/issues/40)
- [使用 rabbitmq 中 heartbeat 功能可能会遇到的问题](https://my.oschina.net/moooofly/blog/209823)
- [RabbitMQ 高可用集群](https://blog.csdn.net/wangshuminjava/article/details/80452585)
- [heartbeat problem on non_blocking consumers](https://github.com/php-amqplib/php-amqplib/issues/508)
- [Default heartbeat settings](https://github.com/php-amqplib/php-amqplib/issues/563)
- [HAproxy指南之haproxy配置详解1（理论篇）](http://blog.51cto.com/blief/1750952)
- [php-amqp/stubs/AMQPConnection.php](https://github.com/pdezwart/php-amqp/blob/master/stubs/AMQPConnection.php)
- [amqp-base](http://amqp-base.readthedocs.io/en/v0.6/)
- [Problem with keepalive and heartbeat](https://github.com/php-amqplib/php-amqplib/issues/203)
- [Consumer stops receiving messages](https://github.com/php-amqplib/php-amqplib/issues/207)
- [Optionally enable keepalive on the socket](https://github.com/php-amqplib/php-amqplib/pull/187/files)
- [Adding client and server heartbeat monitoring for streams.](https://github.com/php-amqplib/php-amqplib/pull/191/files)
- [heartbeats and AMQPTimeoutException](https://github.com/php-amqplib/php-amqplib/issues/249)
- [Signal triggered shutdown causing AMQPTimeoutException](https://github.com/php-amqplib/php-amqplib/issues/192)