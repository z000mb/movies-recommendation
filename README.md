# Movies Recommendation
### To run project:
`docker compose up -d` \
`docker compose exec php-cli php public/index.php`

### Usage:
In the `index.php` file we can choose from 3 movie recommendation algorithms: \
`RecommendationType::RANDOM` - selects 3 random videos \
`RecommendationType::FIRST_LETTER_W_AND_EVEN_CHARACTERS` - selects all movies that start with the letter W and have an even number of characters \
`RecommendationType::MULTI_WORD` - selects all movies with at least two words

### To run tests:
`docker compose exec php-cli php vendor/bin/phpunit`

### Enter into `php-cli` container:
`docker compose exec php-cli sh`
