# Amos - Site Management

Plugin for site management.

## Installation

### 1. The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer require amos/site-management
```

or add this row

```
"amos/site-management": "dev-master"
```

to the require section of your `composer.json` file.


### 2. Add module to your main config in backend:
	
```php
<?php
'modules' => [
    'sitemanagement' => [
        'class' => 'amos\sitemanagement\Module',
    ],
],
```


### 3. Apply migrations

```bash
php yii migrate/up --migrationPath=@vendor/amos/site-management/src/migrations
```

or add this row to your migrations config in console:

```php
<?php
return [
    '@vendor/amos/site-management/src/migrations',
];
```
