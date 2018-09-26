FROM php:7.2.10

RUN apt-get update && \
    apt-get install -y git && \
    docker-php-ext-install bcmath