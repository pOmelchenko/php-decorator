<?php

require_once __DIR__ . '/../vendor/autoload.php';

#[Attribute(Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class add_prefix {
    public function __invoke(callable $function): callable
    {
        echo 'Print message:' . PHP_EOL;
        echo $function();

        return function (): void {
            // return this function, or $function value if you don't want call $function here
        };
    }
}

#[add_prefix]
function some_user_func(): string
{
    return 'Hello world' . PHP_EOL;
}

call_user_func_with_decorators('some_user_func');
