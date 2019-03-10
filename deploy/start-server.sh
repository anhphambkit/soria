#!/bin/bash
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-order-queue.conf /etc/supervisor/conf.d/
sudo cp /home/projects/drsori/deploy/supervisor-conf/soria-email-queue.conf /etc/supervisor/conf.d/
service supervisor start
supervisorctl reread
supervisorctl update
supervisorctl start soria-queue:*
supervisorctl start soria-email-order-queue:*
supervisorctl start soria-email-queue:*
cron