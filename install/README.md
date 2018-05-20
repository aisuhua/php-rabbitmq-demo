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
rabbitmqctl set_permissions -p / root ".*" ".*" ".*"

# set tags
rabbitmqctl set_user_tags root administrator
```

查看当前使用中的配置信息

```sh
rabbitmqctl environment
```

- [Verify Configuration: How to Check Effective Configuration](https://www.rabbitmq.com/configure.html#verify-configuration-effective-configuration)

## install

```sh
# download
wget "http://packages.erlang-solutions.com/site/esl/esl-erlang/FLAVOUR_1_general/esl-erlang_20.1.7-1~ubuntu~xenial_amd64.deb"
wget "https://dl.bintray.com/rabbitmq/all/rabbitmq-server/3.7.5/rabbitmq-server_3.7.5-1_all.deb"

# install erlangs
dpkg -i esl-erlang_20.1.7-1~ubuntu~xenial_amd64.deb 
apt-get install -f

# install rabbitmq
dpkg -i rabbitmq-server_3.7.5-1_all.deb 
apt-get install -f

# check status
service rabbitmq-server status
# or
rabbitmqctl status
```

rabbitmq.conf

```sh
vim /etc/rabbitmq/rabbitmq.conf 
```

- [rabbitmq.conf.example](https://github.com/rabbitmq/rabbitmq-server/blob/master/docs/rabbitmq.conf.example)
