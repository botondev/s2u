symfony2blog
============

HOMEWORK:
 
    * release: https://github.com/botondev/symfony-training/tree/release
    * dev:     https://github.com/botondev/symfony-training/tree/dev

A Symfony project created on May 17, 2018, 3:25 pm.

Symfony 2.8.39 was successfully installed. Now you can:

    * Change your current directory to /home/wse760/sandBox/s2u/ubuntu/symfony2blog

    * Configure your application in app/config/parameters.yml file.

    * Run your application:
        1. Execute the php app/console server:start command.
        2. Browse to the http://localhost:8000 URL.

    * Read the documentation at https://symfony.com/doc

Commands:

    composer update
    composer install
    php app/console
    php app/console generate:bundle
    php app/console generate:doctrine:entities ModelBundle:EntityName
    php app/console doctrine:migrations:diff
    php app/console doctrine:migrations:migrate
    php app/console doctrine:fixtures:load
    
Test runner commands for phpunit.
First we have to intall phpunit with

    sudo apt install phpunit
    
Then we can run the phpunit tests:

    phpunit -c app

Install bundle's own public assets under the real www public folder

    php app/console assets:install --symlink

The --symlink option is used to avoid duplications. 