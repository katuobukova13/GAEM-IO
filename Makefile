init:
	npm install
	composer install

env:
	cp .env.example .env

up:
	./vendor/bin/sail up

migrate:
	./vendor/bin/sail exec laravel.test php artisan migrate --seed

work:
	./vendor/bin/sail exec laravel.test php artisan schedule:work

test:
	./vendor/bin/sail exec laravel.test php artisan test

start:
	npm run dev

down:
	./vendor/bin/sail down
