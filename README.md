### Install Prerequisites

```
sudo apt-get install php-curl
sudo apt-get install php-mbstring
sudo apt-get install php-xml
sudo service apache2 restart
```

### Apache Symlink
```
sudo ln -sf /home/ubuntu/gh-evesrp/eve-srpmail/ /var/www/html/eve
```

### Install composer globally
To install composer follow this https://getcomposer.org/download/  
Then symlink or copy the executable to path (e.g. /usr/local/bin/)


### Swagger api
To use the api, every PHP document must include the api [manually](https://github.com/jbs1/eve-srpmail/tree/master/SwaggerClient-php#manual-installation).  
Run the [test](https://github.com/jbs1/eve-srpmail/tree/master/SwaggerClient-php#tests) inside the SwaggerClient-php folder.


### OAuth client
To install the oauth2 client run `composer require league/oauth2-client` inside the repo's root folder.



For instructions to setup the webhook so that the webserver pull updates from github see [here](hook.md)