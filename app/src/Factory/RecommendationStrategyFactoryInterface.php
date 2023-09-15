<?php

namespace App\Factory;

use App\Enum\RecommendationType;
use App\MovieRecommendation\RecommendationStrategyInterface;

interface RecommendationStrategyFactoryInterface
{
    public static function createStrategy(RecommendationType $recommendationType): RecommendationStrategyInterface;
}
