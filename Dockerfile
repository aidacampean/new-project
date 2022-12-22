FROM php:fpm-alpine

ARG  WORK_DIR=/var/www

# Set working directory
WORKDIR ${WORK_DIR}

# Install dependencies
RUN apk update && apk add --no-cache php $PHPIZE_DEPS \
    php-common \
    bash \
    zip \
    unzip \
    curl \
    nodejs \
    npm \
    oniguruma-dev \
    php-mbstring \
    && docker-php-ext-install mysqli pdo pdo_mysql mbstring

RUN docker-php-ext-enable mbstring

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN addgroup -g 1000 www
#RUN adduser -D -H -u 1000 -s /bin/bash www -g www

RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "$(pwd)" \
    --ingroup "www" \
    --no-create-home \
    --uid "1000" \
    "www"

# Copy existing application directory contents
COPY . ${WORK_DIR}

#RUN cd ${WORK_DIR} && npm install

# Copy existing application directory permissions
COPY --chown=www:www . ${WORK_DIR}

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
