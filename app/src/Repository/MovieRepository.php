<?php

declare(strict_types=1);

namespace App\Repository;

final class MovieRepository
{
    private array $movieList;

    public function __construct(array $initialData = []) {
        $this->movieList = $initialData;
    }

    public function getAllMovies(): array
    {
        return $this->movieList;
    }
}
