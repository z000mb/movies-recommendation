FROM php:8.2-cli-alpine

# Install system dependencies
RUN apk --no-cache add \
    git \
    autoconf \
    g++ \
    make \
    linux-headers

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Xdebug and enable it
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# Copy the Xdebug configuration file
COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Clean up
RUN apk del autoconf g++ make && \
    rm -rf /var/cache/apk/* /tmp/*

# Set the working directory
WORKDIR /app

# Entry point command
CMD [ "php" ]
