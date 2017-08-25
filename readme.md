# Seguimiento

_Seguimiento_ es un Sistema Web realizado con el marco de trabajo [__Laravel__](https://laravel.com/) para el [__Programa de Seguimiento a Graduados__](http://www.graduados.uni.edu.ni/) de la [__Universidad Nacional de Ingenieria - UNI__](http://www.uni.edu.ni/) de [__Managua, Nicaragua__](http://mapanica.net/#13/12.1462/-86.2737). El proposito del desarrollo de sistema es la culminacion de estudio mediante monografia _"Reingenieria de Sistema de Seguimiento a Gaduados"_.

> _Guiá basada totalmente en [Fedora](https://getfedora.org/) 25 y [Laravel](https://laravel.com/) 5.4 para ser ejecutada_.

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
$ su -                                  // Cambiar a Usuario ROOT (Super Usuario / Usurio Administrador del Sistema)
# dnf install mariadb mariadb-server    // Instalar servidor MariaDB (Ver 15.1 Distrib 10.1.21-MariaDB)
# systemctl enable mariadb.service      // Habilitar arranque automático junto con arranque del sistema operativo
# systemctl start mariadb.service       // Iniciar servidor de base de datos
# exit                                  // Cambiar a Usuario de Escritorio (Abandonar permisos administrativos)
$ mysql_secure_installation             // Iniciar la configuración automática de MariaDB
```

> _Se recomienda usar [DBeaver](http://dbeaver.jkiss.org/) pero se puede usar [phpMyAdmin](https://www.phpmyadmin.net/), [MySQL Workbench](https://www.mysql.com/products/workbench/) o algún otro interfaz que prefiera._

### 2. [PHP](http://php.net/)

```bashscript
$ su -                                  // Cambiar a Usuario ROOT (Sùper Usuario / Usuario Administrador del Sistema)
# dnf install php php-common php-gd php-cli php-mbstring php-pdo php-xml // Instalar Lenguaje PHP (PHP 7.0.19)
# exit                                  // Cambiar a Usuario de Escritorio (Abandonar permisos administrativos)
```

Luego de instalar [PHP](http://php.net/) es recomendable reiniciar cualquier servicio relacionado ([Apache](https://www.apache.org/), [MariaDB](https://mariadb.org/)) a PHP y/o su funcionamiento:

```bashscript
$ su -                                  // Cambiar a Usuario ROOT (Súper Usuario / Usuario Administrador del Sistema)
# systemctl restart servicio            // Reiniciar el servicio _servicio_
# exit                                  // Cambiar a Usuario de Escritorio (Abandonar permisos administrativos)
```

### 3. [Composer](https://getcomposer.org/)

Instalación global:

```bashscript
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"     // Descargar el instalador de composer
$ php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"             // Comprobar la autenticidad del archivo instalador de composer
$ php composer-setup.php                                                        // Ejecutar el instalador de composer (versión 1.4.2)
$ php -r "unlink('composer-setup.php');"                                        // Eliminar archivo instalador de composer
$ su -                                                                          // Cambiar a Usuario ROOT (Súper Usuario / Usuario Administrador del Sistema)
# mv composer.phar /usr/local/bin/composer                                      // Instalado composer en ambiente global
# exit                                  // Cambiar a Usuario de Escritorio (Abandonado permisos administrativos)
```

Ahora solo vasta con ejecutar `$ composer` desde la terminal. Luego de la instalación de [Composer](https://getcomposer.org/) hay que ejecutarlo dentro de la carpeta del sistema. [Laravel](https://laravel.com/) usa [Composer](https://getcomposer.org/) como su manejador de dependencias así que si acaba de clonar este repositorio lo mejor es que verifique su archivo _composer.json_ y una ves conforme ejecute [Composer](https://getcomposer.org/) (`$ composer`) dentro de la carpeta donde se encuentra el archivo _composer.json_.

También es recomendable pero no necesario tener instalado el instalador propio de [Laravel](https://laravel.com/):

```bashscript
$ composer global require "laravel/installer"   // Instalando los requerimientos del instalador de laravel (versión ^1.3)
```

Asegurece de agregar a su variable de entorno `$PATH` la ubicación del directorio del instalador de laravel.
Esto se puede hacer de dos maneras:

La primera es modificando la variable en vivo desde la terminal con el comando:

 ```bashscript
$ export PATH=$HOME/.config/composer/vendor/bin // Incluyendo la instalación en la variable de entorno
```

La segunda es agrando una linea a su archivo `~/.bashrc` o al archivo de entorno de su emulador de terminal:

```bashscript
$ nano ~/.bashrc
$ export PATH=$HOME/bin:/usr/local/bin:$HOME/.composer/vendor/bin:$PATH // Incluyendo la instalación en la variable de entorno
$ ^X
```

### 4. [NodeJS](https://nodejs.org/es/)

La mejor forma de instalar [NodeJS](https://nodejs.org/es/) en casi cualquier (si no en todas) distribución [Linux](https://www.linuxfoundation.org/) es a través de Node Versión Manager - NVM (Manejador de versiones de [NodeJS](https://nodejs.org/es/)) para tener control de que versión de [NodeJS](https://nodejs.org/es/) tenemos instalada y de cual se esta utilizando, por tanto debemos instalar primero NVM.

Normalmente NVM no se puede instalar con tu manejador de paquetes debido a que debería de venir junto con [NodeJS](https://nodejs.org/es/) que aun no tenemos instalado, así que lo instalaremos a mano:

    $ su -                                  // Cambiar a Usuario ROOT (Súper Usuario / Usuario Administrador del Sistema)
    # dnf install curl                      // Instalar el gestor de descarga Curl (Es solo un pre-requisito para la descarga de archivos desde la consola, también se puede usar wget o algún otro.)
    # curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.32.0/install.sh | NVM_DIR=/usr/local/nvm bash    // Instala NVM de manera global en el ambiente

En este momento ya tenemos NVM instalado y listo para funcionar. Ahora instalaremos [NodeJS](https://nodejs.org/es/):

    $ nvm install node                      // Para instalar la versión de nodejs mas actual que este disponible.

Alternativamente:

    $ nvm install v4.5.0                    // Para instalar la versión especifica de nodejs

Verificamos las versiones de [NodeJS](https://nodejs.org/es/) que tenemos instaladas para saber cual usaremos ya que por lo general instala mas de una y ocupa por defecto la LTS (Long Time Suport / Soporte a Largo Plazo) o la mas actual.

    $ nvm ls                                // Lista las versiones de nodejs instaladas
    $ nvm use v4.5.0                        // Selecciona, usa y coloca por defecto la versión 4.5.0 de nodejs

> _Para meyor informacion sobre el uso de NVM visita https://github.com/creationix/nvm/blob/master/README.markdown._

### 5. [NPM](https://www.npmjs.com/)

    $ su -                                  // Cambiar a Usuario ROOT (Súper Usuario / Usuario Administrador del Sistema)
    # dnf install npm                       // Instalar el manejador de paquetes npm para NodeJS

Al igual que [Composer](https://getcomposer.org/), [NPM](https://www.npmjs.com/) es un manejador de dependencias y hay que ejecutarlo desde la terminal (`$ npm install`) dentro de la carpeta del sistema. Asi que si acaba de clonar este repositorio lo mejor es que verifique su archivo _package.json_ y una ves conforme ejecute [Composer](https://getcomposer.org/) (`$ npm install`) dentro de la carpeta donde se encuentra el archivo _package.json_.

### 6. [Gulp](http://gulpjs.com/)

Al ultimo pero no menos importante instalamos gulp para la compilación y procesamiento de archivos css y suderivados (sass y less), como archivos javascript y su derivados (coffescript, vue, angular) y hacer el desarrollo mas ágil y ordenado, como volver el sitio mas eficiente.

    $ npm install --global --save gulp-cli  // Instala gulp de manera global y perpetua

Cuando [Gulp](http://gulpjs.com/) ya este instalado se ejecuta desde la terminal (`$ gulp`) en la carpeta del sistema. [Gulp](http://gulpjs.com/) lee el archivo _gulpfile.js_ donde se encuentra su configuración. Si acaba de clonar este repositorio lo mejor es que verifique su archivo _gulpfile.js_ y una ves conforme ejecute [Gulp](http://gulpjs.com/) (`$ gulp`) dentro de la carpeta donde se encuentra el archivo _gulpfile.js_.

## Contribuidores

[Samuel Jose Gutierrez Aviles](https://github.com/search-sam) y [Federico Alonso Matus Olivares](https://github.com/matusfede) quienes llevaron a cabo el desarrollo y la investigación monográfica.

## Licencia

La framework [Laravel](https://laravel.com/) es software de código abierto bajo la licencia del Instituto Tecnológico de Massachusetts [MIT license](http://opensource.org/licenses/MIT).
