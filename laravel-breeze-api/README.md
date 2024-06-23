## Backend - Laravel Breeze API

- Install breeze in laravel
- Install breeze api 
- Change .env
- FRONTEND_URL=http://localhost:3000
- SANCTUM_STATEFUL_DOMAINS=localhost:3000
- SESSION_DOMAIN=localhost

------

- create migration, model, controller : php artisan make:model post -mcr;
- setup migration and model , php artisan migration
- create controller function, call in api.php

-------

- *Going to try out rest api crud with out using authentication
- create a model and controller
- checked api does work through postman

------------------

Laravel permission by Spatie in Vue

- install : composer require spatie/laravel-permission
- config file and migration
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    php artisan config:clear
    php artisan migrate
- add the package's trait to User model
    ..  use HasRoles;
- update Kernel.php
- create a role controller : php artisan make:controller RoleController -- resource
- create a seeder : php artisan make:seeder PermissionTableSeeder 
    set permissions in there, and seed : php artisan db:seed --class=PermissionTableSeeder
- create a seeder : php artisan make:seeder RoleTableSeeder 
   set roles in there, and seed : php artisan db:seed --class=RoleTableSeeder   

- Update RoleController