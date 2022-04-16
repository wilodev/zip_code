## Proyecto código postal México

Este proyecto esta construido con el fin de ayudar a los usuarios a encontrar el los datos de la ciudad basado en un código postal de México

-   [URL local del proyecto](https://localhost).
-   [URL HEROKU del proyecto](https://zip-code-wilodev.herokuapp.com/).

## Docker Laravel - Php 8

Este proyecto tiene como soporte docker:

-   Php Fpm 8
-   Nginx
-   Mysql

Para poder trabajar con docker debes tener instalado docker.
Luego de esto se debe acceder a la carpeta `docker_zip_code` y seguir las instrucciones del archivo `README.md`

Cuando ya se tiene el proyecto en desplegado en el entorno dev puedes acceder al navegador y verificar que el servicio esta funcionando.

Antes de empezar a consultar por código postal debes cambiar a la rama develop donde se tiene un enlace para cargar la base de datos.

`git checkout develop`

Al terminar de recorrer todos los archivos zip se vuelve al home y podemos acceder con el enlace `Api Prueba del proyecto` o `https://localhost/api/zip-codes/22994`.

Esta opción solo esta en la rama `develop` en main de heroku no tenemos esta opción.

**Nota: En las pruebas realizadas en este docker el tiempo es de 270ms**
