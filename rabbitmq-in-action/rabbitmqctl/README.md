# rabbitmqctl

vhost

```sh
root@devops:~# rabbitmqctl list_vhosts
Listing vhosts
/
```

queues

```sh
root@devops:~# rabbitmqctl list_queues
Listing queues
task_queue      0
```

stop node

```sh
root@devops:~# rabbitmqctl stop

2018-05-19 08:58:06.143 [info] <0.589.0> RabbitMQ is asked to stop...
2018-05-19 08:58:06.175 [info] <0.589.0> Stopping RabbitMQ applications and their dependencies in the following order:
    rabbit
    mnesia
    rabbit_common
    os_mon
2018-05-19 08:58:06.175 [info] <0.589.0> Stopping application 'rabbit'
2018-05-19 08:58:06.175 [info] <0.449.0> Peer discovery backend rabbit_peer_discovery_classic_config does not support registration, skipping unregistration.
2018-05-19 08:58:06.175 [info] <0.580.0> stopped TCP Listener on [::]:5672
2018-05-19 08:58:06.176 [info] <0.504.0> Closing all connections in vhost '/' on node 'rabbit@devops' because the vhost is stopping
2018-05-19 08:58:06.176 [info] <0.545.0> Stopping message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_persistent'
2018-05-19 08:58:06.197 [info] <0.545.0> Message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_persistent' is stopped
2018-05-19 08:58:06.198 [info] <0.542.0> Stopping message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_transient'
2018-05-19 08:58:06.203 [info] <0.542.0> Message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_transient' is stopped
2018-05-19 08:58:06.208 [info] <0.31.0> Application rabbit exited with reason: stopped
2018-05-19 08:58:06.208 [info] <0.589.0> Stopping application 'mnesia'
2018-05-19 08:58:06.212 [info] <0.31.0> Application mnesia exited with reason: stopped
2018-05-19 08:58:06.212 [info] <0.589.0> Stopping application 'rabbit_common'
2018-05-19 08:58:06.213 [info] <0.31.0> Application rabbit_common exited with reason: stopped
2018-05-19 08:58:06.213 [info] <0.589.0> Stopping application 'os_mon'
2018-05-19 08:58:06.215 [info] <0.31.0> Application os_mon exited with reason: stopped
2018-05-19 08:58:06.215 [info] <0.589.0> Successfully stopped RabbitMQ and its dependencies
2018-05-19 08:58:06.215 [info] <0.589.0> Halting Erlang VM with the following applications:
    lager
    ranch_proxy_protocol
    ranch
    ssl
    public_key
    asn1
    jsx
    xmerl
    inets
    crypto
    recon
    goldrush
    compiler
    syntax_tools
    sasl
    stdlib
    kernel
```

stop RabbitMQ

```sh
root@devops:~# rabbitmqctl stop_app
2018-05-19 08:49:29.537 [info] <0.430.0> RabbitMQ is asked to stop...
2018-05-19 08:49:29.569 [info] <0.430.0> Stopping RabbitMQ applications and their dependencies in the following order:
    rabbit
    mnesia
    rabbit_common
    os_mon
2018-05-19 08:49:29.569 [info] <0.430.0> Stopping application 'rabbit'
2018-05-19 08:49:29.569 [info] <0.213.0> Peer discovery backend rabbit_peer_discovery_classic_config does not support registration, skipping unregistration.
2018-05-19 08:49:29.569 [info] <0.367.0> stopped TCP Listener on [::]:5672
2018-05-19 08:49:29.570 [info] <0.288.0> Closing all connections in vhost '/' on node 'rabbit@devops' because the vhost is stopping
2018-05-19 08:49:29.570 [info] <0.332.0> Stopping message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_persistent'
2018-05-19 08:49:29.573 [info] <0.332.0> Message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_persistent' is stopped
2018-05-19 08:49:29.573 [info] <0.329.0> Stopping message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_transient'
2018-05-19 08:49:29.575 [info] <0.329.0> Message store for directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L/msg_store_transient' is stopped
2018-05-19 08:49:29.577 [info] <0.31.0> Application rabbit exited with reason: stopped
2018-05-19 08:49:29.577 [info] <0.430.0> Stopping application 'mnesia'
2018-05-19 08:49:29.579 [info] <0.31.0> Application mnesia exited with reason: stopped
2018-05-19 08:49:29.579 [info] <0.430.0> Stopping application 'rabbit_common'
2018-05-19 08:49:29.579 [info] <0.31.0> Application rabbit_common exited with reason: stopped
2018-05-19 08:49:29.579 [info] <0.430.0> Stopping application 'os_mon'
2018-05-19 08:49:29.580 [info] <0.31.0> Application os_mon exited with reason: stopped
2018-05-19 08:49:29.580 [info] <0.430.0> Successfully stopped RabbitMQ and its dependencies
```

