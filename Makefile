lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
install:
	composer install
start:
	php ./bin/parsingPurchases