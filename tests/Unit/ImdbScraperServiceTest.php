<?php

namespace Tests\Unit\Services;

use App\Services\ImdbScraperService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ImdbScraperServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $scraper;

    protected function setUp(): void
    {
        $this->scraper = new ImdbScraperService();
    }

    /** @test */
    public function test_scrape_imdb_top_movies()
    {
        // Given
        $url = 'https://m.imdb.com/chart/top/';

        // When
        $movies = $this->scraper->init($url)->scrape();

        // Then
        $this->assertIsArray($movies);
        $this->assertNotEmpty($movies);

        // Asserting structure of a single movie item
        $this->assertArrayHasKey('title', $movies[0]);
        $this->assertArrayHasKey('rating', $movies[0]);
        $this->assertArrayHasKey('url', $movies[0]);
        $this->assertArrayHasKey('release_year', $movies[0]);
        $this->assertArrayHasKey('duration', $movies[0]);
    }

    // Additional tests can be added for error handling, etc.
}
