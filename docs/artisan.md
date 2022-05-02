# artisan commands:

```
php artisan <command>
```

### general commands

| command | task |
| ----------- | ----------- |
| list | show list of commands |
| serve | init Laravel |
| route:list | list all routes |

### file maker commands (normal)

| command | task |
| ----------- | ----------- |
| make:controller ControllerName| create a controller |
| make:controller ControllerName --resource| create a resource (crud) controller |
| make:middleware MiddlewareName| create a middleware |
| make:request CustomRequest| create a custom request |
| make:rule CustomRule| create a rule for asserting requests |
| make:model ModelName| create a Model |
| make:model ModelName -mrc| create a Model, resource controller and migration |

### file maker commands (module)

| command | task |
| ----------- | ----------- |
| module:make ModuleName| create a folder in module folder with all the necessary files|
| module:make-middleware MiddlewareName  ModuleName |create a middleware|
| module:make-request CustomRequest ModuleName| create a custom request |
