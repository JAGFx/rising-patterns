# -- Start Docker
start:
	@docker compose up -d

stop:
	@docker compose down

bash:
	@docker compose exec -it php bash

restart: stop start
# -- End Docker

# -- Start Environment
build: stop
	@docker compose build --pull --no-cache

install: start
	@sleep 1s
	@bin/php composer install
# -- End Environment

# -- Start Code linter & test (CI)
test: test\:unit test\:integration

test\:unit:
	@bin/console ./vendor/bin/phpunit tests/Unit

test\:integration:
	@bin/console ./vendor/bin/phpunit tests/Integration

lint:
	@bin/php php-cs-fixer fix --using-cache=no --diff
	@bin/php vendor/bin/phpstan analyse -n src
	@bin/php vendor/bin/rector process src

ci: lint test
# -- End Code linter & test (CI)
