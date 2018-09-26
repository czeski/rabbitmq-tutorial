#!/bin/sh

start: composer up

up:
	@docker-compose up -d --build
	@docker-compose run php php composer.phar install

composer:
	@if [ ! -f composer.phar ]; then curl https://getcomposer.org/download/1.7.2/composer.phar -o composer.phar; fi

down:
	@docker-compose down


exec:
	@docker-compose run php

jump-php:
	@docker-compose run php /bin/bash

jump-rabbit:
	@docker-compose exec rabbit /bin/bash

rabbit-start:
	@docker-compose run -d --hostname rabbit --name rabbit