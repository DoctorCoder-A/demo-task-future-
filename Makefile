init: docker-down-clean docker-build docker-up app-init
start: docker-down-clean docker-up
down: docker-down-clean

docker-build:
	docker compose build

docker-up:
	docker compose up -d

docker-down-clean:
	docker compose down -v --remove-orphans

app-init: composer-install artisan-key-generate artisan-storage-link

composer-install:
	docker compose exec app composer install
artisan-key-generate:
	docker compose exec app php artisan key:generate
artisan-storage-link:
	([ -L "public/storage" ] && rm -r public/storage) && ([ -d "storage/app/public" ] || mkdir storage/app/public) && docker compose exec app php artisan storage:link
test:
	./vendor/bin/sail php artisan test
