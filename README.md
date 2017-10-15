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
