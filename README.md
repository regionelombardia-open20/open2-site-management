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


### 2. Apply migrations

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


### 3. Backend configuration
To enable the plugin in backend add this configuration in backend/config/modules-amos.php file or in your main-local.php file. 
	
```php
<?php
'modules' => [
    'sitemanagement' => [
        'class' => 'amos\sitemanagement\Module',
    ],
],
```


### 4. Frontend configuration
In frontend the plugin must be enabled to ensure the metadata registration.
To enable the plugin in frontend add this configuration in frontend/config/modules-amos.php file or in your main-local.php file. 
	
```php
<?php
'modules' => [
    'sitemanagement' => [
        'class' => 'amos\sitemanagement\Module',
    ],
],
```

### 4. SiteManagementElement using ContentModel configuration
If you want create an element connected with a NEWS and you want to publish it  on the frontend remember to enable 
the module also on the frontend 
```php
<?php
'modules' => [
    'news' => [
        'open20\amos\news\AmosNews',
    ],
],
```


### 4. Module params
* **contentModelsEnabled** - array , Enable to create template/elements connected directly to the model content
```php
<?php
'contentModelsEnabled' => [
    'news' => 'open20\amos\news\AmosNews',   
],
```

* **urlDetailModelsEnabled** - array, Is the url to the detail in the Element (works only if the content is enbled  with  contentModelsEnabled)
```php
<?php
'urlDetailModelsEnabled' => [
    'news' => '/site/news-detail',   
],
```


* **whiteListClasses** - array, Used for the pubblication of the containers in model 'CLASS USERS', you can choose the roles to wich pubblicate
```php
<?php
'whiteListClasses' => [
    'BASIC_USER', 'VALIDATED_BASIC_USER',   
],
```

* **blackListClasses** - array, Used for the pubblication of the containers in model 'CLASS USERS', 
```php
<?php
    'blackListClasses' => [
    'BASIC_USER', 'VALIDATED_BASIC_USER',   
],
```


* **whiteListModuleRoutes** - array, Used for Advertising on landig frontpage, enable to show the routes/url of these modules
```php
<?php
    'whiteListModuleRoutes' => [ 'module-1', 'module-2'],
```

* **blackListModuleRoutes** - array, Used for Advertising on landig frontpage, 
```php
<?php
    'blackListModuleRoutes' => [ 'module-1', 'module-2'],
```

* **directoryForUploadVideo** - string, The directory where to uplad the videos for the slider, 
```php
<?php
    'directoryForUploadVideo' => '/path/directory',
```

