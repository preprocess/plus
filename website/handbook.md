# Handbook

> This document is a work in progress, it may still change, perhaps profoundly.

Let’s take a look at a simple class-based example:

```php
internal class User {
    public readonly string $name;

    public __construct(string $name) {
        $this->name = $name;
    }

    public getName(): string => $this->name;
}
```

Cool right? The syntax should look familiar if you have used PHP before - so now, let's walk through
what **Plus** has to offer:

## Methods signature

If you have done PHP before, you probably have used the following syntax while declaring a class method:

```php
class User
{
    public function getName(): string
    {
        return $this->name;
    }
}
```

With **Plus** you can do:

```php
class User
{
    public getName(): string
    {
        return $this->name;
    }
}
```

Notice how we dropped `function` keyword altogether and just the function name directly. Even
better, you can have one line arrow functions:

```php
class User
{
    public getName(): string => $this->name;
}
```

Keep in mind that the `return` keyword is hidden in those one-line arrow functions. So in the
example above, we are going to return the name of the user.

## Typed properties

With **Plus** you don't need PHP 7.4 to start using types in class properties. In our example, if the
property name is a `string`, you can do:

```php
class User {
    public string $name;
}
```

##

With **Plus** you don't need PHP 7.4 to start using types in class properties. In our example, if the
property name is a `string`, you can do:

```php
class Formatter {
    public static $format = ($value) => ucfirst($value);

    public $user = new User();
}

// Override methods without reflection...
Formatter::$format = ($value) => lcfirst($value);

// Or just
Formatter::$format = ($value) => lcfirst($value);

```

## Readonly properties

You can make properties readonly by using the `readonly` keyword. Readonly properties must be
initialized at their declaration or in the constructor.

```php
class User {
    public readonly string $name;
}
```

##  Internal visibility modifier

If you are open source maintainer, refactoring after a stable release of your open source library
can be hard, because technically in PHP **every class is public**. With **Plus**, the `internal`
keyword can be used to denote that the associated class is internal to the library:

```php
internal class User {
```

## Enumerations

Enums allow us to define a set of named constants. Using enums can make it easier to document
intent, or create a set of distinct cases. **Plus** provides both numeric and string-based enums.

An enum can be defined using the `enum` keyword:

```php
enum Direction {
    Up = 'up',
    Down = 'down'
}

enum Response {
    No = 0,
    Yes = 1
}

$user->answer(Response::Yes);
```

## Short closures

Short closures, also called arrow functions, are a way of writing shorter functions in **Plus**. This
notation is useful when passing closures to functions like array_map or array_filter. Here is
an example:

```php
$names = array_map(($user) => $user->name, $users);
```

## Type Hint Variables

In some cases, type inference in PHP may not work as expected. With **Plus**, you can instruct
the variable's type to the various static analysis tools. You can specify a variable's type by
doing `$variable: Type = $value`. Here are some examples:

```php
$user: User = $collection->first();
$age: int = $array[1]['age'];
```

## Reserved names

Variables, properties, constants, and class names should never be prefixed with the word `__plus`. Using the prefix `__plus` can cause unexpected behaviour in your application.
