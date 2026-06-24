# Proyecto: Análisis de un Lenguaje de Programación (PHP)

Integrantes: Vicente Malonnek, Benjamín Ezpinosa,Matias Leiva y Pablo Tapia. 

Aplicación de consola para calcular el promedio y promedio general de cada alumno, que procesa las calificaciones de estudiantes mediante la lectura de un archivo estructurado en formato `.csv`.

El objetivo principal de este proyecto es poner en práctica la propiedad multiparadigma de PHP como lenguaje de programacion, enfocandonos en la programacion imperativa y la programacion orientada a objetos (POO) especificamente.

## Arquitectura y Paradigmas Utilizados

El sistema tiene las siguientes caracteristicas en base al objetivo:

1. **Programación Imperativa y Secuencial (`main.php`):**
   - Control del flujo principal de la aplicación, apertura y cierre seguro de recursos de archivos de texto (`fopen`, `fclose`).
   -Lectura dinamica linea por linea para optimizar el uso de memoria con0`fgetcsv`.
   - Implementación de un menú interactivo en bucle controlado por terminal (`readline`, `switch-case`) para la experiencia del usuario.

2. **Programación Orientada a Objetos (POO):**

   - **Abstracción y Encapsulamiento:** Uso de clases en distintos lugares para asegurar legibilidad y optimizacion de los procesos.

     - `Evaluador`: Clase controladora encargada de gestionar la colección de estudiantes, ejecutar ordenamientos analíticos de alto nivel y filtrar conjuntos basados en umbrales académicos.

     - `Estudiante`: Encapsula los datos de identidad y la colección de asignaturas. Implementa la lógica para delegar el cálculo parcial a los ramos correspondientes y consolidar el promedio general de forma eficiente.

     - `Nota`: Modela una asignatura específica junto a sus calificaciones. Garantiza la consistencia interna transformando tipos dinámicos de strings a floats.

## Características de la Interfaz de Terminal

Al ejecutar el programa principal, el usuario dispone de un menú interactivo con las siguientes opciones en tiempo real:

  **1. Mostrar Ranking:** Ordena a todos los estudiantes de mayor a menor según 
  su promedio general histórico.

  **2. Mostrar Reprobados:** Filtra y despliega exclusivamente a los alumnos cuyo promedio general es inferior a la nota mínima de aprobación (4.0).
  
  **3. Mostrar Aprobados:** Filtra y despliega a los alumnos con rendimiento satisfactorio (promedio general igual o superior a 4.0).
  
  **4. Salir:** Finaliza de manera limpia la ejecución del script.

## Instrucciones de Instalación y Ejecución

### Requisitos Previos

- Tener instalado PHP (versión 7.0 o superior recomendada para soporte nativo del operador de comparación por naves espaciales `<=>`).
*Nota: Puedes instalar PHP de forma independiente o instalarlo fácilmente a través de entornos como [XAMPP](https://www.apachefriends.org/), WAMP o MAMP.*

### Pasos para Ejecutar

1. Coloque todos los archivos del proyecto (`main.php`, `Evaluador.php`, `Estudiante.php`, `Nota.php`) junto con el archivo de datos `estudiantes.csv` en el mismo directorio de trabajo.

2. Abra una terminal o consola de comandos y navegue hasta la ruta de dicha carpeta:

```bash
   cd Proyecto-Analisis_de_un_Lenguaje_de_Programacion
```

3. Ejecute el script principal con el intérprete de PHP:

```bash
php main.php
```