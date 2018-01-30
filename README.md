Yii2 FAQ module
===============
FAQ extension for Yii2

Installation
------------
This module in development, use in production at your own risk
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```
php composer.phar require ando/yii2-faq:dev-master
```

Usage
-----

Once the extension is installed, simply use it in your code by:


- **Apply migrations**
```
yii migrate -p=@ando/faq/migrations
```

- **Configure module**

Add module in config file application:

```php
'modules'   => [
    'faq'   => 'nikitakls\faq\Module',
],
```

- **Work with Faq Module**


