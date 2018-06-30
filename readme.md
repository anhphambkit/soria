## About Eden Project
A product from Bigin
## Upgrade to latest version
Modify your BRANCH want to update before run command bellow
- Open file ./upgrade
- Find `const BRANCH = 'bos';` and change to the branch you want to update.
- Run this command
```
php upgrade // Upgrade all packages
php upgrade * // Upgrade all packages
php upgrade [package] // Upgrade specific package
```
## Setup environment (built with Docker)
After clone source completed, you need to modify some tiny config. Add the configuration below to **.env** :

```
 # POSTGRES version you want to use
 POSTGRES_VERSION=9.4
 POSTGRES_USER=eden_db
 POSTGRES_PASSWORD=987
 POSTGRES_PORT=5431
 POSTGRES_PGADMIN_PORT=8080
 
 # Your server
 SERVER_PORT=80
 # Server local IP that will be received by ipconfig getifaddr en0
 SERVER_LOCAL_IP=192.168.1.3
 ```
 
 ### Shortcut command
 ```
 a = php artisan
 u = php upgrade
 ```
### CLI (Quick Start)
- Navigate Terminal to project folder and see some useful commands below:

### Library config
- Publish migrate to write log
```
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="migrations"
php artisan migrate
```
- Add this line to app/Exceptions/Handler.php
```
public function render($request, Exception $exception)
    {
        activity()->withProperties(['url' => $request->getRequestUri()])->log($exception->getMessage());
        return parent::render($request, $exception);
    }
```
#### SERVER
1. _Start server_
- `php eden server start`
2. _Stop server_
- `php eden server stop`
3. _Start server (force rebuild)_
- `php eden server start:build`
4. _Restart server_
- `php eden server restart`
5. _Inspect server (after the container already run)_
- `php eden server inspect`
6. _Verify docker compose config_
- `php eden server config`


#### COMPOSER
1. _Install libraries_
- `php eden server composer install`
2. _Other options_
- `php eden server composer [composer_options]`

#### LOCAL
1. _Get Local IP_
- `php eden local ip`

#### PACKAGE
1. _Create new package_
- `php artisan make:pkg {package}`
- _{package} should be written in lowercase_
2. _Generate **service** or **repository** layer_
- `php artisan make:service {package} {service}`
- `php artisan make:repo {package} {repo}`
- After generated we need bind interface to service provider by add this code to _register_ method in {Package}/Custom/Providers/PackageServiceProvider.
 ```
 $this->app->bind({serviceInterface}, {serviceImplement});
 $this->app->bind({repositoryInterface}, {repositoryImplement});
 ```
 
 3. Publish migrations ...
 ```
 php artisan vendor:publish --tag={package}
 ```
 4. _Make CRUD template (Create/Update/Delete template)_
 ```
    php artisan make:crud {package} {model}
 ```
 
 ```
     php artisan make:crud product category // Will make template CRUD for Category in Package Product
  ```
## Initiation
- Add this to composer.json
```
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Packages\\": "Packages/"
    }
}
```

-  Change Provider
```
App\Providers\AppServiceProvider::class => Packages\Core\Providers\AppServiceProvider::class
App\Providers\RouteServiceProvider::class => Packages\Core\Providers\RouteServiceProvider::class
```

- Change app/auth.php
```
...
    'providers' => [
        'users' => [
                    'driver' => 'eloquent',
                    'model' => Packages\User\Entities\User::class,
            ]
        ]
    ]
```

## Media
Before to use we must run command

`php artisan storage:link`

It will link **storage** directory to **public** directory. All uploaded files will be stored there.

Config folder to storage file uploads.

**Config\media.php**

`upload_folder => 'uploads'`

All uploaded file will be stored in => storage/app/public/uploads/{year}/{month}/{file-name}

We can access it with the helper asset(). Like this `asset('storage/uploads/2018/02/tutu.png')`


## Theme
We just design the theme for only Admin page (Backend page) where you can edit the skin of system easily. 

