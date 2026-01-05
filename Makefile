APP_CONTAINER=app

up:
	docker compose up -d --build

build:
	docker compose build

down:
	docker compose down

restart:
	docker compose down
	docker compose up -d --build

bash:
	docker compose exec $(APP_CONTAINER) bash

migrate:
	docker compose exec $(APP_CONTAINER) php artisan migrate

seed:
	docker compose exec $(APP_CONTAINER) php artisan db:seed

fresh:
	docker compose exec $(APP_CONTAINER) php artisan migrate:fresh --seed

key:
	docker compose exec $(APP_CONTAINER) php artisan key:generate
install:
	docker compose exec $(APP_CONTAINER) composer install
