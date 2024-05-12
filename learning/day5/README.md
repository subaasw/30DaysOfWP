# Day 5 - Coding Standards (sample)

Let's consider the folder structure:
```
project
└── src
    ├── Main.php
    ├── Test.php
    └── ...
├── index.php
└── composer.json
```

Now, let's use the PSR-4 standard. In your `composer.json` file, write:
```json
{
  "autoload": {
    "psr-4": {
      "App\\": "src/"
    }
  }
}
```

after that run
```bash
composer dump-autoload -o
```

Main.php

```php
<?php

namespace App;

class Main{
   public function __construct(){
      echo 'hello world';
   }
}
```

Test.php

```php
<?php

namespace App;

class Test{
   public function __construct(){
      echo 'Testing';
   }
}
```

Include autoload in your `index.php` file:
```php
<?php

require_once 'vendor/autoload.php';

use \App\Main;
use \App\Test;

new Main();
new Test();
```

or <br />

If you want to use a custom autoloader using `spl_autoload_register` function, create `custom-autoload.php`:

```php
<?php

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/src/';
   
    $len = strlen( $prefix );
    if ( strncmp( $prefix, $class, $len ) !== 0 ) {
        // no, move to the next registered autoloader
        return;
    }
    // get the relative class name
    $relative_class = substr( $class, $len );
    // replace the namespace prefix with the base directory, replace namespace
// separators with directory separators in the relative class name, append
// with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if ( file_exists( $file ) ) {
        require $file;
    }
});
```

Include it in `index.php`:

```php
<?php

require_once 'custom-autoload.php';
```

new file structure

```bash
project
└── src
    ├── Main.php
    ├── Test.php
    └── ...
├── index.php
├── custom-autoload.php
└── composer.json
```
