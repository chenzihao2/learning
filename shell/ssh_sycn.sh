#!/bin/bash

if [ $# -lt 2 ] ; then
  echo "USAGE: $0 HOST USER"
  echo " e.g.: $0 192.168.10.1 tom"
  exit 1;
fi

HOST=$1
USER=$2

KEY=`cat $HOME/.ssh/id_rsa.pub`

HOME0="/home/"$USER

ssh $USER"@"$HOST ssh-keygen
ssh $USER"@"$HOST "echo $KEY >> $HOME0/.ssh/authorized_keys"
ssh $USER"@"$HOST chmod 600 $HOME0/.ssh/authorized_keys
