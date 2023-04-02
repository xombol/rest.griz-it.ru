

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


### Products
> URL: https://rest.griz-it.ru/api/auth/register <br>
> METHOD : Get
<details>
<summary>receiving JSON</summary>
<p>

```json
{
    "current_page": 1,
    "data": [
        {
            "name": "Тест",
            "price": "515.00",
            "count": 0,
            "properties": [
                {
                    "name": "Color",
                    "value": "Red"
                }
            ]
        },
        {
            "name": "Test 2",
            "price": "12312.00",
            "count": 0,
            "properties": [
                {
                    "name": "Color",
                    "value": "Blue"
                }
            ]
        }
    ],
    "first_page_url": "https://rest.griz-it.ru/api/products?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "https://rest.griz-it.ru/api/products?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "https://rest.griz-it.ru/api/products?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "https://rest.griz-it.ru/api/products",
    "per_page": 40,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
```
</p>
</details>

### Filter
> URL: https://rest.griz-it.ru/api/products/filter <br>
> ?properties[color][]=red&properties[color][]=white&properties[weight][]=1000<br>
> METHOD : Get
<details>
<summary>receiving JSON</summary>
<p>

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Тест",
            "price": "515.00",
            "count": 0,
            "properties": [
                {
                    "name": "color",
                    "value": "red"
                },
                {
                    "name": "weight",
                    "value": "1000"
                }
            ]
        }
    ],
    "first_page_url": "https://rest.griz-it.ru/api/products/filter?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "https://rest.griz-it.ru/api/products/filter?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "https://rest.griz-it.ru/api/products/filter?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "https://rest.griz-it.ru/api/products/filter",
    "per_page": 40,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
</p>
</details>


