#### Запуск Через докер
- `cp .env.example .env`

для запуск через make: `make init`
напрямую через докер:
- `docker compose up -d`
- `docker compose exec app composer install`
- `docker compose exec app php artisan key:generate`
- `docker compose exec app php artisan storage:link`

команды для make:
`make init`   - первый запуск
`make start`  - после первого запуска
`make down`   - остановка докера
`make test`   - запуск тестов

Ссылки
```
1.1. GET /api/v1/notebook/
1.2. POST /api/v1/notebook/
1.3. GET /api/v1/notebook/<id>/
1.4. POST /api/v1/notebook/<id>/
1.5. DELETE /api/v1/notebook/<id>/
```


swagger: http://localhost/api/documentation
