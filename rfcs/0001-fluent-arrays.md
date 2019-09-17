- Feature Name: `fluent-arrays`
- Start Date: 2019-09-16

# Summary
[summary]: #summary

Add a fluent API for working with arrays.

# Motivation
[motivation]: #motivation

PHP's native methods for working with arrays functionally (`array_map`, `array_filter`, `array_reduce`) are designed in a way that's consistent with C, rather than a way that's comfortable to write and read.

For example, `array_filter` takes the array as the first argument and the callback as the second one, while `array_map` takes the callback as the first argument and the array as the second one. This inconsistency makes understanding code hard.

Also, using these methods in a fluent way is much more natural than e.g. mapping the result of filter, because you get to read the operations in the same order as they happen. First you filter, then you map.

# Reference-level explanation
[reference-level-explanation]: #reference-level-explanation

`->` calls to arrays should be converted to calls to the respective low-level functions:
- The following code:
    ```php
    [1, 2, 3]->map(function ($n) {
        return $n*2;
    });
    ```
    should be translated to:
    ```php
    array_map(function ($n) {
        return $n*2;
    }, [1, 2, 3]);
    ```
- The following code:
    ```php
    $odd = [1, 2, 3]->filter(function ($n) {
        return $n & 1;
    });
    ```
    should be translated to:
    ```php
    array_filter([1, 2, 3], function ($n) {
        return $n*2;
    });
    ```
- The following code:
    ```php
    $prices = $products->filter(function ($product) {
        return $product->category == 'foo';
    })->map(function ($product) {
        return $product->price;
    });
    ```
    should be translated to:
    ```php
    $prices = array_map(function ($product) {
        return $product->price;
    }, array_filter($products, function ($product) {
        return $product->category == 'foo';
    }));
    ```

An alternative implementation would be to wrap `->` calls to arrays in some global helper that would create an instance of a class like this:

```php
class PHPPlusArr
{
    /** @var array */
    public $array;

    public function __construct(array $array)
    {
       $this->array = $array;
    }

    public function toArray(): array
    {
        return $this->array;
    }

    public function map(callable $callback): self
    {
        return new static(array_map($callback, $this->array));
    }

    public function filter(callable $callback): self
    {
        return new static(array_filter($this->array, $callback));
    }

    public function reduce(callable $callback, $initial = null): self
    {
        return new static(array_reduce($this->array, $callback, $initial));
    }
}
```

The benefit of this solution is that common methods like `sum()`, `count()`, etc can be made part of that class (as long as it doesn't grow to the size of Collection). An interesting solution, that would work for `sum()` and `count()` could be

```php
public function __call($method, $args)
{
    return $method($this, ...$args);
}
```

# Drawbacks
[drawbacks]: #drawbacks

If the `PHPPlusArr` implementation is chosen, we would need to safely attach `->toArray()` at the end of the chain.

# Rationale and alternatives
[rationale-and-alternatives]: #rationale-and-alternatives

An alternative to having this feature natively in the language/preprocessor is using something like Laravel Collections.

# Unresolved questions
[unresolved-questions]: #unresolved-questions

I'm not yet sure what's the best implementation for this. I'm also not sure how we can detect array variables correctly. Perhaps this should only work with variables that are strictly typed (something that could be provided by Plus) as `array`?
