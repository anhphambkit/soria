#!/bin/bash
service php7.1-fpm restart
service supervisor restart
supervisorctl reread
supervisorctl update
supervisorctl start soria-queue:*
supervisorctl start soria-email-order-queue:*
supervisorctl start soria-email-queue:*
cron