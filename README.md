# EVE-srpmail

This is a small and simple tool to make the tedious task of of writing SRP mails easier for officers.  
This works for all corporations not just EVE uni as it pulls the infos about the corps and chars dynamically from the API.  
Nothing will be save on the server itself for longer than the session.
As of now it only works if contracts are in stations not in citadels.


Future plan's:
* [ ] Visual Requirement comparison for BLAP fits from killboard links
  * [ ] Use group ID or SDE and meta level to account for upgrades
* [ ] Add versions for advanced SRP similar to reject/resubmit
  * [ ] Have catalogue with prefetched ISK reimbursement amounts
  * [ ] possibly make payments through api (NO endpoint yet)
* [ ] additional (optional) field in forms for link to killmail
* [ ] add some loading indicator (especially for loading members) since that can take up to 15 seconds
* [ ] switch over to esi-api for contracts when the endpoint is implemeted
* [ ] possibilty to create conracts from the api (NO endpoint yet)
  * [ ] possible problems with ships beeing inside locked containers
* [ ] make it work with citadels
* [ ] fix bug with contract status not refeshing
* [x] corp name lookup for mails instead of static (possibly save name in session on login/auth)

If all endpoints are implemeted, it would remove the need to be ingame at all which would mean SRP could be done on the go e.g. through our phone.



# Install

### Install Prerequisites

```
sudo apt-get install php-curl
sudo apt-get install php-mbstring
sudo apt-get install php-xml
sudo service apache2 restart
sudo apt-get install composer
```

### Get source
Clone repo in webfolder or symlink repo to webfolder, eg.:  
```
git clone git@github.com:jbs1/eve-srpmail.git
sudo ln -sf ~/eve-srpmail/ /var/www/html
```

### Install dependencies
After you setup the repo you need to install the composer dependencies by running:
```
composer install
```
in the root of the repo.



To use your own webhook you need to fork the repo an set it up as explanied [here](hook.md)


#### Library's used
The following library's were used:
* [Composer](https://getcomposer.org/download/)
* CCP's [ESI API](https://esi.tech.ccp.is/latest/)
  * To update the API simply replace the folder with the generated PHP client from the new swagger.json.
  * To use the api, every PHP document must include the api [manually](https://github.com/jbs1/eve-srpmail/tree/master/SwaggerClient-php#manual-installation).
* [OAuth Client](https://github.com/thephpleague/oauth2-client)
  * Installed via compser (`composer require league/oauth2-client` inside the repo's root folder)
* a [webhook](hook.md) to pull commits for webserver
