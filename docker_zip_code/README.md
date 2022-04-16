# Configuración del docker.

Para configurar el docker debes cambiar las variables de entorno, app.conf y crear ssl.

## Variables de entorno

Antes de iniciar la construcción de cada docker debes cambiar el nombre de cada proyecto.

``PROJECT_NAME=NOMBRE_DEL_PROYECTO``

#### Ruta de los volumenes
Este apartado es donde se almacena el contenido de los volumenes (archivos, directorios,etc) que se utilizan en la aplicación.

## Certificados SSL / HTTPS

Todas los servicios estan configurados de forma que se pueda acceder a ellos con https, pero antes de iniciar la construcción de cada docker debes configurar el certificado SSL.

#### Instalación de certificados

Para seguir los videos debemos instalar el servicio de mkcert, este servicio nos permite generar certificados SSL.

[Mkcert GitHub](https://github.com/FiloSottile/mkcert)

Cuando ya tienes configurado todo como en el repositorio de github, debes ejecutar el siguiente comando para generar el certificado SSL.

**NOTA: Debes crear la carpeta traefik/config/certs**

``cd /ssl && mkcert "*.localhost" localhost 127.0.0.1 ::1``

Recuerda que el dominio interno es lo que tenemos configurado en el archivo  ``.env``

## Construcción de Docker

Después de configurar todo lo anterior, debemos iniciar la construcción de cada docker.


### PHP - Nginx

En este apartado es donde ejecutaremos el serivicio de php 8 fpm con soporte para laravel

``docker-compose up -d``

Al terminar la construcción del docker podemos ingresar al navegador y verificar que el servicio esta funcionando.

<https://localhost>

**NOTA: En la carpeta php podremos cambiar la configuración la cuota de subida y el archivo xdebug, en la carpeta nginx archivo de configuración del nginx,en la carpeta config el archivo bashrc, El .bashrc es un script que se ejecuta cada vez que se inicia una nueva sesión de terminal**