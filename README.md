<p align="center">
  <img src="be-books-logo.jpg" title="Be Books">
</p>

# BeBooks

> Books catalogue website with CRUD capabilities

## Description

BeBook is a platform thought for those anonymous authors that would like to share (or sell) theirs books.
The website, also, has a blog and a forum where the community of readers can share theirs news and opinions.

> Disclaimer: This app is NOT intended for a production environment.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and/or testing purposes.

## Prerequisites

Installing Apache, PHP, MySQL and phpMyAdmin on a Mac OS X

- Install [homebrew](https://brew.sh/):

`/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"`

### 1. Enable Apache
Open Terminal and run the following Code: `sudo apachectl start`

Open your browser and access http://localhost. If it says **It Works**, then you are set otherwise see if your apachectl has started or not.

### 2. Enable PHP for Apache
Let's make a backup of the default Apache configuration. This will help you to cross check later what you changed or in case you want to restore the configuration to default.
```Apache-config-backup
cd /etc/apache2/
cp httpd.conf httpd.conf.bak
```
Now edit the **httpd.conf** with vi or any other text editor: `vi httpd.conf`

Now uncomment the following line (Remove #): `LoadModule php5_module libexec/apache2/libphp5.so`

Now Restart apache: `sudo apachectl restart`

### 3. Install MySQL
To install MySQL: `brew install mysql`

Install brew services now: `brew tap homebrew/services`

Now start MySQL: `brew services start mysql`

Now configure MySQL : `mysql_secure_installation`
* Validate Password Plugin
* Remove anonymous users
* Disallow root login remotely
* Remove test database and access to it
* Reload privilege tables now - Choose yes

After finishing this up, test MySQL: `mysql -uroot -p`.

It will ask you write the password you set for mysql before. Enter password and then something like this appear:

```mysql-Login
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 3
Server version: 5.7.19 Homebrew

Copyright (c) 2000, 2017, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>
```
### 4. Connect PHP and MySQL

Now we need to ensure PHP and MySQL:
```mysql-php-connection
cd /var
mkdir mysql
cd mysql
ln -s /tmp/mysql.sock mysql.sock
```
***All your sites would have URLs like http://locahost/some-site pointing to /Library/WebServer/Documents/some-site.***

#### Note on Permissions

You may recieve <i>403 forbidden</i> when you visit your local site. The Apache user(`_www`) needs to have access to read, and sometimes write, your web directory.

You can either change permissions like this: `chmod 755 directory/` or you can change the ownership of the directory to the apache user and group: `chown -R _www:_www directory`

### 5. Install PHPMyAdmin

This is optional. You can use MySQL through command line but this is a good way to administer MySQL. Download phpmyadmin from [site](https://www.phpmyadmin.net/).

```phpmyadmin-installation
cd /Library/WebServer/Documents/
tar -xvf ~/Downloads/phpMyAdmin-4.7.4-english.tar.gz
mv phpMyAdmin-4.7.4-english/ phpmyadmin
cd phpmyadmin
mv config.sample.inc.php config.inc.php
```

## License

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2012 © <a href="http://iberasoft.com" target="_blank">IberaSoft</a>.