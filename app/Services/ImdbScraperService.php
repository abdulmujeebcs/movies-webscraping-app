<?php

namespace App\Services;

use App\Interface\ScraperInterface;
use \DomDocument;
use \DomXPath;
use Illuminate\Support\Str;

class ImdbScraperService implements ScraperInterface
{
    public $xpath;

    public function init($url)
    {
        $html = file_get_contents($url);
        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        // Use DOMXPath to query HTML elements
        $this->xpath = new DOMXPath($dom);
        return $this;
    }

    public function scrape():array
    {
        $movies = [];
        $xpath = $this->xpath;
        $movie_titles = $xpath->query('//*[@id="__next"]/main/div/div[3]/section/div/div[2]/div/ul/li/div[2]/div/div/div[1]/a');
        $movie_links = $xpath->query('//*[@id="__next"]/main/div/div[3]/section/div/div[2]/div/ul/li/div[2]/div/div/div[1]/a/@href');
        $movie_ratings = $xpath->query('//*[@id="__next"]/main/div/div[3]/section/div/div[2]/div/ul/li/div[2]/div/div/span/div/span');
        $movie_release_years = $xpath->query('//*[@id="__next"]/main/div/div[3]/section/div/div[2]/div/ul/li/div[2]/div/div/div[2]/span[1]');
        $movie_durations = $xpath->query('//*[@id="__next"]/main/div/div[3]/section/div/div[2]/div/ul/li/div[2]/div/div/div[2]/span[2]');

        // Iterate through the movie titles
        for ($i = 0; $i < count($movie_titles); $i++) {
            $title = $movie_titles[$i]->nodeValue;
            preg_match('/^([\d.]+)/', $movie_ratings[$i]?->nodeValue, $matches);
            $rating = @$matches[0];

            $movies[] = [
                'title' => Str::after($title, '. '),
                'rating' => $rating,
                'url' => $movie_links[$i]->nodeValue,
                'release_year' => $movie_release_years[$i]?->nodeValue,
                'duration' => $movie_durations[$i]?->nodeValue,
            ];
        }
        return $movies;
    }
}
