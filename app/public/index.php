<?php

use App\Command\MovieRecommendationCommand;

require dirname(__DIR__) . '/vendor/autoload.php';

$args = $argv;
array_shift($args);

(new MovieRecommendationCommand())->run($args);
