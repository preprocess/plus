# Get Started

> This document is a work in progress, it may still change, perhaps profoundly.

You may install **Plus** by issuing the [Composer](https://getcomposer.org) `require` command in your terminal:

```bash
composer require pre/plus
```

After installing **Plus**, you need to add `declare(plus=1);` to each file you want use the new
syntax that **Plus** has to offer. Here is an example:

```php
<?php

declare(plus=1);

Route::get('/', () => view('welcome'));
```
