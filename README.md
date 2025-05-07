## Tech Stack

- Laravel 12
- Sqlite
- [Open Meteo](https://open-meteo.com/) API


### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & NPM
- SQLite

### Local Setup Steps

After cloning the project to a folder on your device, use the following steps.

1. **Install PHP Dependencies**
````bash
composer install
````

2. **Set up Environment File**
````bash
cp .env.example .env
````

3. **Create SQLite Database**
````bash
touch database/database.sqlite
````

4. **Run Database Migrations**
````bash
php artisan migrate
````

5. **Install Frontend Dependencies and Build Assets**
````bash
npm install && npm run build
````

6. **Start Laravel Development Server**
In a new terminal window:
````bash
php artisan serve
````

Your application will be available at [http://localhost:8000](http://localhost:8000)
