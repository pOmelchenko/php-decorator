#!/usr/bin/env php
<?php

require_once __DIR__ . '/autoload.php';

#[Attribute(Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
readonly final class add_prefix
{
    public function __invoke(callable $function): callable
    {
        echo 'Print message:' . PHP_EOL;
        echo $function();

        return function (): void {
        };
    }
}

#[add_prefix]
function simple_function(): string
{
    return 'Hello world' . PHP_EOL;
}

call_user_func_with_decorators('simple_function');
