# News Hub

## Configuração

Criar .env (usar arquivo ".env.example") e adicionar chaves do reCAPTCHA.
```
RECAPTCHA_PUBLIC_KEY=6LeuOLAUAAAAAMxHl1HHq5-LatgNR5NdrBsVCZ7T
RECAPTCHA_PRIVATE_KEY=6LeuOLAUAAAAAPkmKzXaD1jCEBRyR_ukKKeXIqeY
```

Configurar base de dados no .env.
```
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

É necessário que o arquivo [cacert.pem](curl.haxx.se/ca/cacert.pem) esteja presente em sua instalação do PHP, a fim de evitar erros de certificados SLL. O arquivo deve estar na pasta:
```
..\php\extras\ssl\
```
## Instalação

```bash
composer install
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Ferramentas

* [Laravel 5.8](https://laravel.com/docs/5.8)
* [News API](https://newsapi.org/)
* [reCAPTCHA](https://www.google.com/recaptcha/intro/v3.html)
* [Laravel-AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE)
* [Laravel 5 form builder](https://github.com/kristijanhusak/laravel-form-builder)
* [Tradução pt-br Laravel](https://github.com/lucascudo/laravel-pt-BR-localization)
* [Guzzle](https://github.com/guzzle/guzzle)
* [reCAPTCHA for Laravel 5](https://github.com/greggilbert/recaptcha)
 
 ## Esclarecimentos
 
* Utilizar somente localhost, caso contrário, a validação reCAPTCHA não funcionará.
* O requisito de paginação de notícias utilizando ajax (c.iv) não foi implementado.
