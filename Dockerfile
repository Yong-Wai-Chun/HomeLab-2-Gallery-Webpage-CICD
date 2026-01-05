FROM mirror.gcr.io/library/php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy project files into the web root
COPY . /var/www/html/

# Make homepage.php the default landing page
RUN echo "DirectoryIndex homepage.php" >> /etc/apache2/apache2.conf

# Allow Apache to serve the files properly
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && echo '<Directory /var/www/html/>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>' > /etc/apache2/conf-available/docker-allow.conf \
    && a2enconf docker-allow \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
