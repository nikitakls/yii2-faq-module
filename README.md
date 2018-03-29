Yii2 FAQ module
===============
FAQ extension for Yii2

Installation
------------
This module in development, use in production at your own risk
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```
composer require nikitakls/yii2-faq-module
```

Usage
-----

Once the extension is installed, simply use it in your code by:


- **Apply migrations**
```
yii migrate -p=@nikitakls/faq/migrations
```

- **Configure module**

Add module in config file application:
For frontend
```php
'modules'   => [
    'faq'   => 'nikitakls\faq\Faq',
],
```
For backend
```php
'modules'   => [
        'faq' => [
            'class' => \nikitakls\faq\Faq::class,
            'isBackend' => true,
        ],
],
```

- **Work with Faq Module**

You can add hint widget in you pages
```php
    <?= \nikitakls\faq\widgets\Aid::widget([
            'code' => 'hint-unique-code',
    ]) ?>
```

