<p align="center">
  <img src="https://raw.githubusercontent.com/preprocess/plus/master/art/logo.gif" width="400" alt="Plus">
  <p align="center">
    <a href="https://travis-ci.org/pre/plus"><img src="https://img.shields.io/travis/pre/plus/master.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/pre/plus"><img src="https://poser.pugx.org/pre/plus/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/pre/plus"><img src="https://poser.pugx.org/pre/plus/v/stable.svg" alt="Latest Version"></a>
    <a href="https://packagist.org/packages/pre/plus"><img src="https://poser.pugx.org/pre/plus/license.svg" alt="License"></a>
  </p>
  <p align="center">
    <strong>For full documentation, visit <a href="https://php-plus.com">php-plus.com</a></strong>.
  </p>
</p>

Plus is a **runtime compiler** that adds features to PHP - It's also a package that you can require using
composer, and is mainly used to add features and syntactic sugar to existing PHP code. Of course, those features
arrive in PHP using runtime source code transformations. It was created by, and currently maintained by **[Nuno Maduro](https://github.com/nunomaduro)**, and **[Christopher Pitt](https://github.com/assertchris)**. Art work is provided by **[Caneco](https://twitter.com/caneco)**.

Enjoy a simple and powerful syntax that enables developers to build very complex applications far more quickly
than before. Short closures, types, enumerations are just a few examples of what you get using **Plus**.

## Try Plus in 10 seconds

> Note: Plus is still work in progress and it's not out yet.

- First, install:

```
composer require pre/plus
```

- Then, in your editor, add the following declare:

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

**Plus** is open-sourced software licensed under the [MIT license](license.md).
