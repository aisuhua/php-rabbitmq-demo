# INSTALL

- Ubuntu 16.04
- Erlang 19.3.6
- RabbitMQ 3.6.10

## Erlang

```sh
wget "http://packages.erlang-solutions.com/erlang/esl-erlang/FLAVOUR_1_general/esl-erlang_19.3.6-1~ubuntu~xenial_amd64.deb"
dpkg -i esl-erlang_19.3.6-1-ubuntu-xenial_amd64.deb

apt-get install -f
dpkg -i esl-erlang_19.3.6-1-ubuntu-xenial_amd64.deb
```

check

```sh
erl

Erlang/OTP 19 [erts-8.3.5] [source] [64-bit] [async-threads:10] [hipe] [kernel-poll:false]

Eshell V8.3.5  (abort with ^G)
1> 
```

## RabbitMQ

```sh
wget -c "https://github.com/rabbitmq/rabbitmq-server/releases/download/rabbitmq_v3_6_10/rabbitmq-server-generic-unix-3.6.10.tar.xz" -O "rabbitmq-server-generic-unix-3.6.10.tar.xz"
tar xf rabbitmq-server-generic-unix-3.6.10.tar.xz -C /opt
cd /opt
mv rabbitmq_server-3.6.10/ rabbitmq
```

edit /etc/profile

```sh
vim /etc/profile
export PATH=$PATH:/opt/rabbitmq/sbin
export RABBITMQ_HOME=/opt/rabbitmq

source /etc/profile
```

start RabbitMQ

```sh
rabbitmq-server
```

check 

```sh
rabbitmqctl status
rabbitmqctl cluster_status
```

add user

```sh
# add user 
rabbitmqctl add_user root root123

# set permission
rabbitmqctl set_premissions -p / root ".*" ".*" ".*"

# set tags
rabbitmqctl set_user_tags root administrator
```
