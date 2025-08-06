Setup this Project

- After cloning the repository make sure to create an .env file
- Copy the .env.example into the .env 
- Run these commands:
    - Composer Install
    - php artisan install:api
    - composer remove phpunit/phpunit
    - composer require pestphp/pest --dev --with-all-dependencies
    - composer require pestphp/pest-plugin-laravel –dev
    - ./vendor/bin/pest --init

- If you use XAMPP run these commands to initiate the database
    - php artisan migrate
    - php artisan db:seed




