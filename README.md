

## Project objective
...
## Api documentation

```php
  POST       api/auth/login .................................................................................................................................................................... auth.login › Api\AuthController@login
  POST       api/auth/register ........................................................................................................................................................... auth.register › Api\AuthController@register
  ```


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
