# Movies Scrapper App

A software application equipped with a built-in web scraper designed to gather information about top movies from across the globe.

## Technical Stack
- PHP >= 8.1, Laravel 10

## Project Setup
Clone the project source code from the [Repository](https://github.com/abdulmujeebcs/movies-webscraping-app).
```bash
git clone https://github.com/abdulmujeebcs/movies-webscraping-app
```

Update your `.env` file Information before serving the application

```bash
cp .env.example .env
```

Create containers using DockerCompose

```bash
docker-compose up -d
```

Key genration for application

```bash
docker-compose run composer install
```

## Usage: Top 250 IMDB Movies (file located at storage/app/public directory)


```bash
docker-compose run artisan import:top-imdb-movies
```

- Scraping URL: https://m.imdb.com/chart/top/
- Outcome / Extracted movies available in JSON format: http://localhost:8000/storage/top-imdb-movies.json