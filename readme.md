# Seguimiento

_Seguimiento_ es un Sistema Web realizado para el __Programa de Seguimiento a Graduados__ de la __Universidad Nacional de Ingenieria - UNI__ de _Managua, Nicaragua_. El proposito del desarrollo de sistema es la culminacion de estudio mediante monografia "_Reingenieria de Sistema de Seguimiento a Gaduados_".

1. Actual numbers don't matter, just that it's a number
⋅⋅1. Ordered sub-list
4. And another item.

⋅⋅⋅You can have properly indented paragraphs within list items. Notice the blank line above, and the leading spaces (at least one, but we'll use three here to also align the raw Markdown).

⋅⋅⋅To have a line break without a paragraph, you will need to use two trailing spaces.⋅⋅
⋅⋅⋅Note that this line is separate, but within the same paragraph.⋅⋅
⋅⋅⋅(This is contrary to the typical GFM line break behaviour, where trailing spaces are not required.)


## Puesta en marcha de _Seguimiento_

Para poner en marcha el sistema es necesario satisfacer unos pre-requisitos:

* [_Composer_](https://getcomposer.org/)
* _NPM_
* _Gulp_

### 1. [Composer](https://getcomposer.org/)

Instalacion global:
    
    $ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    $ php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    $ php composer-setup.php
    $ php -r "unlink('composer-setup.php');"
    $ sudo mv composer.phar /usr/local/bin/composer

## Contribuidores

[Samuel Jose Gutierrez Aviles](https://github.com/search-sam) y [Federico Alonso Matus Olivares](https://github.com/matusfede) quienes llevaron a cabo el desarrollo y la investigacion monografica.

## Licencia

La  framework Laravel es software de codigo abierto bajo la licecia del Instituto Tecnológico de Massachusetts [MIT license](http://opensource.org/licenses/MIT).
