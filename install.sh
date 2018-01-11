#!/bin/bash
ln -s /var/www/html/code.iamcal.com/site.conf /etc/apache2/sites-available/code.iamcal.com.conf
a2ensite code.iamcal.com
service apache2 reload
