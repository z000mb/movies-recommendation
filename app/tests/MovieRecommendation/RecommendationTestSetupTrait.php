<?php

declare(strict_types=1);

namespace App\Tests\MovieRecommendation;

trait RecommendationTestSetupTrait
{
    protected array $movieList;

    protected function setUp(): void
    {
        $this->movieList = [
            "Matrix",
            "Inception",
            "The Dark Knight",
            "Pulp Fiction",
            "Avatar",
            "Wanted",
            "Whiplash",
            "Shrek",
            "Gladiator",
            "The Godfather",
            "Forrest Gump"
        ];
    }
}
