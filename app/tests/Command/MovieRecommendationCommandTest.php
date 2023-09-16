<?php

declare(strict_types=1);

namespace App\Tests\Command;

use App\MovieRecommendation\RandomRecommendation;
use PHPUnit\Framework\TestCase;
use App\Command\MovieRecommendationCommand;

/**
 * @covers \App\Command\MovieRecommendationCommand
 */
class MovieRecommendationCommandTest extends TestCase
{
    public function testRunWithValidInputRandomType(): void
    {
        $command = new MovieRecommendationCommand();
        $output = $this->getCommandOutput($command, ['random']);

        $movies = explode(',', $output);

        $this->assertCount(RandomRecommendation::AMOUNT, $movies);
    }

    public function testRunWithInvalidInput(): void
    {
        $command = new MovieRecommendationCommand();

        $output = $this->getCommandOutput($command, ['InvalidType']);

        $this->assertStringContainsString(MovieRecommendationCommand::USAGE_MESSAGE, $output);
    }

    private function getCommandOutput(MovieRecommendationCommand $command, array $args): string
    {
        ob_start();
        $command->run($args);
        return ob_get_clean();
    }
}
