<?php

namespace App\Interface;

interface ScraperInterface
{
    public function init(string $url);

    public function scrape():array;
}

