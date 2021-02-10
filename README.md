Hosted here: http://eve-stuff.com/index.php


# EVE-srpmail

This is a small and simple tool to make the tedious task of writing SRP mails easier for officers.  
This works for all corporations not just EVE uni as it pulls the infos about the corps and chars dynamically from the API.  
Nothing will be save on the server itself for longer than the session.
If all endpoints are implemeted, it would remove the need to be ingame at all which would mean SRP could be done on the go e.g. through our phone.


## Future plans

#### General

* [x] corp name lookup for mails instead of static (possibly save name in session on login/auth)
* [x] Replace header corp name with logo, also make it dynamic lookup
* [x] add some loading indicator (especially for loading members) since that can take up to 15 seconds
* [x] autoclose mails notifications after some time
* [ ] fix bug with contract status not refeshing
  * [ ] deleted/timed out contracts don't disappear from list as the javascript only add's and doesn't remove
* [x] switch over to esi-api for contracts when the endpoint is implemeted
* [x] make it work with citadels
* [x] don't autoload contracts (?)
* [ ] show logged in char
* [x] save sent mails in cookies instead of session, otherwise on session timeout sent mails not marked anymore
* [x] fix "session already started" console warning
* [x] save finished contracts in cookies to make persistent over sessions
* [ ] fix eval vuln in mailform
* [ ] fix deprecated async in hull mail form


#### Tabs

* [ ] for all tabs: first put in killmail to to fetch info such as receiver name/fit for comparison and to put it in text template
  * [ ] support zkill and euni killboard by fetching actuall esi killmail from the pasted link
* [ ] Money SRP
  * [ ] possibly make payments through api (NO endpoint yet)
  * [ ] selection with ISK reimbursement amounts, autofetched from somewhere (srp google docs?)
* [ ] Contract SRP
  * [ ] possibility to create contracts from the api (NO endpoint yet)
  * [ ] possible problems with ships beeing inside locked containers
* [ ] General Text
  * [ ] with different templates depending on rejection/resubmission
* [ ] Fitting comparison (maybe as standalone for normal users)
  * [ ] Visual Requirement comparison for BLAP fits from killboard links
  * [ ] Use group ID or SDE and meta level to account for upgrades
  * [ ] Automatically pull fitting comparison from fleetup or similar
  * [ ] From killmail link, automatically find fit to compare to

#### Mail UI
* [x] all tabs use same message ui with one text field, just different templates
* [ ] adapt wysiwyg editor to support ccps custom tags
* [ ] list of common text snippets, added by clicking

![message UI](message_ui.png)



# Install

### Install Prerequisites

```
sudo apt-get install php-curl
sudo apt-get install php-mbstring
sudo apt-get install php-xml
sudo apt-get install composer
```

### Get source
Either clone the repository via `git clone git@github.com:jbs1/eve-srpmail.git` or simply download load the latest release from the [Release-Page](https://github.com/jbs1/eve-srpmail/releases).

Put the files in your webdir or link to the via symlink (eg. `sudo ln -sf ~/eve-srpmail/ /var/www/html`).

### Dependencies
You need to install the composer dependencies by running
```
composer install
```
in the root of the dir.


#### Library's used
The following library's were used:
* [Composer](https://getcomposer.org/download/)
* CCP's [ESI API](https://esi.tech.ccp.is/latest/)
  * The swagger php client is hosted [here](https://github.com/jbs1/esi-php-client) and installed via [composer](composer.json)
  * To update the API simply run `composer update`. If the repo has been updated, the new version will be pulled.
* [EVE OAuth Client](https://github.com/jbs1/oauth2-eveonline)
  * Installed via [composer](composer.json)