- Modify HTML of Sidebar: resources/view/vendor/sidebar. https://github.com/Maatwebsite/Laravel-Sidebar/issues/26
- Available jQuery libraries (included in layouts):
 
+ jQuery Serialize: https://github.com/marioizquierdo/jquery.serializeJSON

- Available node module packages:

+ axios: https://github.com/axios/axios


## Translation
The translation files are stored in "Resources/lang/{language_code}/file"
Whenever we need to translate we can use this syntax:
 
```
{{ trans('package::file.vairable') }}
```

## Config
- Each package maybe have directory `Package\Config\{package}.php` that help user override default config from `config\{package.php}` (if you already have defined before, it not define before, it can be used as new config). You can use it like this:
 
 ```
 {{ config({package}.{attribute}) }}
 
 # Get full_name config from package User:
 {{ config (user.full_name) }}
 ```
## Modify config of Core Package
You need to modify some default config

### Middleware
- The default middleware flow will be:

#### Web Middleware
_Follow this steps_
1. Laravel 'web' group middleware. 
2. Packages/Custom/WebMiddleware _(It was extended from Packages/Core/WebMiddle so it's easy to update)._
3. Packages/Module/WebMiddleware

### Register command
1. Create Command class in Packages\{PackageName}\Custom\Commands (priority = 1) or Packages\{PackageName}\Commands (priority = 2) 
2. System will auto register new command to console

### Register Cron-job
1. Create new CronjobServiceProvider and register this provider in PackageServiceProvider (boot method)
```
$this->app->register(\Gloudemans\Shoppingcart\ShoppingcartServiceProvider::class);
```
2. In boot method (CronjobServiceProvider) call command
```
public function boot(){
    $this->app->booted(function (){
        $schedule = $this->app->make(Schedule::class);
        $schedule->command(CleanProject::class)->sundays();
    });
    }
```
3. Verify scheduling
```
php artisan schedule:list
```
#### Api Middleware and Ajax Middleware
_Follow this steps_
1. Packages/Custom/ApiMiddleware | AjaxMiddleware _(It was extended from Packages/Core/WebMiddle so it's easy to update)._
2. Packages/Module/ApiMiddleware | AjaxMiddleware

AjaxMiddleware = ApiMiddleware but AjaxMiddleware isn't required token to access.

## Quick create/update/delete template
1. Quick create views/routes/controller/requests

```
php artisan make:crud {package} {model}
```

We create web.example.php and ajax.example.php files, you can copy the example routing to your web.php and ajax.php

2. Create Service layer for this model

```
php artisan make:service {package} {model}
```

3. Create Repository layer for this model

```
php artisan make:repo {package} {model}
```

4. Create Entity for this model

```
php artisan make:entity {package} {model}
```

5. Bind provider for service layer and repository layer
Open PackageServiceProvider.php in register() add 

```
$this->app->singleton(ServiceInterface, EloquentServiceClass)
$this->app->singleton(RepositoryInterface, EloquentRepositoryClass)
```
6. Build frontend js files

```
npm run build -- --env.pkg={package} --env.src=js/{model}/{model}.list.js

npm run build -- --env.pkg={package} --env.src=scss/{model}.sass

npm run build -- --env.pkg={package} --env.custom=true --env.src=scss/{model}.sass (if you want to build custom folder)

```

OR Use ARTISAN
```
php artisan build {user} {js/user.js} // Build Package=User, File=js/user.js
php artisan build {user} {js/user.js} --C=1 // Build Custom Package=User, File=js/user.js
php artisan build {user} {scss/user.scss} --C=1 // Build Custom Scss Package=User, File=js/user.js
```

7. Publish all vendor in your Packages
 ```
 php artisan publish
 ```
 
 8. Migrate all packages (it will publish all packages and run migrate)
 ```
 php artisan migrate:full
 ```
 
 9. Make form request 
 ```
 php artisan make:req {package} {model}
 php artisan make:req user userCreate 
 ```
Enjoy your game!