# # FROM php:8.0-apache

# # # Enable Apache mod_rewrite
# # RUN a2enmod rewrite

# # # Install dependencies
# # RUN apt-get update && apt-get install -y openjdk-11-jre

# # # Copy pdftk-java from local file system
# # COPY pdftk.jar /usr/bin/pdftk.jar
# # RUN chmod +x /usr/bin/pdftk.jar && ln -s /usr/bin/pdftk.jar /usr/bin/pdftk

# # # Copy application source code to the Docker image
# # COPY ./ /var/www/html/

# # # Install additional PHP extensions if needed
# # RUN docker-php-ext-install mysqli pdo pdo_mysql

# # EXPOSE 80

# FROM php:8.0-apache

# # Enable Apache mod_rewrite
# RUN a2enmod rewrite

# # Install dependencies
# RUN apt-get update && apt-get install -y openjdk-11-jre \ 
#     wget \
#     poppler-utils \
#     ghostscript \
#     fonts-liberation \
#     pdftk \
#     git \
#     unzip

# # Copy pdftk-java from local file system
# COPY pdftk.jar /usr/bin/pdftk.jar


# # Make sure the file exists and set executable permissions
# RUN chmod +x /usr/bin/pdftk.jar && \
#     ln -s /usr/bin/pdftk.jar /usr/bin/pdftk
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# WORKDIR /var/www/html


# # Copy application source code to the Docker image
# COPY ./ /var/www/html/

# # COPY composer.json composer.lock ./
# # RUN composer install --no-dev --optimize-autoloader


# # Install additional PHP extensions if needed
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# EXPOSE 80
# CMD ["apache2-foreground"]

# FROM php:8.0-apache

# # Enable Apache mod_rewrite
# RUN a2enmod rewrite

# # Install dependencies
# RUN apt-get update && apt-get install -y openjdk-11-jre \ 
#     wget \
#     poppler-utils \
#     ghostscript \
#     fonts-liberation \
#     pdftk \
#     git \
#     unzip

# # Copy pdftk-java from local file system
# COPY pdftk.jar /usr/bin/pdftk.jar

# # Ensure the file exists, set executable permissions, and create the symbolic link
# RUN chmod +x /usr/bin/pdftk.jar && \
#     rm -f /usr/bin/pdftk && \
#     ln -s /usr/bin/pdftk.jar /usr/bin/pdftk

# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WORKDIR /var/www/html

# # Copy application source code to the Docker image
# COPY ./ /var/www/html/

# # Install additional PHP extensions if needed
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# EXPOSE 80
# CMD ["apache2-foreground"]

# FROM php:8.0-apache

# # Enable Apache mod_rewrite
# RUN a2enmod rewrite

# # Install dependencies
# RUN apt-get update && apt-get install -y \
#     openjdk-11-jre \
#     wget \
#     poppler-utils \
#     ghostscript \
#     fonts-liberation \
#     git \
#     unzip \
#     && rm -rf /var/lib/apt/lists/*

# # Copy pdftk-java from local file system
# COPY pdftk.jar /usr/bin/pdftk.jar

# # Ensure the file exists, set executable permissions, and create the symbolic link
# RUN chmod +x /usr/bin/pdftk.jar && \
#     ln -sf /usr/bin/pdftk.jar /usr/bin/pdftk

# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WORKDIR /var/www/html

# # Copy application source code to the Docker image
# COPY ./ /var/www/html/

# # Install additional PHP extensions if needed
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# EXPOSE 80
# CMD ["apache2-foreground"]

# Use Debian Bullseye as the base for installing pdftk-java
FROM php:8.0-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y \
    openjdk-11-jre \
    wget \
    poppler-utils \
    ghostscript \
    fonts-liberation \
    git \
    unzip

# Install pdftk-java from the official package
RUN apt-get install -y pdftk-java

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy application source code to the Docker image
COPY ./ /var/www/html/

# Install additional PHP extensions if needed
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose the port for the Apache web server
EXPOSE 80

# Start Apache server in the foreground
CMD ["apache2-foreground"]