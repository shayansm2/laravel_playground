# artisan commands:

```
php artisan <command>
```

### general commands

| command | task |
| ----------- | ----------- |
| `list` | show list of commands |
| `serve` | init Laravel |
| `route:list` | list all routes |
| `make:migration migration_name`| create a migration |
| `migrate` | run all `up()` methods for all migrates asc |
| `migrate:status` | get the migrate status |
| `migrate:rollback` | run all `down()` methods of all migrates desc |
| `migrate:refresh` | run `migrate:rollback` + `migrate` |
| `migrate:fresh` | drop all tables and run `migrate` |
|`make:seeder SeederName`|create a seeder|
|`db:seed --class=SeederName`|run seeder|

### file maker commands (normal)

| command | task |
| ----------- | ----------- |
| `make:controller ControllerName`| create a controller |
| `make:controller ControllerName --resource`| create a resource (crud) controller |
| `make:middleware MiddlewareName`| create a middleware |
| `make:request CustomRequest`| create a custom request |
| `make:rule CustomRule`| create a rule for asserting requests |
| `make:model ModelName`| create a Model |
| `make:model ModelName --migration`| create a Model with a migration |
| `make:model ModelName -- seed `| create a Model with a seed |
| `make:model ModelName --controller`| create a Model with a resource controller |
| `make:model ModelName -mrc`| create a Model, resource controller, a migration and a seed|

### file maker commands (module)

| command | task |
| ----------- | ----------- |
| `module:make ModuleName`| create a folder in module folder with all the necessary files|
| `module:make-middleware MiddlewareName  ModuleName` |create a middleware|
| `module:make-request CustomRequest ModuleName`| create a custom request |