start RabbitMQ

```sh
root@devops:~# rabbitmqctl start_app

2018-05-19 09:00:44.321 [info] <0.31.0> Application lager started on node rabbit@devops
2018-05-19 09:00:44.321 [info] <0.363.0> Log file opened with Lager
2018-05-19 09:00:44.357 [info] <0.31.0> Application os_mon started on node rabbit@devops
2018-05-19 09:00:44.367 [info] <0.31.0> Application mnesia started on node rabbit@devops
2018-05-19 09:00:44.367 [info] <0.31.0> Application rabbit_common started on node rabbit@devops
2018-05-19 09:00:44.368 [info] <0.449.0> 
 Starting RabbitMQ 3.7.5 on Erlang 19.3.6
 Copyright (C) 2007-2018 Pivotal Software, Inc.
 Licensed under the MPL.  See http://www.rabbitmq.com/
2018-05-19 09:00:44.370 [info] <0.449.0> 
 node           : rabbit@devops
 home dir       : /var/lib/rabbitmq
 config file(s) : (none)
 cookie hash    : aXT4b7kje0A9OwsaoyvXzg==
 log(s)         : /var/log/rabbitmq/rabbit@devops.log
                : /var/log/rabbitmq/rabbit@devops_upgrade.log
 database dir   : /var/lib/rabbitmq/mnesia/rabbit@devops
2018-05-19 09:00:44.378 [info] <0.481.0> Memory high watermark set to 3193 MiB (3348630732 bytes) of 7983 MiB (8371576832 bytes) total
2018-05-19 09:00:44.379 [info] <0.489.0> Enabling free disk space monitoring
2018-05-19 09:00:44.379 [info] <0.489.0> Disk free limit set to 50MB
2018-05-19 09:00:44.381 [info] <0.491.0> Limiting to approx 924 file handles (829 sockets)
2018-05-19 09:00:44.381 [info] <0.492.0> FHC read buffering:  OFF
2018-05-19 09:00:44.381 [info] <0.492.0> FHC write buffering: ON
2018-05-19 09:00:44.382 [info] <0.449.0> Waiting for Mnesia tables for 30000 ms, 9 retries left
2018-05-19 09:00:44.396 [info] <0.449.0> Waiting for Mnesia tables for 30000 ms, 9 retries left
2018-05-19 09:00:44.396 [info] <0.449.0> Peer discovery backend rabbit_peer_discovery_classic_config does not support registration, skipping registration.
2018-05-19 09:00:44.400 [info] <0.511.0> Starting rabbit_node_monitor
2018-05-19 09:00:44.408 [info] <0.538.0> Making sure data directory '/var/lib/rabbitmq/mnesia/rabbit@devops/msg_stores/vhosts/628WB79CIFDYO9LJI6DKMI09L' for vhost '/' exists
2018-05-19 09:00:44.411 [info] <0.538.0> Starting message stores for vhost '/'
2018-05-19 09:00:44.411 [info] <0.542.0> Message store "628WB79CIFDYO9LJI6DKMI09L/msg_store_transient": using rabbit_msg_store_ets_index to provide index
2018-05-19 09:00:44.412 [info] <0.538.0> Started message store of type transient for vhost '/'
2018-05-19 09:00:44.412 [info] <0.545.0> Message store "628WB79CIFDYO9LJI6DKMI09L/msg_store_persistent": using rabbit_msg_store_ets_index to provide index
2018-05-19 09:00:44.413 [info] <0.538.0> Started message store of type persistent for vhost '/'
2018-05-19 09:00:44.415 [info] <0.580.0> started TCP Listener on [::]:5672
2018-05-19 09:00:44.415 [info] <0.449.0> Setting up a table for connection tracking on this node: tracked_connection_on_node_rabbit@devops
2018-05-19 09:00:44.415 [info] <0.449.0> Setting up a table for per-vhost connection counting on this node: tracked_connection_per_vhost_on_node_rabbit@devops
2018-05-19 09:00:44.415 [info] <0.31.0> Application rabbit started on node rabbit@devops
2018-05-19 09:00:44.435 [notice] <0.369.0> Changed loghwm of /var/log/rabbitmq/rabbit@devops.log to 50
2018-05-19 09:00:44.494 [info] <0.363.0> Server startup complete; 0 plugins started.
```