
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://biblioteca.demircu.ru/admin-assets/images/logo/logo.png" width="400" alt="Laravel Logo"></a></p>



## Project objective
Write a library website that will receive books from connected publications via the Api <br>
There is also a public RESTful API (hereinafter API) for publishing sites, which will allow you to add, modify and delete books from the Library list.

## Api documentation

```php
  GET|HEAD        api/books ......................................... books.index › API\BookController@index
  POST            api/books ......................................... books.store › API\BookController@store
  GET|HEAD        api/books/{book} .................................... books.show › API\BookController@show
  PUT|PATCH       api/books/{book} ................................ books.update › API\BookController@update
  DELETE          api/books/{book} .............................. books.destroy › API\BookController@destroy
  GET|HEAD        api/publishers/list ......................... publishers.list › API\BookController@destroy
```

> Before starting all actions, you will need to clarify your API token With the administrator <br>
> Example: 12|pIpin8EZeSSqo42wewertetrewwwetwrLrp

### Registration
> URL: https://rest.griz-it.ru/api/auth/register <br>
> METHOD : POST
<details>
<summary>sending JSON</summary>
<p>

```json
{
    "name": "Ivan",
    "surname": "Ivanov",
    "email": "ivcenko@mail.ru",
    "phone": "+79268547485",
    "password": "5",
    "password_confirmation": "5"
}
```
</p>
</details>
<details>
<summary>receiving JSON</summary>
<p>

```json
{
    "status": true,
    "access_token": "8|tnxHXT0254P3EFUOm91O7vLeGbTh5u9oQ9iA4cZ2",
    "token_type": "Bearer"
}
```
</p>
</details>


### Login
> URL: https://rest.griz-it.ru/api/auth/login <br>
> METHOD : POST
<details>
<summary>sending JSON</summary>
<p>

```json
{
    "login": "tet@mail.ru | +79854587474",
    "password": "MainUs92!",
}
```
</p>
</details>
<details>
<summary>receiving JSON</summary>
<p>

```json
{
    "status": true,
    "access_token": "8|tnxHXT0254P3EFUOm91O7vLeGbTh5u9oQ9iA4cZ2",
    "token_type": "Bearer"
}
```
</p>
</details>
