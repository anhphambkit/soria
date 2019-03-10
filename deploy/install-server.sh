#!/bin/bash
sudo apt-get -y update
sudo add-apt-repository ppa:ondrej/php -y
sudo add-apt-repository -y ppa:nginx/stable
sudo apt-get update -y
sudo apt-get -y install nginx php7.1 php7.1-cli php7.1-common php7.1-mysql php7.1-json php7.1-opcache php7.1-pgsql php7.1-mbstring php7.1-mcrypt php7.1-zip php7.1-fpm php7.1-xml php7.2-gd curl php7.1-curl git unzip vim
sudo curl -sS https://getcomposer.org/installer -o composer-setup.php -y
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer -y
sudo apt-get install -y ssh rsync
sudo chown -R ubuntu:ubuntu /home/projects/drsori
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash
sudo apt-get -y install nodejs
sudo apt-get install -y php7.1-gd
sudo apt-get -y install python-setuptools python-dev build-essential
sudo apt-get -y install supervisor
sudo cp /home/projects/drsori/deploy/crontab /etc/cron.d
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-order-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-queue.conf /etc/supervisor/conf.d/
sudo chmod 755 /home/projects/drsori/deploy
sudo apt-get install telnet -y
