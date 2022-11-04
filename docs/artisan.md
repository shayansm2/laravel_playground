# artisan commands:

```
php artisan <command>
```

### general commands

| command                         | task                                                                           |
|---------------------------------|--------------------------------------------------------------------------------|
| `list`                          | show list of commands                                                          |
| `serve`                         | init Laravel                                                                   |
| `route:list`                    | list all routes                                                                |
| `make:migration migration_name` | create a migration                                                             |
| `migrate`                       | run all `up()` methods for all migrates asc                                    |
| `migrate:status`                | get the migrate status                                                         |
| `migrate:rollback`              | run all `down()` methods of all migrates desc                                  |
| `migrate:refresh`               | run `migrate:rollback` + `migrate`                                             |
| `migrate:fresh`                 | drop all tables and run `migrate`                                              |
| `db:seed --class=SeederName`    | run seeder                                                                     |
| `test`                          | run tests                                                                      |
| `event:generate`                | generate listeners and events based on EventServiceProvider (*don't use this*) |
| `queue:table`                   | generate a migration for using database connections in queues                  |

### file maker commands (normal)

| command                                     | task                                                        |
|---------------------------------------------|-------------------------------------------------------------|
| `make:controller ControllerName`            | create a controller                                         |
| `make:controller ControllerName --resource` | create a resource (crud) controller                         |
| `make:controller ControllerName --api`      | create a api resource (crud) controller                     |
| `make:middleware MiddlewareName`            | create a middleware                                         |
| `make:request CustomRequest`                | create a custom request                                     |
| `make:rule CustomRule`                      | create a rule for asserting requests                        |
| `make:model ModelName`                      | create a Model                                              |
| `make:model ModelName --migration`          | create a Model with a migration                             |
| `make:model ModelName -- seed `             | create a Model with a seed                                  |
| `make:model ModelName --controller`         | create a Model with a resource controller                   |
| `make:model ModelName -mrc`                 | create a Model, resource controller, a migration and a seed |
| `make:mail Mailable`                        | create a Mailable file                                      |
| `make:policy PolicyName`                    | create a policy                                             |
| `make:test FeatureTestName`                 | create a feature test                                       |
| `make:test UnitTestName -- unit`            | create a unit test                                          |
| `make:seeder SeederName`                    | create a seeder                                             |
| `make:event EventName`                      | create an event                                             |
| `make:listener ListenerName`                | create a listener                                           |
| `make:job JobName`                          | create a job                                                |

### file maker commands (module)

| command                                             | task                                                          |
|-----------------------------------------------------|---------------------------------------------------------------|
| `module:make ModuleName`                            | create a folder in module folder with all the necessary files |
| `module:make-middleware MiddlewareName  ModuleName` | create a middleware                                           |
| `module:make-request CustomRequest ModuleName`      | create a custom request                                       |
