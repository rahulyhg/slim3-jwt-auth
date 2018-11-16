# Slim3 JWT Auth

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1e136d974fec47c3a152b4c5267326a0)](https://www.codacy.com/app/andrewdyer/slim3-jwt-auth?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=andrewdyer/slim3-jwt-auth&amp;utm_campaign=Badge_Grade)
[![Latest Stable Version](https://poser.pugx.org/andrewdyer/slim3-jwt-auth/v/stable)](https://packagist.org/packages/andrewdyer/slim3-jwt-auth)
[![Latest Unstable Version](https://poser.pugx.org/andrewdyer/slim3-jwt-auth/v/unstable)](https://packagist.org/packages/andrewdyer/slim3-jwt-auth)
[![License](https://poser.pugx.org/andrewdyer/slim3-jwt-auth/license)](https://packagist.org/packages/andrewdyer/slim3-jwt-auth)
[![Total Downloads](https://poser.pugx.org/andrewdyer/slim3-jwt-auth/downloads)](https://packagist.org/packages/andrewdyer/slim3-jwt-auth)
[![Daily Downloads](https://poser.pugx.org/andrewdyer/slim3-jwt-auth/d/daily)](https://packagist.org/packages/andrewdyer/slim3-jwt-auth)
[![Monthly Downloads](https://poser.pugx.org/andrewdyer/slim3-jwt-auth/d/monthly)](https://packagist.org/packages/andrewdyer/slim3-jwt-auth)
[![composer.lock](https://poser.pugx.org/andrewdyer/slim3-jwt-auth/composerlock)](https://packagist.org/packages/andrewdyer/slim3-jwt-auth)

A starter API which uses JSON web tokens for authenticating users.

## Index

* [License](#license)
* [Requirements](#requirements)
* [Installation](#installation)
* [Configuration](#configuration)
* [Useful Links](#useful-links)

## License

Licensed under MIT. Totally free for private or commercial projects.

## Requirements

* PHP 7.1.3+
* MySQL 5.7.20+
* Composer

## Installation

```
composer create-project andrewdyer/slim3-jwt-auth project_name
```

## Configuration
* Activate mod_rewrite, route all traffic to application's `/public` directory.
* Set up the project environment. Please see [JWT Auth](https://github.com/andrewdyer/jwt-auth#setting-up-the-jwt-provider) for JWT configuration options.
* Run all available migrations.

## Useful Links
* [Slim Framework](https://www.slimframework.com)
* [JWT Auth](https://github.com/andrewdyer/jwt-auth)
* [Illuminate Database](https://github.com/illuminate/database)
* [Phinx Migrations](https://book.cakephp.org/3.0/en/phinx.html)
* [Phinx - Writing Migrations](http://docs.phinx.org/en/latest/migrations.html)
* [Phinx - Commands](http://docs.phinx.org/en/latest/commands.html)
* [Database migrations in PHP with Phinx](https://helgesverre.com/blog/database-migrations-in-php-with-phinx)
* [The Dotenv Component](https://symfony.com/doc/current/components/dotenv.html)
* [The VarDumper Component](https://symfony.com/doc/current/components/var_dumper.html)