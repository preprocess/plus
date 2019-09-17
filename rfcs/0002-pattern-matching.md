- Feature Name: `pattern-matching`
- Start Date: 2019-09-17

# Summary
[summary]: #summary

Allow multiple definitions of a function with different parameters.

# Motivation
[motivation]: #motivation

Some functions can be a lot more readable if pattern matching is used instead of doing `if` checks at the beginning of the function definition.

[@olivernybroe](https://github.com/olivernybroe) [mentioned](https://github.com/php-plus/engine/issues/10) a very good use case for this: the [`where` method of the Laravel Query Builder](https://github.com/laravel/framework/blob/2906b572aa83ff46b8ad57093dd0e859c0ff783f/src/Illuminate/Database/Query/Builder.php#L487-L548).

# Reference-level explanation
[reference-level-explanation]: #reference-level-explanation

Allow functions to be defined multiple times, using

```php
function put(string $key, $value)
{
    $this->storage->put($key, $vvalue);
}

function put(array $data)
{
    $this->storage->putMany($data);
}
```

# Drawbacks
[drawbacks]: #drawbacks

Implementation can be tricky. See the [Unresolved questions](#unresolved-sections) section.

# Rationale and alternatives
[rationale-and-alternatives]: #rationale-and-alternatives

I named this `pattern-matching` because `method-overloading` would imply usage only inside classes. I don't think there should be a distinction between global functions and class methods in this case.

An alternative to this approach is doing if checks at the beginning of the function. In some cases this leads to ugly code.

# Unresolved questions
[unresolved-questions]: #unresolved-questions

Implementing this could be tricky. The example from the [Reference-level explanation](#reference-level-explanation) should be transformed into something like this:

```php
function put(...$args)
{
    if (count($args) === 1 && gettype($args[0]) === 'array') {
        $this->storage->putMany($args[0]);
    }

    if (count($args) === 2 && gettype($args[0]) === 'string') {
        $this->storage->put($args[0], $args[1]);
    }

    throw new \Exception('...');
}
```

But to avoid converting all functions into this `...$args` form, the compiler should keep a count of occurances of each functions, to make sure only overloaded functions are converted.

I also think pattern matching *values* is a great feature. Take a look at this Haskell code:

```haskell
reverse' :: [a] -> [a]  
reverse' [] = []  
reverse' (x:xs) = reverse' xs ++ [x]  
```

The first line is not necessary, it just says that the function takes an array of some type and returns an array of the same type.

The second line says that for an empty array, it should return an empty array.

The third line splits the first item from the rest of the array `x:xs` and recursively calls `reverse' xs`, to reverse the rest, and adds the first item to the result `++ [x]`.

Compare that to this PHP code:

```php
function reverse(array $array)
{
    if ($array === []) {
        return [];
    }

    $first = array_shift($array);
    return array_merge(reverse($array), [$first]);
}
```

In the Haskell code, the `if` check is replaced by pattern matching.

I think that pattern matching values in PHP could look something like this:

```php
function reverse([])
{
    return [];
}
```

values instead of variable names.
