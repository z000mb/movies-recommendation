<?php

use App\Enum\RecommendationType;
use App\Factory\RecommendationStrategyFactory;
use App\Repository\MovieRepository;

require dirname(__DIR__) . '/vendor/autoload.php';

$initialData = include dirname(__DIR__) . '/data/movies.php';

$movieRepository = new MovieRepository($initialData);

$recommendationType = RecommendationType::RANDOM;
//$recommendationType = RecommendationType::FIRST_LETTER_W_AND_EVEN_CHARACTERS;
//$recommendationType = RecommendationType::MULTI_WORD;
$selectedStrategy = RecommendationStrategyFactory::createStrategy($recommendationType);
$recommendations = $selectedStrategy->recommend($movieRepository->getAllMovies());

var_dump($recommendations);
