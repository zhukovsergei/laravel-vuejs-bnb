docker-build:
	docker-compose build

docker-stop:
	docker-compose stop

docker-up:
	docker-compose up -d

composer-install:
	docker-compose run --rm php-cli composer install

manager-test-unit:
	docker-compose run --rm php-cli php bin/phpunit --testsuite=unit

manager-assets-install:
	docker-compose run --rm manager-node yarn install
	docker-compose run --rm manager-node npm rebuild node-sass

manager-assets-dev:
    docker-compose run --rm manager-node yarn encore dev
	docker-compose run --rm manager-node npm run dev

vite-install:
    docker-compose run --rm manager-node npm install
vite-up:
    docker-compose run --publish 3000:3000 manager-node yarn vite --host

vue-install:
    docker-compose run --rm manager-node npm i
    docker-compose run -w=/var/www/app/vue --rm manager-node npm i
    docker-compose run --workdir='/var/www/app/vue' --rm manager-node npm i


vue-up:
    docker-compose run --publish 3000:3000 --rm manager-node yarn vite --host
    docker-compose run -w="/var/www/app/vue" --publish 3000:3000 --rm manager-node yarn vite --host
