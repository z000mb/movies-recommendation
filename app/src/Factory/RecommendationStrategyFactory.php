<?php

declare(strict_types=1);

namespace App\Factory;

use App\Enum\RecommendationType;
use App\MovieRecommendation\FirstLetterWAndEvenCharactersRecommendation;
use App\MovieRecommendation\MultiWordRecommendation;
use App\MovieRecommendation\RandomRecommendation;
use App\MovieRecommendation\RecommendationStrategyInterface;

final class RecommendationStrategyFactory implements RecommendationStrategyFactoryInterface
{
    public static function createStrategy(RecommendationType $recommendationType): RecommendationStrategyInterface {
        return match ($recommendationType) {
            RecommendationType::RANDOM => new RandomRecommendation(),
            RecommendationType::FIRST_LETTER_W_AND_EVEN_CHARACTERS => new FirstLetterWAndEvenCharactersRecommendation(),
            RecommendationType::MULTI_WORD => new MultiWordRecommendation(),
        };
    }
}
