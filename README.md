# ZF Layout Change Module

This is a Zend Framework 3 module, that can simply set different layouts for different modules. 

If you have multiple modules in your application (e.g. Application and Admin), and you want different layout for some module (e.g. Admin), this package will provide easiest way to do that change.

## How to use this package

### 1. Install this module with composer

Simplest way to install this package is to use following composer command to require dependency:

```bash
composer require petrofcikmatus/zf-layout-change
```

Alternatively you can add following to your _composer.json_ file manualy:

```json
{
  "require": {
    "petrofcikmatus/zf-layout-change": "dev-master"
  }
}
```

and execute composer command to update your dependencies (and also download this new one):

```bash
composer update
```

### 2. Add this module to your modules

When you add this package with composer, it should automatically ask in which file you want add new module. 

If this did not happen, you have to add `'ZFLayoutChange'` value to the array with your modules. It should be in file _config/application.config.php_ or _config/modules.config.php_, and look like this:

```php
<?php

return [
    'modules' => [
        // your other modules
        
        'ZFLayoutChange', // new line
    ],
];
```

### 3. Add array with layouts for your modules

Add a new array with key `module_layouts` in your global configuration file _config/autoload/global.php_, or to _module.config.php_ for some modules if you want.

```php
<?php

return [
    // your other config arrays
    
    'module_layouts' => [
        'Admin' => 'layout/admin',
    ],
];
```

In the example above, controllers in _Admin_ module (and namespace) will use layout _layout/admin_. Otherwise, it will use default configured layout.

### 4. That is all!

Enjoy your layout changing :)

## See a bug? Want to contribute?

If you see any bug or you experience any troubles, please open a new issue or commit bugfix, I will look at it.

If you want to change something (maybe I didn't make it the best way), feel free to fork repository and create new merge requests.

Also if you want this on Zend Framework 2, feel free to contribute. I do not use ZF2 anymore, so it is up to you now.

## License

This module uses MIT license.
