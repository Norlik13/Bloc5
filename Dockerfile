FROM php:8.1-apache

# Installe les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Active mod_rewrite
RUN a2enmod rewrite

# Définit le dossier public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Corrige le VirtualHost
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Installe Composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copie les fichiers de l'application
COPY . /var/www/html

# Installe les dépendances PHP avec Composer
WORKDIR /var/www/html
RUN composer install --no-interaction --prefer-dist --optimize-autoloader