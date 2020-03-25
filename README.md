# php-laravel-expertsender
Basic ExpertSender Service API for Laravel

### installation
1. Add repository to composer.json
"repositories": [
      {
          "type": "vcs",
          "url":  "git@github.com:smidu/php-laravel-expertsender.git"
      }
]

2. Require package:
composer require smidu/php-laravel-expertsender

3. Add to packages service providers in Laravel config file:
ExpertSender\ExpertSenderServiceProvider::class

4. Publish package provider and config:
php artisan vendor:publish --provider="ExpertSender\ExpertSenderServiceProvider"


### usage examples
You can find usage examples i ExpertSenderExamples::class

