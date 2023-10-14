#!/usr/bin/env python3


def add_prefix(function):
    def dec(*args, **kwargs):
        print('Print message:')
        print(function(*args, **kwargs))

    return dec


@add_prefix
def some_user_func():
    return 'Hello world'


if __name__ == '__main__':
    some_user_func()
