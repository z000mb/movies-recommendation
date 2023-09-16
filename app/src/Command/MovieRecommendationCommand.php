<?php

declare(strict_types=1);

namespace App\Command;

use App\Enum\RecommendationType;
use App\Factory\RecommendationStrategyFactory;
use App\Repository\MovieRepository;

final class MovieRecommendationCommand implements MovieRecommendationCommandInterface
{
    public const USAGE_MESSAGE = "Usage: php public/index.php <RecommendationType>\n Valid RecommendationTypes: ";

    public function run(array $args): void
    {
        if (count($args) !== 1) {
            $this->showUsage();
            return;
        }

        $param = current($args);
        $recommendationType = RecommendationType::tryFrom($param);

        if (!$recommendationType && !in_array($recommendationType, RecommendationType::cases(), true)) {
            $this->showUsage();
            return;
        }

        $initialData = include dirname(__DIR__) . '/data/movies.php';
        $movieRepository = new MovieRepository($initialData);

        $selectedStrategy = RecommendationStrategyFactory::createStrategy($recommendationType);
        $recommendations = $selectedStrategy->recommend($movieRepository->getAllMovies());

        echo implode(', ', $recommendations) . PHP_EOL;
    }

    private function showUsage(): void
    {
        $possibleValues = array_map(static function ($type) {
            return $type->value;
        }, RecommendationType::cases());

        echo self::USAGE_MESSAGE . implode(", ", $possibleValues) . "\n";
    }
}
