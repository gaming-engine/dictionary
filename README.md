# PHP Dictionary

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gaming-engine/dictionary.svg?style=flat-square)](https://packagist.org/packages/gaming-engine/dictionary)
[![Total Downloads](https://img.shields.io/packagist/dt/gaming-engine/dictionary.svg?style=flat-square)](https://packagist.org/packages/gaming-engine/dictionary)
![GitHub Actions](https://github.com/gaming-engine/dictionary/actions/workflows/main.yml/badge.svg)

A quick and easy dictionary implementation for PHP.

## Installation

You can install the package via composer:

```bash
composer require gaming-engine/dictionary
```

## Usage

```php
$dict = new \GamingEngine\Dictionary\Dictionary();

$dict[new \stdClass()] = 12;
$dict['php'] = 23;
$dict[100] = 'dictionary';
```

Class `\GamingEngine\Dictionary\Dictionary` implements `Iterator`, `ArrayAccess`, `Countable` and `Serializable`. It also provides methods for creating and sorting Dictionary and for converting it to array.

Valid types of keys for the Dictionary are:
* object
* integer
* float
* string
* bool
* null

You cannot use:
* Closure
* array

### Creating
To create empty Dictionary, use constructor.

```php
$dict = new \GamingEngine\Dictionary\Dictionary();
```

You can also create Dictionary from key-value pairs.

```php
$dict = \GamingEngine\Dictionary\Dictionary::fromPairs([
    ['key1', 'value1'],
    ['key2', 'value2'],
    ['key3', 'value3'],
]);
```
Last option is to create Dictionary from array.

```php
$dict = \GamingEngine\Dictionary\Dictionary::fromArray([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3',
]);
```

### Converting to PHP array

There are three methods that let you retrieve data as array:
* `Dictionary::keys()` - returns array of keys,
* `Dictionary::values()` - returns array of values,
* `Dictionary::toPairs()` - returns array of key-value pairs; each pair is 2-element array.

### Copying Dictionary
Unlike an array, Dictionary is an object and that means it is reference type. If you want the copy of Dictionary, you have to use clone keyword or call Dictionary::getCopy() method.

### Sorting elements
Just like an array, Dictionary is ordered. To sort Dictionary, use Dictionary::sortBy($callback, $direction) method. Any argument can be omitted.

* `$callback` will be called for every element. Dictionary will be ordered by values returned by callback. First argument of the callback is value and second is key of element. Instead of callable, you can use "values" or "keys" string.
* `$direction` can be "asc" or "desc". Default value is "asc".

Examples of sorting:

```php
$dictionary->sortBy('values','asc');
```

```php
$dictionary->sortBy(function($value, $key) {
    return $value->title . $key->name;
}, 'desc');
```

`sortBy` changes Dictionary it is called for. If you want sorted copy, chain it with `getCopy`.

```php
$sortedDictionary = $dictionary->getCopy()->sortBy('values', 'asc');
````

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email awjudd@gmail.com instead of using the issue tracker.

## Credits

-   [Andrew Judd](https://github.com/gaming-engine)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
