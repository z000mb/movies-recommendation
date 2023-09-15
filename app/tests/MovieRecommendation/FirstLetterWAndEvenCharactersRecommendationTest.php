<?php

declare(strict_types=1);

namespace App\Tests;

use App\MovieRecommendation\FirstLetterWAndEvenCharactersRecommendation;
use App\Tests\MovieRecommendation\RecommendationTestSetupTrait;
use PHPUnit\Framework\TestCase;

final class FirstLetterWAndEvenCharactersRecommendationTest extends TestCase
{
    use RecommendationTestSetupTrait;

    /**
     * @covers \App\MovieRecommendation\FirstLetterWAndEvenCharactersRecommendation
     */
    public function testRecommend(): void
    {
        $strategy = new FirstLetterWAndEvenCharactersRecommendation();
        $recommendations = $strategy->recommend($this->movieList);

        $this->assertContains("Wanted", $recommendations);
        $this->assertContains("Whiplash", $recommendations);
        $this->assertCount(2, $recommendations);
    }
}
