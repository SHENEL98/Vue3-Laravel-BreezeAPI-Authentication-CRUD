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

----------------

- update api.php

-----------------
Role-Based Access Control (RBAC) with Laravel and Vue

- Set Up Role and Permission Models : modify RoleTableSeeder and add more roles and permissons. 
    then run the seeder : "php artisan db:seed  --class=RolePermissionSeeder"

- Create the Book Model and Controller
    php artisan make:model Book -m
    php artisan make:controller BookController --resource

- Enforcing Permissions in the BookController
    Now, in the BookController, you will enforce the permissions dynamically, based on what actions are allowed for each role.

    For example, if a role has the permission book-create, they can create a new book; otherwise, they are forbidden from doing so.
    Here’s how you can enforce permissions in your BookController using the Spatie permission checks:

        use Illuminate\Support\Facades\Auth;
        use Spatie\Permission\Models\Permission;

        class BookController extends Controller
        {
            // Display a listing of the books
            public function index()
            {
                // Ensure the user has permission to view books
                if (Auth::user()->can('view books')) {
                    $books = Book::all(); // Fetch all books
                    return response()->json($books);
                } else {
                    return response()->json(['error' => 'You do not have permission to view books'], 403);
                }
            }
            ......
        }
