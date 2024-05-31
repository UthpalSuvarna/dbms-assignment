FROM php:8.1.28-apache-bullseye

# Install PHP extensions
RUN docker-php-ext-install mysqli