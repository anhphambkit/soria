#!/bin/bash
echo alias a=\'php artisan\' >> /etc/bash.bashrc
echo alias u=\'php /var/www/html/upgrade\' >> /etc/bash.bashrc
source /etc/bash.bashrc
service php7.1-fpm start
nginx
