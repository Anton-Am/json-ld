# JSON-LD Generator

[![Latest Stable Version](http://poser.pugx.org/anton-am/json-ld/v)](https://packagist.org/packages/anton-am/json-ld)
[![Total Downloads](http://poser.pugx.org/anton-am/json-ld/downloads)](https://packagist.org/packages/anton-am/json-ld)
[![Latest Unstable Version](http://poser.pugx.org/anton-am/json-ld/v/unstable)](https://packagist.org/packages/anton-am/json-ld)
[![License](http://poser.pugx.org/anton-am/json-ld/license)](https://packagist.org/packages/anton-am/json-ld)
[![PHP Version Require](http://poser.pugx.org/anton-am/json-ld/require/php)](https://packagist.org/packages/anton-am/json-ld)

Extremely simple JSON-LD generator.

## Dependencies

* PHP 8.0 or higher
* JSON extension

## Installation

- [JSON-LD Generator on Packagist](https://packagist.org/packages/Anton-Am/json-ld)
- [JSON-LD Generator on GitHub](https://github.com/Anton-Am/json-ld)

From the command line run

```
$ composer require anton-am/json-ld
```

or add to your composer.json

```
"anton-am/json-ld": "^1.0.0"
```

## Methods

**/JsonLd/Context.php**

- `create($context, array $data = [])`
- `getProperties()`
- `generate()`

**/JsonLd/MultiContext.php**

- `create(array $contextList, int $type = self::TYPE_GRAPH)`
- `generateScripts()`
- `generateArray()`
- `generateGraph()`
- `generate()`

## Context Type Classes

All currently available context types can be found in the [ContextTypes directory](src/ContextTypes)

## Examples

### Quick Example

#### Business

```php
use AntonAm\JsonLD\Context;
use AntonAm\JsonLD\ContextTypes\LocalBusiness;

$context = Context::create(LocalBusiness::class, [
    'name' => 'Consectetur Adipiscing',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
    'telephone' => '555-555-5555',
    'openingHours' => 'mon,tue,fri',
    'address' => [
        'streetAddress' => '112 Apple St.',
        'addressLocality' => 'Hamden',
        'addressRegion' => 'CT',
        'postalCode' => '06514',
    ],
    'geo' => [
        'latitude' => '41.3958333',
        'longitude' => '-72.8972222',
    ],
]);

echo $context; // Will output the script tag
```

### News Article

```php
use AntonAm\JsonLD\Context;
use AntonAm\JsonLD\ContextTypes\NewsArticle;

$context = Context::create(NewsArticle::class, [
    'headline' => 'Article headline',
    'description' => 'A most wonderful article',
    'mainEntityOfPage' => [
        'url' => 'https://google.com/article',
    ],
    'image' => [
        'url' => 'https://google.com/thumbnail1.jpg',
        'height' => 800,
        'width' => 800,
    ],
    'datePublished' => '2015-02-05T08:00:00+08:00',
    'dateModified' => '2015-02-05T09:20:00+08:00',
    'author' => [
        'name' => 'John Doe',
    ],
    'publisher' => [
        'name' => 'Google',
        'logo' => [
          'url' => 'https://google.com/logo.jpg',
          'width' => 600,
          'height' => 60,
        ]
    ],
]);

echo $context; // Will output the script tag
```

### Using the JSON-LD in a Laracasts Presenter

Even though this example shows using the JSON-LD inside a `Laracasts\Presenter` presenter, Laravel is not required
for this package.

#### /App/Presenters/BusinessPresenter.php

```php
<?php

namespace App\Presenters;

use AntonAm\JsonLD\Context;
use AntonAm\JsonLD\ContextTypes\LocalBusiness;
use Laracasts\Presenter\Presenter;

class BusinessPresenter extends Presenter
{
    /**
     * Create JSON-LD object.
     *
     * @return \AntonAm\JsonLD\Context
     */
    public function jsonLd()
    {
        return Context::create(LocalBusiness::class, [
            'name' => $this->entity->name,
            'description' => $this->entity->description,
            'telephone' => $this->entity->telephone,
            'openingHours' => 'mon,tue,fri',
            'address' => [
                'streetAddress' => $this->entity->address,
                'addressLocality' => $this->entity->city,
                'addressRegion' => $this->entity->state,
                'postalCode' => $this->entity->postalCode,
            ],
            'geo' => [
                'latitude' => $this->entity->location->lat,
                'longitude' => $this->entity->location->lng,
            ],
        ]);
    }
}
```

#### Generate the Tags

The generator comes with a `__toString` method that will automatically generate the correct script tags when displayed
as a string.

**Inside a Laravel View**

```php
echo $business->present()->jsonLd();
```

**Inside a Laravel View**

```
{!! $business->present()->jsonLd() !!}
```

## Custom Context Type

The first argument for the `create($context, array $data = [])` method also accepts class names. This is helpful for
custom context types.

```php
<?php

namespace App\AntonAm\JsonLD;

use AntonAm\JsonLD\ContextTypes\AbstractContext;

class FooBar extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => null,
        'description' => null,
        'image' => null,
        'url' => null,
    ];
}
```

```php
use AntonAm\JsonLD\Context;
use App\JsonLD\FooBar;

$context = Context::create(FooBar::class, [
    'name' => 'Foo Foo headline',
    'description' => 'Bar bar article description',
    'url' => 'https://google.com',
]);

echo $context; // Will output the script tag
```

## Multiple Context

```php
use AntonAm\JsonLD\Context;
use AntonAm\JsonLD\ContextTypes\WebSite;
use AntonAm\JsonLD\ContextTypes\BreadcrumbList;

$context =  MultiContext::create([
    [
        'context' => WebSite::class,
        'data'    => [
            'name'            => 'Google',
            'url'             => 'https://google.com/',
            'potentialAction' => [
                'target'      => 'https://google.com/results?q={search_term_string}',
                'query'       => 'required name=search_term_string',
                'query-input' => 'required name=search_term_string'
            ]
        ]
    ],
    [
        'context' => BreadcrumbList::class,
        'data'    => [
            'itemListElement' => [
                [
                    'name' => 'Main',
                    'url'  => 'https://google.com'
                ],
                [
                    'name' => 'Section',
                    'url'  => 'https://google.com/section'
                ],
                [
                    'name' => 'Article title',
                    'url'  => 'https://google.com/section/article'
                ]
            ]
        ]
    ]
]);

echo $context; // Will output the script tag
```