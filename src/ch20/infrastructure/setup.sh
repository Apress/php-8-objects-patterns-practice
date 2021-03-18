#!/bin/bash

VAGRANTDIR=/vagrant
SERVERDIR=/var/www/poppch20/

sudo yum -q -y install epel-release yum-utils
sudo yum -q -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum-config-manager --enable remi-php80

sudo yum -q -y install mysql-server
sudo yum -q -y install httpd;
sudo yum -q -y install php
sudo yum -q -y install php-common
sudo yum -q -y install php-cli
sudo yum -q -y install php-mbstring
sudo yum -q -y install php-dom
sudo yum -q -y install php-mysql
sudo yum -q -y install php-xml
sudo yum -q -y install php-dom

sudo cp $VAGRANTDIR/poppch20.conf /etc/httpd/conf.d/
systemctl start httpd
systemctl enable httpd


sudo yum -q -y install mariadb-server
systemctl start mariadb
systemctl enable mariadb

/usr/bin/mysqladmin -s -u root password 'vagrant' || echo " -- unable to create pass - probably already done"
domysqldb vagrant poppch20_vagrant vagrant vagrant

ROOTPASS=vagrant
DBNAME=poppch20_vagrant 
DBUSER=vagrant
DBPASS=vagrant
MYSQL=mysql
MYSQLROOTCMD="mysql -uroot  -p$ROOTPASS"

echo "creating database $DBNAME..."
echo "CREATE DATABASE IF NOT EXISTS $DBNAME" | $MYSQLROOTCMD || die "unable to create db";

echo "grant all on $DBNAME.* to $DBUSER@'localhost' identified by \"$DBPASS\"" | $MYSQLROOTCMD || die "unable to grand privs for user $DBUSER" 
echo "FLUSH PRIVILEGES" | $MYSQL -uroot -p"$ROOTPASS" || die "unable to flush privs"

