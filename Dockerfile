#
## Build
FROM php:8.1-fpm-alpine as php

# Install system dependencies
RUN apk update --no-cache \
	&& apk add \
	icu-dev \
	oniguruma-dev \
	tzdata

# Install PHP extensions
RUN docker-php-ext-install intl mbstring

# Clear cache
RUN rm -rf /var/cache/apk/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/app

# Copy source
COPY . .

# Run Application
EXPOSE 8090
CMD ["php", "-S", "0.0.0.0:8090"]
