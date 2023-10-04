<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Repository\MovieRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Repository\MovieRepository
 */
final class MovieRepositoryTest extends TestCase
{
    private MovieRepository $movieRepository;

    protected function setUp(): void
    {
        $this->movieRepository = new MovieRepository();
    }

    public function testGetAllMoviesReturnsArray(): void
    {
        $movies = $this->movieRepository->getAllMovies();

        $this->assertIsArray($movies);
    }

    public function testGetAllMoviesContainsData(): void
    {
        $movies = $this->movieRepository->getAllMovies();

        $this->assertNotEmpty($movies);
    }
}
