# ЛР №3. Laravel: галерея картин

Приложение «АртГалерея» на Laravel 12: CRUD для картин (миграции, Eloquent, контроллер, Blade, валидация, Soft Deletes). Bootstrap и SCSS собираются через Laravel Mix.

## Запуск

    composer install
    npm install
    copy .env.example .env
    php artisan key:generate
    type nul > database\database.sqlite
    php artisan migrate --seed
    php artisan storage:link
    npm run dev
    php artisan serve

Сайт: http://127.0.0.1:8000/paintings