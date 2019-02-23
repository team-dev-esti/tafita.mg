
## Server Requirements

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Installation

Clone repository

    git clone git@github.com:team-esti-bandy/hckiu19.git hckiu19

    cd hckiu19

Create .env

    cp .env.example .env

Install dependencies

    composer install

Generate app key

    php artisan key:generate

Create database with phpMyAdmin or HeidiSQL

Modify dafault configuration with your database name and database credential in .env file

Run migrations

    php artisan migrate --seed

Add your Google API key

    GOOGLE_CLIENT_ID=[client-id]
    GOOGLE_CLIENT_SECRET=[client-id]
    REDIRECT=[callback-url]