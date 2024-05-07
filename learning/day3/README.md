# Day 3: Modern PHP (Features) - 1

## Namespace

Imagine you have a big library full of books, and each book has a unique title. However, some titles might be similar to titles in other libraries. To avoid confusion and ensure you're grabbing the right book, each library has a name.

Similarly, in PHP, when you're working with a lot of code, you might have functions, classes, and variables with the same name. Namespaces are like those library names. They provide a way to group related code together and prevent naming conflicts.

Namespaces also provide the foundation for the PSR-4 autoloader standard created by the PHP Framework Interop Group (PHP-FIG). This autoloader pattern is used by most modern PHP components, and it lets us autoload project dependencies using the Composer dependency manager.

### Declaration

Namespaces are declared at the top of a PHP file on a new line immediately after the opening `<?php` tag.

```php
<?php
namespace MyNamespace;
```

Subnamespaces are declared exactly the same as in the previous example. The only difference is that we separate namespace and subnamespace names with the `\` character.

```php
<?php
namespace MyNamespace\MyClass;
```

### Calling Namespace

Namespace without alias:

```php
<?php
$obj = new \MyNamespace\MyClass();
```

or 

```php
<?php
use MyNamespace\MyClass;

$obj = new MyClass();

```

Namespace with alias:
```php
<?php
use MyNamespace\MyClass as MyAlias;

$obj = new MyAlias();
```

Import functions and constants using namespace, use the func and constant keywords.

```php
<?php
// This will import function 
use function Namespace\functionName;

// Import constant
use const Namespace\CONST_NAME;

functionName();

echo CONST_NAME;
```


### Code to an Interface
>*An interface is a contract between two PHP objects that lets one object depend not on what another object is but, instead, on what another object can do.*

Object interfaces allow you to create code that specifies which methods a class must implement, without having to define how these methods are handled. Interfaces share a namespace with classes and traits, so they may not use the same name.

Interfaces are defined in the same way as a class, but with the interface keyword replacing the class keyword and without any of the methods having their contents defined.

Syntax:

```php
<?php
// Declaration
interface ClassName {
   public function methodName();
}

// Implementing the interface objects
class MyClassName implements ClassName {
   // Code here
   // Must have the method mentioned in the interface 
   public function methodName() {
      // Method implementation
   }
}
```

Example:

```php
<?php

// Define the interface
interface Shape {
    // This method is declared in the interface
    // All classes implementing this interface must implement this method
    public function area();
}

// Define a class implementing the Shape interface
class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}
```

## Generators
Generators are a feature introduced in PHP 5.5 that allows you to iterate over a set of data without needing to create an array in memory, which can be particularly useful for working with large data sets.

>*Generators are simple iterators. That’s it.*

Range generator example:

```php
<?php
function makeRange($length) {
    for ($i = 0; $i < $length; $i++) {
        yield $i;
    }
}

foreach (makeRange(1000000) as $i) {
    echo $i, PHP_EOL;
}
```

## Closure

Essentially, a Closure is an inner function that has access to outer variables and is used as a callback function to anonymous functions.

#### Anonymous Functions
Anonymous functions, also known as lambda functions, are functions without a name. They are created using the `function` keyword, followed by a list of parameters and a function body.

```php
$variable = function($parameter) {
    // Function body
};
```

#### Closure example
```php
<?php
$var = 'World';

$closure = function () use ($var) {
    echo "Hello {$var}";
};

$closure(); // Outputs "Hello World"
```

## Zend OPcache
Bytecode caching, like Zend OPcache, stores precompiled bytecode in memory, reducing PHP script parsing and compilation overhead during each HTTP request. This optimizes application response times and conserves system resources.

Firstly, confirm if Zend OPcache is enabled or not:

```bash
php --version
```

If you see output like this, then congrats 🎉:

```
Zend Engine Vx.x.x, Copyright (c) Zend Technologies
    with Zend OPcache vx.x.x, Copyright (c), by Zend Technologies
```

If not, then install it:
```bash
sudo apt install php-opcache
```

The next step is to enable the OPcache caching module:
```bash
sudo nano /etc/php/x.x/apache2/php.ini
```
Note: x.x means your current PHP version.

#### Configure Zend OPcache

When Zend OPcache is enabled, you should configure the Zend OPcache settings in your php.ini configuration file. Here are the OPcache settings I like to use:

```
opcache.validate_timestamps = 1 ; // "0" in production
opcache.revalidate_freq = 0
opcache.memory_consumption = 64
opcache.interned_strings_buffer = 16
opcache.max_accelerated_files = 4000
opcache.fast_shutdown = 1
```

Locate and uncomment the following line:
```
opcache.enable=1
```

Then restart Apache to apply the changes:
```bash
sudo systemctl restart apache2
```

Finally, verify that OPcache has been enabled as follows:
```bash
php -i | grep opcache
```

## Built-in HTTP Server

PHP’s built-in web server is a perfect tool for local development.

It’s easy to start the PHP web server. Open your terminal application, navigate to your project’s document root directory, and execute this command:

```bash
php -S localhost:4000
```

#### Router Scripts
Using a router script is easy. Just pass the PHP script file path as an argument when you start up the PHP built-in server:

```bash
php -S localhost:4000 router.php
```

Detect the Built-in Server
```php
<?php
if (php_sapi_name() === 'cli-server') {
    // PHP web server
} else {
    // Other web server
}
```
