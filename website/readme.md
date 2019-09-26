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
      details: PHP starts from the same syntax and semantics that millions of PHP developers
        know today - and works out-of-the-box with any PHP application Also, it's optional
        as is a per-file declaration - Painless to get started.

footer: MIT Licensed | Copyright © Plus
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

class User
{
    // A readonly property cannot be assigned after the constructor exits
    public readonly string $name;

    // No need for the `t_function` keyword
    public __construct(string $name) {
        $this->name = $name;
    }

    // One expression functions with return statement
    public getUppercasedName(): string => strtoupper($this->name);
}
```
