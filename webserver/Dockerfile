FROM php:8.2-apache

# Instala PDO + cliente MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get update && apt-get install -y default-mysql-client && docker-php-ext-enable mysqli

# Define o nome do servidor no Apache
RUN echo "ServerName webserver" >> /etc/apache2/apache2.conf

# Habilita o mod_rewrite
RUN a2enmod rewrite

# Configura permissões de acesso ao diretório
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Define diretório de trabalho
WORKDIR /var/www/html

