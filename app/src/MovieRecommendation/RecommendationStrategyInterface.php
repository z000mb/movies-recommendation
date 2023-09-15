<?php

namespace App\MovieRecommendation;

interface RecommendationStrategyInterface
{
    public function recommend(array $movieList): array;
}
