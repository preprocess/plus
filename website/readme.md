---
home: true
description: A superset of PHP that makes PHP cool again.
  Plus is a work in progress, it may still change, perhaps profoundly.
heroImage: /logo.gif
actionText: Documentation →
actionLink: /prologue
sidebar: true
features:
    - title: State of the art
      details: Enjoy a simple and powerful syntax that enables developers to build very complex
        applications far more quickly than before. Short closures, types, enumerations are just
        a few examples of what you get using Plus.
    - title: Static Analysis
      details: Plus helps you write consistent code, and discover potential errors. By default,
        it works with static analysers like Phpstan and Psalm - and helps you finding errors in
        your code without actually running it.
    - title: Yes - It's PHP
      details: You love PHP, right? We do too. Plus works out-of-the-box with any PHP application
        without any need of configuration. Also, it's optional as is a per-file declaration - Painless
        to get started.
footer: MIT Licensed | Copyright © Nuno Maduro
---

### Try **Plus** in 10 seconds

_Note: **Plus** is still work in progress and it's not out yet._

- First, install Plus:

```bash
composer require pre/plus
```

- Then, in your editor, add the following `declare`:

```php
<?php

declare(plus=1);

Route::get('/', () => view('welcome'));
```
