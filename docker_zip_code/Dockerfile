# Aplicación en Php 8.1 para Laravel 9 que se basa en Wilodev Dock
# Repositorio de Php 8.1
FROM php:fpm-buster
# Propietario
LABEL maintainer="wperez@cintanegra.net @wilodev"
LABEL name="wilodev-dock"
LABEL version="1"
# Asignar los argumentos
ARG PROJECT_NAME
# Instanlando dependencias para Laravel
RUN apt-get update && apt-get install -y    \
git 					                              \
curl                                        \
libpng-dev                                  \
libonig-dev                                 \
libxml2-dev                                 \
libzip-dev                                  \
nano                                        \
wget                                        \
sudo                                        \
vim                                         \
zsh                                         \
unzip
# Limpiando la cache
RUN apt-get  clean && rm -rf /var/lib/apt/lists/*
# Instalando las extenciones de php
RUN pecl install xdebug 						                   \
&& docker-php-ext-enable xdebug 				               \
&& docker-php-ext-install zip 					               \
&& docker-php-ext-install -j$(nproc) pcntl 		         \
&& docker-php-ext-install -j$(nproc) intl 	           \
&& docker-php-ext-install -j$(nproc) zip 		           \
&& docker-php-ext-install -j$(nproc) pdo_mysql 	       \
&& docker-php-ext-install -j$(nproc) exif 		         \
&& docker-php-ext-install -j$(nproc) mbstring	         \
&& docker-php-ext-install -j$(nproc) bcmath
RUN docker-php-ext-install gd
RUN docker-php-ext-configure gd
# Se copia el archivo del script de comandos
COPY ./config/.bashrc /root/.bashrc
# Instalando composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Agreamos Laravel de forma global
RUN composer global require laravel/installer
RUN echo 'PATH=$PATH:$HOME/.composer/vendor/bin' >> ~/.bashrc
# Creamos el usuario pasado como argumento desde el docker-compose.yml
# Cambiamos los permisos de los archivos y su propietario
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
# Añadimos el directorio de trabajo
WORKDIR /var/www/public/${PROJECT_NAME}
RUN chown -R www:www /var/www/public/${PROJECT_NAME}
# Se cambia de usuario
USER $USER
# Lanzamos el servicio
CMD ["php-fpm"]