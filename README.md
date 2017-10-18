# Proyecto de página web para SGSSI

## Instalación en Linux

1. Descargar [Xampp para linux](https://www.apachefriends.org/es/index.html).
2. Dar permisos de ejecución al archivo con el comando `chmod +x nombre_del_archivo`.
3. Ejecutar como administrador la instalación `sudo ./nombre_del_archivo`.
    + Por defecto instalará Xampp en `/opt/lampp`.
4. Dar permisos a nuestro usuario para la carpeta donde se alojan las páginas web:
    + `sudo chown -R $USER:$USER /opt/lampp/htdocs`
    + Si no hacemos esto tendremos que usar `sudo` cada vez que queramos modificar archivos.
5. Por último, clonar este repositorio en su sitio:
    + `git clone git@github.com:AnderRasoVazquez/proyecto_seguridad.git /opt/lampp/htdocs/proyecto_seguridad`
    + Creará la carpeta `/opt/lampp/htdocs/proyecto_seguridad/` y en esta será en la que trabajemos.

Para probarlo entrar en la siguiente página con el navegador `http://localhost/proyecto_seguridad/`.

## 2 opciones para iniciar Xampp en Linux

 En nuestro caso **es necesario que Apache y MySQL estén corriendo**, FTP da lo mismo, no lo vamos a usar.

1. **(Con GUI)** Abrir el administrador de servers:
    + `sudo /opt/lampp/manager-linux-x64.run `
        + En la pestaña `Manage Servers` se pueden iniciar/reiniciar/parar el servidor Apache/MySQL/FTP.
2. **(Sin GUI)** usar comandos de Xampp:
    + Iniciar todos `sudo /opt/lampp/lampp start`
    + Parar todos `sudo /opt/lampp/lampp stop`
    + También se pueden iniciar o parar de uno en uno `/opt/lampp/lampp help`

## Creación del usuario

*Para poder hacer esto hay que asegurarse de que el servidor de MySQL de Xampp esté iniciado.*

1. Entrar al MySQL de Xampp:
    + `/opt/lampp/mysql -uroot` (por defecto no tiene contraseña)
2. Desde la consola de MySQL de Xampp:
    + `CREATE USER 'sgssi'@'localhost' IDENTIFIED BY 'sgssi';`
    + `GRANT ALL PRIVILEGES ON * . * TO 'sgssi'@'localhost';`

Ahora ya tenemos el usuario creado y si quisiéramos podríamos entrar a la consola de MySQL con él `/opt/lampp/bin/mysql -usgssi -p`

## Problemas comunes

### El servidor de MySQL no se puede iniciar

Es probable que haya un conflicto con el servidor de MySQL del ordenador porque utiliza el mismo puerto, solo hay que pararlo.

+ `sudo systemctl stop mysqld`
+ **(Opcional para que no se inicie por defecto)**`sudo systemctl disable mysqld`
+ `sudo /opt/lampp/lampp start` Ahora debería iniciarse.

## Anexos

+ [PHP coding guidelines](http://www.php-fig.org/psr/psr-2/#11-example)
