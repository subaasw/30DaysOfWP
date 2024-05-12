# Day 4: Coding Standards

## PSR
PSR is an acronym for PHP standards recommendation.

The PHP-FIG has published five basic recommendations:
- PSR-1: Basic code style
- PSR-2: Strict code style
- PSR-3: Logger interface
- PSR-4: Autoloading


#### PSR-1: Basic Code Style
If you want to write PHP code that is compatible with community standards, start with PSR-1. It’s the easiest PHP standard to use.

**PHP tags**
You must surround your PHP code with either the `<?php ?>` or `<?= ?>` tags. You must not use any other PHP tag syntax.

**Objective**
A single PHP file can either define symbols (a class, trait, function, constant, etc.) or perform an action that has side effects (e.g., create output or manipulate data). A PHP file should not do both.

**Autoloading**
Your PHP namespaces and classes must support the PSR-4 autoloader standard.

**Class names**
Your PHP class names must use the common CamelCase format. This format is also called TitleCase. Examples are `CoffeeGrinder`, `CoffeeBean`, and `PourOver`.

**Constant names**
Your PHP constants must use all uppercase characters. Example: `BASE_URL`, `DB_PREFIX`.

**Method names**
Your PHP method names must use the common camelCase format. like: `phpIsAwesome`.


#### PSR-2: Strict Code Style

**Implement PSR-1**
The PSR-2 code style requires that you implement the PSR-1 code style.

**Indentation**
The PSR-2 recommendation says PHP code should be indented with four space characters.

**Files and lines**
Your PHP files must use Unix linefeed (LF) endings, must end with a single blank line, and must not include a trailing `?>` PHP tag.

**Keywords**
The PSR-2 recommendation says that you should type all PHP keywords in lowercase.

**Namespaces**
Each namespace declaration must be followed by one blank line.

```php
<?php
namespace My\Component;

use Symfony\Components\HttpFoundation\Request;
use Symfony\Components\HttpFoundation\Response;

class App
{
// Class definition body
}
```

**Visibility**
You must declare a visibility for each class property and method. A visibility is one of **public**, **protected**, or **private**; visibility determines how a property or method is accessible within and outside of its class.


#### PSR-3: Logger Interface

PSR-3 defines a common interface for logging libraries in PHP, allowing developers to interchangeably use different logging implementations.

The most popular PHP logger component is `monolog/monolog`, created by Jordi Boggiano.

The **Monolog** PHP component fully implements the PSR-3 interface, and it’s easily extended with custom message formatters and handlers.

The PSR-3 prescribes nine methods:
```php
<?php
namespace Psr\Log;

interface LoggerInterface {
   public function emergency($message, array $context = array());
   public function alert($message, array $context = array());
   public function critical($message, array $context = array());
   public function error($message, array $context = array());
   public function warning($message, array $context = array());
   public function notice($message, array $context = array());
   public function info($message, array $context = array());
   public function debug($message, array $context = array());
   public function log($level, $message, array $context = array());
}
```

#### PSR-4: Autoloaders
The fourth PHP-FIG recommendation describes a standardized autoloader strategy. An autoloader is a strategy for finding a PHP class, interface, or trait and loading it into the PHP interpreter on-demand at runtime.

- [psr 4 - php-fig](https://www.php-fig.org/psr/psr-4/)
- [examples](https://www.php-fig.org/psr/psr-4/examples/)

## Components
generally refer to modular, reusable pieces of code that perform specific functions or provide particular features.

Technically speaking, a PHP component is a collection of related classes, interfaces, and traits that solve a single problem. A component’s classes, interfaces, and traits usually live beneath a common namespace.

Here are a few characteristics of good PHP components:

**Laser-focused**
A PHP component is laser-focused and exists only to solve a single problem very well.

**Small**
A PHP component is no larger than it needs to be. It contains the least amount of PHP code necessary to solve one problem.

**Cooperative**
A PHP component plays well with others. A PHP component does not pollute the global namespace with its own code. Instead, a PHP component lives beneath its own namespace to avoid name collisions
with other components.

**Well-tested** & **Well-documented**
A PHP component is well-documented and well-tested. It should be easy for developers to install, understand, and use. Good documentation makes this possible.

You can find modern PHP components on  [Packagist](https://packagist.org/)

## WordPress Coding Standards & Best Practices
official docs [here](https://developer.wordpress.org/coding-standards/)
