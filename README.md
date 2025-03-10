# proyecto-equipo

Aplicación desarrollada con **PHP** usando **MariaDB** como base de datos.

---

## 📌 Especificaciones principales

✅ Que se ejecute en PHP 8.1 o superior  
✅ Que se utilice una estructura Model-View-Controller  
✅ Que se utilice Orientación a Objetos  
✅ Que se utilice una base de datos MariaDB 10.1 o superior  
✅ Que se utilice Git para control de versiones.  

---

##  Levantar aplicación:

### 1. Clonar el repositorio

`git clone https://github.com/AidaVel/proyecto-equipo.git`

`cd proyecto-equipo`

### 2. Iniciar

● La ejecución del proyecto la he llevado a cabo mediante una máquina virtual con las especificaciones técnicas anteriores. Por lo tanto, una vez clonado el repositorio y después de comprobar las instalaciones requeridas y sus versiones, levantamos MariaDB con el comando:

`sudo mariadb -u root -p`

● Copiamos el script en el archivo **database.sql** para generar las tablas con los datos:

● Una vez terminada esta parte accedemos a la carpeta y ejecutamos el siguiente comando para levantarlo:

`php -S localhost:8000`

● En el navegador accedemos al puerto por defecto:

`localhost:8000`    

### 🔑 Credenciales

En el archivo de **config.php** encontraresmos las claves de acceso.

#### 📂 Base de datos

| Parámetro    | Valor        |
|-----------   |-----------   |
| **DB_HOST**  | localhost    |
| **DB_NAME**  | equipos_db   |
| **DB_USER**  | root         |
| **DB_PASS**  | password     |

---
