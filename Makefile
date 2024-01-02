build:
	docker build -t imagefractions .

start:
	docker run -it -d -v ${PWD}:/app --name containerfractions -p 8080:80 imagefractions

sh:
	docker exec -it containerfractions sh

test:
	docker exec containerfractions sh -c "php -d memory_limit=512M ./vendor/bin/phpunit"

