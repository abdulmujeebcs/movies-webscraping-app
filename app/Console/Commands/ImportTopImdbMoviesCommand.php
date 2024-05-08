<?php

namespace App\Console\Commands;

use App\Interface\ScraperInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportTopImdbMoviesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:top-imdb-movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store IMDB Top Movies in json format';

    public function __construct(private ScraperInterface $scraper)
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $url = config('app.imdb_url') . '/chart/top/';
            // Run Scraper Service
            $movies = $this->scraper->init($url)
                ->scrape();
           
            $jsonData = json_encode($movies, JSON_PRETTY_PRINT);
            $filePath = 'top-imdb-movies.json';
    
            // Write the JSON data to a file
            Storage::disk('public')->put($filePath, $jsonData);
        } catch(\Exception $ex) {
            echo 'Scrapping Exception occured  >>>';
            echo $ex->getMessage();
        }
    }
}
