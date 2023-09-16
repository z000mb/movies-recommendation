# Movies Recommendation
## To run project:
`docker compose up -d`

## Usage:

#### `docker compose exec php-cli php public/index.php random` 
selects 3 random videos
#### `docker compose exec php-cli php public/index.php first_letter_w_and_even_characters`
selects all movies that start with the letter W and have an even number of characters
#### `docker compose exec php-cli php public/index.php multi_word`
selects all movies with at least two words

## To run tests:
`docker compose exec php-cli php vendor/bin/phpunit`

## Enter into `php-cli` container:
`docker compose exec php-cli sh`
