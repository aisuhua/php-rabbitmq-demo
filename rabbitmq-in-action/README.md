# RabbitMQ in Action

## demo01

- Hello World
   - 2.6 Putting it all together: a day in the life of a message
    
## demo02

- Confirm
    - 2.7 Using publisher confirms to verify delivery
    
## Links

- [Mnesia User's Guide](http://erlang.org/doc/apps/mnesia/users_guide.html) 

## Message

```
class PhpAmqpLib\Message\AMQPMessage#22 (8) {
  public $body =>
  string(18) "info: Hello World!"
  public $body_size =>
  int(18)
  public $is_truncated =>
  bool(false)
  public $content_encoding =>
  NULL
  public $delivery_info =>
  array(6) {
    'channel' =>
    class PhpAmqpLib\Channel\AMQPChannel#13 (28) {
      public $callbacks =>
      array(1) {
        ...
      }
      protected $is_open =>
      bool(true)
      protected $default_ticket =>
      int(0)
      protected $active =>
      bool(true)
      protected $alerts =>
      array(0) {
        ...
      }
      protected $auto_decode =>
      bool(true)
      protected $basic_return_callback =>
      NULL
      protected $batch_messages =>
      array(0) {
        ...
      }
      private $published_messages =>
      array(0) {
        ...
      }
      private $next_delivery_tag =>
      int(0)
      private $ack_handler =>
      NULL
      private $nack_handler =>
      NULL
      private $publish_cache =>
      array(0) {
        ...
      }
      private $publish_cache_max_size =>
      int(100)
      protected $frame_queue =>
      array(0) {
        ...
      }
      protected $method_queue =>
      array(0) {
        ...
      }
      protected $amqp_protocol_header =>
      string(8) "AMQP\000\000	"
      protected $debug =>
      class PhpAmqpLib\Helper\DebugHelper#17 (3) {
        ...
      }
      protected $connection =>
      class PhpAmqpLib\Connection\AMQPStreamConnection#3 (44) {
        ...
      }
      protected $protocolVersion =>
      string(5) "0.9.1"
      protected $maxBodySize =>
      NULL
      protected $protocolWriter =>
      class PhpAmqpLib\Helper\Protocol\Protocol091#18 (0) {
        ...
      }
      protected $waitHelper =>
      class PhpAmqpLib\Helper\Protocol\Wait091#19 (1) {
        ...
      }
      protected $methodMap =>
      class PhpAmqpLib\Helper\Protocol\MethodMap091#20 (1) {
        ...
      }
      protected $channel_id =>
      int(1)
      protected $msg_property_reader =>
      class PhpAmqpLib\Wire\AMQPReader#14 (9) {
        ...
      }
      protected $wait_content_reader =>
      class PhpAmqpLib\Wire\AMQPReader#15 (9) {
        ...
      }
      protected $dispatch_reader =>
      class PhpAmqpLib\Wire\AMQPReader#16 (9) {
        ...
      }
    }
    'consumer_tag' =>
    string(31) "amq.ctag-C1WcjsZJzeOfNbKdkf307A"
    'delivery_tag' =>
    string(1) "1"
    'redelivered' =>
    bool(false)
    'exchange' =>
    string(18) "amq.rabbitmq.trace"
    'routing_key' =>
    string(12) "publish.logs"
  }
  protected $prop_types =>
  array(14) {
    'content_type' =>
    string(8) "shortstr"
    'content_encoding' =>
    string(8) "shortstr"
    'application_headers' =>
    string(12) "table_object"
    'delivery_mode' =>
    string(5) "octet"
    'priority' =>
    string(5) "octet"
    'correlation_id' =>
    string(8) "shortstr"
    'reply_to' =>
    string(8) "shortstr"
    'expiration' =>
    string(8) "shortstr"
    'message_id' =>
    string(8) "shortstr"
    'timestamp' =>
    string(9) "timestamp"
    'type' =>
    string(8) "shortstr"
    'user_id' =>
    string(8) "shortstr"
    'app_id' =>
    string(8) "shortstr"
    'cluster_id' =>
    string(8) "shortstr"
  }
  private $properties =>
  array(1) {
    'application_headers' =>
    class PhpAmqpLib\Wire\AMQPTable#24 (1) {
      protected $data =>
      array(9) {
        ...
      }
    }
  }
  private $serialized_properties =>
  NULL
}
```