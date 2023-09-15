<?php

declare(strict_types=1);

namespace App\MovieRecommendation;

final class FirstLetterWAndEvenCharactersRecommendation implements RecommendationStrategyInterface
{
    public function recommend(array $movieList): array
    {
        $filteredMovies = array_filter($movieList, static function ($movie) {
            return stripos($movie, 'W') === 0 && strlen($movie) % 2 === 0;
        });

        return array_values($filteredMovies);
    }
}
