# Get Started

> This document is a work in progress, it may still change, perhaps profoundly.

## Installation

> **Requires:** [PHP 7.2+](https://php.net/releases)

You may install **Plus** by issuing the [Composer](https://getcomposer.org) `require` command in your terminal:

```bash
composer require pre/plus
```

After installing **Plus**, you need to add `declare(plus=1);` in PHP files where
you want to use the new syntax that **Plus** has to offer. Here is an example:

```php
<?php

declare(plus=1);

Route::get('/', () => view('welcome'));
```

## Source maps support

**Plus** supports the generation of source maps natively, overriding the PHP default exception
handler to reconstruct the original source code before dispatching it to your debugger or logger.

PHP frameworks and tools often implement their own exception handler; each makes your debugger
or logger showing you the transformed file instead. Luckily, on the time of this writing, **Plus**
officially supports **Laravel**, and **PHPUnit** - if you are using one of those two tools,
you always will see code written in **Plus**.

If you are using any other framework, you may need to propose an adapter under the directory [src/Adapters](https://github.com/preprocess/plus/tree/master/src/Adapters).
