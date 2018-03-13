ZendSkeletonApplication
=======================

Introduction
------------
This is a simple, skeleton application using the ZF2 MVC layer and module
systems. This application is meant to be used as a starting place for those
looking to get their feet wet with ZF2.


Installation Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

To use the archieve release (Zend Framework 2.4.11), use git to checkout release 2.4:

    git clone https://github.com/zendframework/ZendSk ... cation.git zf2mvc
    cd zf2mvc
    git checkout origin/release-2.4
    composer install


Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:88 -t public/ public/index.php

This will start the cli-server on port 88, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2mvc.localhost
        DocumentRoot /path/to/zf2mvc/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2mvc/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
