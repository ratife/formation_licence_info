FROM php:8.2-apache

# Installation de l'extension PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_auth_basic et mod_rewrite
RUN a2enmod auth_basic && a2enmod rewrite

# Autoriser .htaccess dans /var/www/html
RUN sed -i '/<Directory \/var\/www\/html>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copier les fichiers de protection
COPY .htaccess /var/www/html/.htaccess

# Mettre le fichier .htpasswd hors du dossier public
COPY .htpasswd /etc/apache2/.htpasswd

# Donner les bons droits
RUN chown www-data:www-data /etc/apache2/.htpasswd && chmod 640 /etc/apache2/.htpasswd
