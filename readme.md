# Seguimiento

_Seguimiento_ es un Sistema Web realizado con el marco de trabajo [__Laravel__](https://laravel.com/) para el [__Programa de Seguimiento a Graduados__](http://www.graduados.uni.edu.ni/) de la [__Universidad Nacional de Ingenieria - UNI__](http://www.uni.edu.ni/) de [__Managua, Nicaragua__](http://mapanica.net/#13/12.1462/-86.2737). El proposito del desarrollo de sistema es la culminacion de estudio mediante monografia _"Reingenieria de Sistema de Seguimiento a Gaduados"_.

> _Guia basada totalmente en [Fedora](https://getfedora.org/) 25 y [Laravel](https://laravel.com/) 5.4 para ser ejecutada_.

## Puesta en marcha de _Seguimiento_

Para poner en marcha el sistema es necesario satisfacer unos pre-requisitos:

* [_PHP_](http://php.net/)
* [_MariaDB_](https://mariadb.org/)
* [_Composer_](https://getcomposer.org/)
* [__NodeJS__](https://nodejs.org/es/)
* [_NPM_](https://www.npmjs.com/)
* [_Gulp_](http://gulpjs.com/)

### 1. [MariaDB](https://mariadb.org/)

```bashscript
$ su -c "dnf install mariadb mariadb-server"    // Instalar servidor MariaDB
$ systemctl enable mariadb.service              // Habilitar arranque automatico junto con arranque del sistema operativo
$ systemctl start mariadb.service               // Iniciar servidor de base de datos
$ mysql_secure_installation                     // Iniciar la configuracion automatica de MariaDB
```

> _Se recomienda usar [DBeaver](http://dbeaver.jkiss.org/) pero se puede usar [phpMyAdmin](https://www.phpmyadmin.net/), [MySql Workbench](https://www.mysql.com/products/workbench/) o algun otro frontend que prefiera._

### 2. [PHP](http://php.net/)

```bashscript
$ su -c "dnf install php php-common php-pdo php-gd php-cli php-mbstring"  // Instalar Lenguaje PHP
```

Luego de instalar [PHP](http://php.net/) es recomendable reiniciar cualquier servicio relacionado ([Apache](https://www.apache.org/)/httpd.service, [MariaDB](https://mariadb.org/)/mariadb.service) a PHP y/o su funcionamiento:

```bashscript
$ systemctl restart servicio            // Reiniciar el servicio _servicio_
```

### 3. [Composer](https://getcomposer.org/)

Instalacion global:

```bashscripts
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"     // Descargar el instalador de composer
$ php composer-setup.php                                                        // Ejecutar el instalador de composer
$ php -r "unlink('composer-setup.php');"                                        // Eliminar archivo instaldor de composer
$ su -c "mv composer.phar /usr/local/bin/composer"                              // Instalado composer en ambiente global
```

Ahora solo vasta con ejecutar `$ composer` desde la terminal. Luego de la instalacion de [Composer](https://getcomposer.org/) hay que ejecutarlo dentro de la carpeta del sistema. [Laravel](https://laravel.com/) usa [Composer](https://getcomposer.org/) como su manejador de dependencias asi que si acaba de clonar este repo lo mejor es que verifique su archivo _composer.json_ y una ves conforme ejecute [Composer](https://getcomposer.org/) (`$ composer`) dentro de la carpeta donde se encuentra el archivo _composer.json_.

Es recomendable pero no necesario tener instalado el instalador propio de [Laravel](https://laravel.com/):

```bashscripts
$ composer global require "laravel/installer"       // Instalando los requerimientos del instaldor de laravel con composer
$ export PATH=$HOME/.config/composer/vendor/bin     // Incluyendo la instalacion en la variable de ambiente
```

### 4. [NodeJS](https://nodejs.org/es/)

La mejor forma de instalar [NodeJS](https://nodejs.org/es/) en casi cualquier (si no en todas) distribucion [Linux](https://www.linuxfoundation.org/) es a traves de Node Version Manager - NVM (Manejador de versiones de [NodeJS](https://nodejs.org/es/)) para tener control de que version de [NodeJS](https://nodejs.org/es/) tenemos instalada y de cual se esta utilizando, por tanto debemos instalar primero NVM.

Normalmente NVM no se puede instalar con tu manejador de paquetes debido a que deberia de venir junto con [NodeJS](https://nodejs.org/es/) que aun no tenemos instalado, asi que lo instalaremos a mano:

```bashscripts
$ su -c "dnf install curl"                      // Instalar el gestor de descarga Curl (Es solo un pre-requisito para la descarga de archivos desde la consola, tambien se puede usar wget o algun otro.)
$ su -c "curl -o- https://raw.githubusercontent.com/creationix/nvm/master/install.sh | NVM_DIR=/usr/local/nvm bash"    // Instala NVM de manera global en el ambiente
```

En este momento ya tenemos NVM instalado y listo para funcionar. Ahora instalaremos [NodeJS](https://nodejs.org/es/):

```bashscripts
$ nvm install node                      // Para instalar la version de nodejs mas actual que este disponible.
```

Alternativamente:

```bashscripts
$ nvm install v4.5.0                    // Para instalar la version especifica de nodejs
```

Verificamos las versiones de [NodeJS](https://nodejs.org/es/) que tenemos instaladas para saber cual usaremos ya que por lo general instala mas de una y ocupa por defecto la LTS (Long Time Suport / Soporte a Largo Plazo) o la mas actual.

```bashscripts
$ nvm ls                                // Lista las versiones de nodejs instaladas
$ nvm use v4.5.0                        // Seleciona, usa y coloca por defecto la version 4.5.0 de nodejs
```

> _Para meyor informacion sobre el uso de NVM visita https://github.com/creationix/nvm/blob/master/README.markdown._

Tambien se puede instalar NodeJS desde los repositorios:

```bashscripts
# dnf install -y nodejs
```

> Sin embargo uasr nvm para instalar NodeJS sigue siendo la mejor opcion.

### 5. [NPM](https://www.npmjs.com/)

```bashscripts
$ su -                                  // Cambiar a Usurio ROOT (Super Usuario / Usurio Administrador del Sistema)
# dnf install npm                       // Instalar el manejador de paquetes npm para NodeJS
```

Al igual que [Composer](https://getcomposer.org/), [NPM](https://www.npmjs.com/) es un manejador de dependencias y hay que ejecutarlo desde la terminal (`$ npm install`) dentro de la carpeta del sistema. Asi que si acaba de clonar este repo lo mejor es que verifique su archivo _package.json_ y una ves conforme ejecute [Composer](https://getcomposer.org/) (`$ npm install`) dentro de la carpeta donde se encuentra el archivo _package.json_.

### 6. [Gulp](http://gulpjs.com/)

Al ultimo pero no menos importante instalamos gulp para la compilacion y procesamiento de archivos css y suderivados (sass y less), como archivos javascript y su derivados (coffescript, vue, angular) y hacer el desarrollo mas agil y ordenado, como volver el sitio mas eficiente.

```bashscripts
$ su -c "npm install --global --save gulp-cli"  // Instala gulp de manera global y perpetua
```

Cuando [Gulp](http://gulpjs.com/) ya este instalado se ejecuta desde la terminal (`$ gulp`) en la carpeta del sistema. [Gulp](http://gulpjs.com/) lee el archivo _gulpfile.js_ donde se encuentra su configuracion. Si acaba de clonar este repo lo mejor es que verifique su archivo _gulpfile.js_ y una ves conforme ejecute [Gulp](http://gulpjs.com/) (`$ gulp`) dentro de la carpeta donde se encuentra el archivo _gulpfile.js_.

## Contribuidores

[Samuel Jose Gutierrez Aviles](https://github.com/search-sam) y [Federico Alonso Matus Olivares](https://github.com/matusfede) quienes llevaron a cabo el desarrollo y la investigacion monografica.

## Licencia

La framework [Laravel](https://laravel.com/) es software de codigo abierto bajo la licecia del Instituto Tecnológico de Massachusetts [MIT license](http://opensource.org/licenses/MIT).
