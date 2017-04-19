### Install Prerequisites

```
sudo apt-get install php-curl
sudo service apache2 restart
```

from https://github.com/jbs1/jlecture

## website changes
Website changes are now automatically pushed to the webserver. Every push event calls executes a webhook which calls a script on an amazon-ec2-instance to sync changes on the webserver.  
### enable auto sync with github:
* add the following code to the `etc/sudoers`-file by doing `sudo visudo` on the instance:
```
Defaults env_keep += "GIT_SSH_COMMAND"
www-data ALL=NOPASSWD: /usr/bin/git
```
* add usergroup `web_pub` via `sudo groupadd web_pub`
* add the proper users to the new group
```
usermod -a -G web_pub ubuntu
usermod -a -G web_pub root
usermod -a -G web_pub www-data
```
* create dir `github-data` in home dir via `mkdir ~/github-data`
* change dir-group to newly created group with
```
chgrp web_pub ~/github-data;
chmod g+s ~/github-data;
```
* clone jlecture repo via `cd github-data && git clone git@github.com:jbs1/jlecture.git`
* then add the `jlecture-hook.php` to the proper apache dir on the instance
* create a webhook for push-event's pointing to the `jlecture-hook.php` under "Settings=>Webhooks" in the github-repository
now every website change should work automatically  

**NOTE:** for private repo make sure, you have a ssh key on the instance with pull rights for this repo
