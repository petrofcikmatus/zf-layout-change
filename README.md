# ZF Layout Change Module

This is Zend Framework module, that can set different layout for different modules. 

If you have multiple (2+) modules in your application, and you want different layout for Admin module, this package will provide easiest way to do that change.

## How to use this package

### 1. Install package with composer

Require package with composer:
```
composer require petrofcikmatus/zf-layout-change
```

### 2. Add module to your modules

When you add this package with composer, it should automatically ask you, where you want add module. 

If this did not happen, you have to add `ZFLayoutChange` to the array with your modules. It should be in file `config/application.config.php` or `config/modules.config.php`, and look like this:

```
'modules' => [
    // your other modules
    
    'ZFLayoutChange', // new line
],
```

### 3. Add array with layouts

Add a new array in your ... TODO!!!

```
'module_layouts' => [
    'Admin' => 'layout/admin',
],
```

### 4. That is all!

Enjoy your layout changing and have a nice day :)

## See a bug?

If you see any bug or you experience any troubles, please open a new issue on github.

Also if you want this on Zend Framework 2, feel free to contribute. I do not use ZF2 anymore, so it is up to you only.
