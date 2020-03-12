# [Entity-Relationship Diagram (ERD)](https://en.wikipedia.org/wiki/Entity–relationship_model)

This is ERD, using [React](https://reactjs.org/) and [Laravel](https://laravel.com/).

## Example

![Google Structured data Entity-Relationship Diagram](./docs/images/erd.png?raw=true "Google Structured data Entity-Relationship Diagram")

This ERD is made with [Database schema designer](https://github.com/Agontuk/schema-designer).

## Code generation

### [Laravel Migrations](https://laravel.com/docs/master/migrations) to [Structured Query Language (SQL)](https://en.wikipedia.org/wiki/SQL)

```
php artisan migrate
```
### [SQL](https://en.wikipedia.org/wiki/SQL) to [Eloquent Models](https://laravel.com/docs/master/eloquent)

```
php artisan code:models
```
In the target project development environment this console command is part of the [Reliese](https://github.com/reliese/laravel) [Laravel](https://github.com/laravel/laravel) package.

## Copyright & license

- database structure & additional code: MIT license, Noud de Brouwer
