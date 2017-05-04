# EVE-srpmail

This is a small and simple tool to make the tedious task of of writing SRP mails easier for officers.  
This works for all corporations not just EVE uni as it pulls the infos about the corps and chars dynamically from the API.  
Nothing will be save on the server itself for longer than the session.
Only works if contracts are in stations not in citadels.


# Install

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


### Swagger API
The Swagger API is included in the repo. To update the API simply replace the folder with the generated PHP client from the new swagger.json.  
To use the api, every PHP document must include the api [manually](https://github.com/jbs1/eve-srpmail/tree/master/SwaggerClient-php#manual-installation).


### OAuth client
The Oauth Client is also included in the repo.  
To install the oauth2 client run `composer require league/oauth2-client` inside the repo's root folder.



For instructions to setup the webhook so that the webserver pull updates from github see [here](hook.md)
