<?php

declare(strict_types=1);

namespace App\Factory;

use App\Enum\RecommendationType;
use App\MovieRecommendation\FirstLetterWAndEvenCharactersRecommendation;
use App\MovieRecommendation\MultiWordRecommendation;
use App\MovieRecommendation\RandomRecommendation;
use App\Tests\MovieRecommendation\RecommendationTestSetupTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Factory\RecommendationStrategyFactory::createStrategy
 */
final class RecommendationStrategyFactoryTest extends TestCase
{
    use RecommendationTestSetupTrait;

    public function testRecommendationStrategyFactory(): void
    {
        $randomStrategy = RecommendationStrategyFactory::createStrategy(RecommendationType::RANDOM);
        $this->assertInstanceOf(RandomRecommendation::class, $randomStrategy);

        $letterWStrategy = RecommendationStrategyFactory::createStrategy(RecommendationType::FIRST_LETTER_W_AND_EVEN_CHARACTERS);
        $this->assertInstanceOf(FirstLetterWAndEvenCharactersRecommendation::class, $letterWStrategy);

        $multiWordStrategy = RecommendationStrategyFactory::createStrategy(RecommendationType::MULTI_WORD);
        $this->assertInstanceOf(MultiWordRecommendation::class, $multiWordStrategy);
    }

    public function testIntegrationWithFactory(): void
    {
        $strategy = RecommendationStrategyFactory::createStrategy(RecommendationType::FIRST_LETTER_W_AND_EVEN_CHARACTERS);
        $recommendations = $strategy->recommend($this->movieList);

        $this->assertContains("Wanted", $recommendations);
        $this->assertContains("Whiplash", $recommendations);
        $this->assertCount(2, $recommendations);
    }
}
