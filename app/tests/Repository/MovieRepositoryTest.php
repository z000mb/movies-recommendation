<?php

declare(strict_types=1);

namespace App\Repository;

use App\Tests\MovieRecommendation\RecommendationTestSetupTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Repository\MovieRepository
 */
final class MovieRepositoryTest extends TestCase
{
    use RecommendationTestSetupTrait;

    public function testGetAllMoviesReturnsInitialData(): void
    {
        $movies = (new MovieRepository($this->movieList))->getAllMovies();

        $expectedMovies = $this->movieList;

        $this->assertEquals($expectedMovies, $movies);
    }

    public function testGetAllMoviesReturnsEmptyArrayIfNoData(): void
    {
        $emptyRepository = new MovieRepository();
        $movies = $emptyRepository->getAllMovies();

        $this->assertEmpty($movies);
    }
}
