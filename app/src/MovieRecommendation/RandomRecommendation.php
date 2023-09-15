<?php

declare(strict_types=1);

namespace App\MovieRecommendation;

final class RandomRecommendation implements RecommendationStrategyInterface
{
    public const AMOUNT = 3;

    public function recommend(array $movieList): array
    {
        shuffle($movieList);
        return array_slice($movieList, 0, self::AMOUNT);
    }
}
