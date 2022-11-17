<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> -->

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre este projeto

Efetue o clone do projeto;

clone a pasta .env.example para .env (cp .env.example .env)
Entre na pasta do projeto e ajuste as configurações do banco no arquivo .ENV

Execute:
composer install
npm install
php artisan migrate --seed
php artisan serve
npm run dev

Rotas disponiveis via api:
/api/site/noticias -> Lista todas as noticias ordenadas por data
/api/site/noticias/tags -> Lista todas as noticias filtradas por tags. Para filtrar basta colocar a palavra e o separador &
Exemplo:
api/site/noticias/tags/Lorem&Amet&Dolor


##Requisitos:
Requisito do Laravel 9 mesmo, php 8 em diante com algumas extensões ativas no php.ini

extension=curl <br>
extension=fileinfo  <br>
extension=mbstring  <br>
extension=openssl <br>
extension=pdo_mysql <br>




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
