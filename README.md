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
docker-compose run artisan key:generate
```

```bash
docker-compose run artisan optimize
```

```bash
docker-compose run artisan migrate
```

## Usage: Top 250 IMDB Movies

```bash
docker-compose run artisan storage:link
```

```bash
docker-compose run artisan import:top-imdb-movies
```

- Scraping URL: https://m.imdb.com/chart/top/
- Outcome / Extracted movies available in JSON format: http://localhost:8000/storage/top-imdb-movies.json

## Contributing
Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.