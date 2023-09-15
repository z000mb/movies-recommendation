<?php

declare(strict_types=1);

namespace App\Tests;

use App\MovieRecommendation\RandomRecommendation;
use App\Tests\MovieRecommendation\RecommendationTestSetupTrait;
use PHPUnit\Framework\TestCase;

final class RandomRecommendationTest extends TestCase
{
    use RecommendationTestSetupTrait;

    /**
     * @covers \App\MovieRecommendation\RandomRecommendation
     */
    public function testRecommend(): void
    {
        $strategy = new RandomRecommendation();
        $recommendations = $strategy->recommend($this->movieList);

        $this->assertCount($strategy::AMOUNT, $recommendations);
    }
}
