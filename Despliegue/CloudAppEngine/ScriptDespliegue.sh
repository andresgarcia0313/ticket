git clone -b phase0-helloworld https://github.com/GoogleCloudPlatform/appengine-php-guestbook
cd appengine-php-guestbook
::cat helloworld.php
::cat app.yaml
dev_appserver.py --php_executable_path=/usr/bin/php-cgi $PWD &
:: implementar una region si no se ha hecho
gcloud app create
gcloud app deploy
::https://ticket-247020.appspot.com