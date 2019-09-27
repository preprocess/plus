# Get Started

> This document is a work in progress, it may still change, perhaps profoundly.

## Installation

> **Requires:** [PHP 7.2+](https://php.net/releases)

You may install **Plus** by issuing the [Composer](https://getcomposer.org) `require` command in your terminal:

```bash
composer require pre/plus
```

After installing **Plus**, you need to add `declare(plus=1);` on PHP files where
you wanna the new syntax that **Plus** has to offer. Here is an example:

```php
<?php

declare(plus=1);

Route::get('/', () => view('welcome'));
```

## Source Map support

> Note: this step is only required if you are using `Plus` with tools that implement their own exception handler.

**Plus** supports natively the generation of source maps, each allows the PHP exception handler
to reconstruct the original source code before show it on your debugger or logger.

If you are using a tool that overrides the native PHP exception handler, you may need to install
one or more of the plugins bellow.

| Tool <img width=200/>    | Plugin <img width=500/>   |
|-----------               |------------------         |
| Laravel                  | pre/plus-laravel          |
| PHPUnit                  | pre/plus-phpunit          |
| Symfony                  | pre/plus-symfony          |

As example, within the Laravel Framework, you may need require the following plugin:

```bash
composer require pre/plus-laravel
```
