PHP ApiDataObject
=

A simple library that allows easy handle incoming data from any sources (specially from API sources) and put data in a fashion way which is more practical to access it like an array or object. It allows to implement a DTO very fast.

## Content

* [What is an ApiDataObject](#what-is-an-apidataobject)
* [Installation](#installation)
* [Usage](#usage)
* [See also](#see-also)


### What is an ApiDataObject

It is just a class that can handle incoming data from API sources in JSON format or any other format and structure them in memory to easy handling like an associative array and/or general object.

To pass data into this class, first it should be a simple PHP associative array or plain PHP std object.

It can be created by using JSON string text.

### Installation

```php
composer require didix16/php-apidataobject
```

### Usage

```php

class ApiPlatformDataObject extends ApiDataObject {}

...

class AWebHookProcessor {

    /**
     * @var array|object
     */
    $data;

    public function process()
    {
        $apiData = new ApiPlatformDataObject($this->data);

        /**
         * data = 
         * [
         *  'property1' => 'value1',
         *  'property2' => 'value2',
         *  'property3' => 'value3',
         *  'property4' => 'value4',
         * ...
         * ]
         */

        /**
         * Different accessors
         */
        $apiData['property1'];
        $apiData->property1;
        $apiData->property1();

        /**
         * Different setters
         */
        $apiData['property1'] = 'value5';
        $apiData->property1 = 'value5';

        // chainable setter properties
        $apiData
        ->property1('value5')
        ->property2('value6')
        ...
    }

    public function processJson(string $json)
    {
        $apiData = ApiPlatformDataObject::fromJson($json);

        /**
         * Different accessors
         */
        $apiData['property1'];
        $apiData->property1;
        $apiData->property1();

        /**
         * Different setters
         */
        $apiData['property1'] = 'value5';
        $apiData->property1 = 'value5';

        // chainable setter properties
        $apiData
        ->property1('value5')
        ->property2('value6')
        ...

    }
}
```

### See also

- [php-apidatamapper][1] - A DTO library that allows map incoming API data to any of your entities/models by using a simple filed mapping language.

[1]:https://github.com/didix16/php-apidatamapper