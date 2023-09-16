<?php

declare(strict_types=1);

namespace App\Tests\MovieRecommendation;

use App\MovieRecommendation\MultiWordRecommendation;
use App\Tests\Shared\RecommendationTestSetupTrait;
use PHPUnit\Framework\TestCase;

final class MultiWordRecommendationTest extends TestCase
{
    use RecommendationTestSetupTrait;

    /**
     * @covers \App\MovieRecommendation\MultiWordRecommendation
     */
    public function testRecommend(): void
    {
        $strategy = new MultiWordRecommendation();
        $recommendations = $strategy->recommend($this->movieList);

        $this->assertContains("The Dark Knight", $recommendations);
        $this->assertContains("Pulp Fiction", $recommendations);
        $this->assertContains("The Godfather", $recommendations);
        $this->assertContains("Forrest Gump", $recommendations);
        $this->assertCount(4, $recommendations);
    }
}
