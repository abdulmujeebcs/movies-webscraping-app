# Movies Scrapper App

A software application equipped with a built-in web scraper designed to gather information about movies from across the globe.

## Technical Stack
- PHP >= 8.1
- Laravel 10

## Project Setup
Clone the project source code from the [Repository](https://github.com/abdulmujeebcs/movies-webscraping-app).
```bash
git clone https://github.com/abdulmujeebcs/movies-webscraping-app
```

```bash
composer install
```

Update your `.env` file Information before serving the application

```bash
cp .env.example .env
```

Key genration for application

```bash
php artisan key:generate
```

```bash
php artisan optimize
```

## Run Migrations

```bash
php artisan migrate
```


## Contributing
Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.