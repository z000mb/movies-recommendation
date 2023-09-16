<?php

declare(strict_types=1);

namespace App\Command;

use App\Enum\RecommendationType;
use App\Factory\RecommendationStrategyFactory;
use App\Repository\MovieRepository;

final class MovieRecommendationCommand
{
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

        var_dump($recommendations);
    }

    private function showUsage(): void
    {
        $possibleValues = array_map(static function ($type) {
            return $type->value;
        }, RecommendationType::cases());

        echo "Usage: php public/index.php <RecommendationType>\n";
        echo "Valid RecommendationTypes: " . implode(", ", $possibleValues) . "\n";
    }
}
