<?php

declare(strict_types=1);

namespace App\MovieRecommendation;

final class MultiWordRecommendation implements RecommendationStrategyInterface
{
    public function recommend(array $movieList): array
    {
        $filteredMovies = array_filter($movieList, static function ($movie) {
            return count(explode(' ', $movie)) > 1;
        });

        return array_values($filteredMovies);
    }
}
