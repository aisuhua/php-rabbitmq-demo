# RabbitMQ in Action

学习总结

### 四种类型的交换器 exchange

[direct](img/Figure-2.4-direct-exchange-message-flow.png)、[fanout](img/Figure-2.4-fanout-exchange-message-flow.png)、[topic](Figure-2.4-topic-exchange-message-flow.png) 和 headers。

其中 headers 交换器允许你匹配 AMQP 消息的 header 而非路由键，它和 direct 交换器完全一样，但性能会差很多，因此它并不太实用。

![Figure-2.3-AMQP-statck-exchanges-bindings-and-queues](img/Figure-2.3-AMQP-statck-exchanges-bindings-and-queues.png)

## 

