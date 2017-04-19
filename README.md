### Install Prerequisites

```
sudo apt-get install php-curl
sudo service apache2 restart
```

### Apache Symlink
```
sudo ln -sf /home/ubuntu/gh-evesrp/eve-srpmail/ /var/www/html/eve
```

### Install composer globally
To install composer follow this https://getcomposer.org/download/  
Then symlink or copy the executable to path (e.g. /usr/local/bin/)


from https://github.com/jbs1/jlecture

## website changes
Website changes are now automatically pushed to the webserver. Every push event calls a webhook which pulls the changes to an amazon-ec2-instance.  
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
* create dir `gh-evesrp` in home dir via `mkdir ~/gh-evesrp`
* symlink the githup repo to the apache web dir (see above)
* change dir-group to newly created group with
```
chgrp web_pub ~/gh-evesrp;
chmod g+s ~/gh-evesrp;
```
* clone jlecture repo via `cd gh-evesrp && git clone git@github.com:jbs1/eve-srpmail.git`
* create a webhook for push-event's pointing to the `hook.php` under "Settings=>Webhooks" in the github-repository
now every website change should work automatically  

**NOTE:** for private repo make sure, you have a ssh key on the instance with pull rights for this repo
