up:
	docker-compose build && docker-compose up -d
	
install:
	docker exec -it binary-tree composer install

test:
	docker exec -it binary-tree vendor/bin/phpunit tests --testdox --color

down:
	docker-compose down