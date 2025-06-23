# How to Install
1. Composer and NPM install to install dependancies
    ```bash
    composer install
    npm install
    ```

1. Migrate database with seeder, this command will drop all previouse tables in the database and create fresh one. `---seed` will:
    1. Create an entry in users table for admin to login first time. `email:admin@admin.com` `password:12345678`
    1. Plans will be added as defined 
    ```bash
    php artisan migrate:fresh --seed
    ```
