<?php

declare(strict_types=1);

namespace App\Repository;

final class MovieRepository
{
    private array $movieList;

    public function __construct() {
        $this->movieList = include dirname(__DIR__) . '/data/movies.php';
    }

    public function getAllMovies(): array
    {
        return $this->movieList;
    }
}
