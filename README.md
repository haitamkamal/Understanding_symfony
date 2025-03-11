﻿# Understanding_symfony
## Installing Maker and Twig Bundles and Creating a Controller in Symfony
- composer require symfony/maker-bundle --dev
- php bin/console make:controller
- composer require symfony/twig-bundle
## DATABASE 
- composer require symfony/orm-pack
## CREATE DATABASE 
- php bin/console doctrine:database:create
## CREATE AN INTITES
php bin/console make:entity "name" (e.g products)
## MIGRATION 
- php bin/console make:migration
- php bin/console  doctrine:migrations:migrate
## fixtures
-composer require --dev orm-fixtures
####  to insert data into database
- php bin/console doctrine:fixtures:load  --(name)
