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

Plus is a **runtime compiler** that adds features to PHP - It’s also a package that you can require using composer and is mainly used to add features and syntactic sugar to existent PHP code. Of course, those features arrive in PHP using runtime source code transformations **without any performance loss**.

Plus is **beautifully integrated with PHP's existing ecosystem**. It starts from the same syntax and semantics that millions of PHP developers know today, and it does not get in the away of the developer - begins and ends with PHP.

**Plus is just like regular PHP** - it was first-class debug, and it's supported by the most common code editors. It's carefully crafted to make you the most productive developer in the world.

It was created by, and currently maintained by **[Christopher Pitt](https://github.com/assertchris)**, **[Nuno Maduro](https://github.com/nunomaduro)**, and **[Oliver Nybroe](https://github.com/olivernybroe)**. Artwork is provided by **[Caneco](https://twitter.com/caneco)**.

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
