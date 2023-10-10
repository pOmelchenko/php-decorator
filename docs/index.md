# PHP Decorators

Decorators in `Python` look like this `main.py` example

```python
def add_prefix(function):
    def dec(*args, **kwargs):
        print('Print message:')
        print(function(*args, **kwargs))

    return dec
    

@add_prefix
def some_user_func():
    return 'Hello world'


some_user_func()
```

will print
```shell
$ python3 mail.py 
Print message:
Hello world
```

so now you can write something like that in `PHP`

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

#[Attribute(Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
readonly final class add_prefix {
    public function __invoke(callable $function): callable
    {
        echo 'Print message:' . PHP_EOL;
        echo $function();

        return function (): void {};
    }
}

#[add_prefix]
function some_user_func(): string
{
    return 'Hello world' . PHP_EOL;
}

call_user_func_with_decorators('some_user_func');

```

result will be:

```shell
$ php mail.py 
Print message:
Hello world
Ep!

```
