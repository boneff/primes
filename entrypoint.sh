#!/usr/bin/env bash

apt-get update && apt-get install wget git-core zip unzip --yes

#download composer installer
EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")
#check signature of download
if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]
then
    >&2 echo 'ERROR: Invalid installer signature'
    rm composer-setup.php
    exit 1
fi

# if download signature is verified - run composer installation script
php composer-setup.php --install-dir=/bin --filename=composer --quiet
RESULT=$?
#remove install script
rm composer-setup.php
#add execute permissions to composer
chmod a+x /bin/composer
#add to PATH
export PATH="$PATH:/bin/composer"
#install project dependencies
composer install
chown www-data:www-data -R vendor/
exit $RESULT