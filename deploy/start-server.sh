#!/bin/bash
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-order-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-queue.conf /etc/supervisor/conf.d/
sudo service php7.1-fpm start
sudo service nginx start
sudo service supervisor stop
sudo service supervisor start
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start soria-queue:*
sudo supervisorctl start soria-email-order-queue:*
sudo supervisorctl start soria-email-queue:*