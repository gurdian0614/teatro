# Proyecto teatro
Prueba Tecnica en el que se realiza una compra en línea ingresando el nombre de la persona que va a comprar el boleto, posteriormente muestra un mensaje con los
datos ingresados del mismo. 

1. Si la fecha actual es mayor que la fecha de la Obra, se deshabilita la opción de compra y muestra un mensaje que no está disponible.
2. Si la fecha actual es menor que la fecha de la Obra, se habilita la opción de compra.
3. Si la fecha actual es menor que la fecha de la Obra pero la disponibilidad es cero, de deshabilita la opción de compra y muestra un mensaje que no está disponible
asi como otro mensaje de Agotado.

## Configuración
1. Copiar o clonar este proyecto en la carpeta www (Apache) o htdocs si utiliza XAMPP.
2. Importar la Base de Datos a su Base de Datos Local. El archivo se llama [teatro.sql](https://github.com/gurdian0614/teatro/blob/master/db/teatro.sql).
3. Configurar las Base de Datos en el proyecto en el archivo [conexion.php](https://github.com/gurdian0614/teatro/blob/master/db/conexion.php).
    - **$hostname:** Si es local puede ser localhost o 127.0.0.1. Caso contrario colocar la direccion IP o dominio según corresponda.
    - **$database:** Por default el nombre de la base de datos se llama teatro.
    - **$username:** Usuario de la base de datos.
    - **$password:** Contraseña de la base de datos. Dejar en blanco si no posee una contraseña.
4. Una vez realizado los pasos, ya puede empezar a probar el proyecto.
5. Adjunto un [video](https://www.youtube.com/watch?v=q-AmLTLcVn0) en el que explico detalladamente el proyecto.
