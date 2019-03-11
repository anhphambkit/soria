#!/bin/bash
sudo apt-get -y update
sudo add-apt-repository ppa:ondrej/php -y
sudo add-apt-repository -y ppa:nginx/stable
sudo apt-get update -y
sudo apt-get -y install nginx php7.1 php7.1-cli php7.1-common php7.1-mysql php7.1-json php7.1-opcache php7.1-pgsql php7.1-mbstring php7.1-mcrypt php7.1-zip php7.1-fpm php7.1-xml php7.2-gd curl php7.1-curl git unzip vim
sudo curl -sS https://getcomposer.org/installer -o composer-setup.php -y
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer -y
sudo chkconfig nginx on
sudo chkconfig php7.1-fpm on
sudo apt-get install -y ssh rsync
sudo chown -R ubuntu:ubuntu /home/projects/drsori
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.2/install.sh | bash
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.2/install.sh | bash
export NVM_DIR="/home/ubuntu/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm
nvm install node
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion

sudo apt install npm
sudo apt-get install -y php7.1-gd
sudo apt-get -y install python-setuptools python-dev build-essential
sudo apt-get -y install supervisor
sudo cp /home/projects/drsori/deploy/crontab /etc/cron.d
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-order-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-queue.conf /etc/supervisor/conf.d/
sudo chmod 755 /home/projects/drsori/deploy
sudo apt-get install telnet -y
sudo mkdir /home/ssl
sudo cp /home/projects/drsori/deploy/ssl/soria.pem /home/ssl
sudo cp /home/projects/drsori/deploy/ssl/soria.key /home/ssl
