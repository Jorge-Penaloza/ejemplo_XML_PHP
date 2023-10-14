# Ejemplo de XML con PHP

Este repositorio contiene un ejemplo de cómo manejar datos personales de arrendatarios en archivos XML utilizando PHP.

## Contexto

La empresa "Vive Feliz" requiere una página web que permita gestionar los datos personales de sus arrendatarios. Esta solución utiliza archivos XML para almacenar y recuperar la información.

## Características

- **Manejo de archivos XML**: La aplicación permite crear, leer, editar y cerrar archivos XML que contienen información sobre los arrendatarios.
  
- **Información del arrendatario**: Los datos que se manejan incluyen nombre, apellido, rut, tiempo de arriendo, monto y dirección.

- **Menú de opciones**: La página web cuenta con un menú que permite realizar diversas operaciones con los archivos, como abrir, leer, escribir y cerrar.

- **Impresión en PDF**: Se ha integrado la librería `html2pdf` para permitir la generación de documentos PDF con la información de los arrendatarios.

## Archivos principales

- `arrendatarios.xml` y `arrendatarios2.xml`: Archivos XML de ejemplo con datos de arrendatarios.
  
- `index.php`: Punto de entrada de la aplicación, contiene la lógica principal y el menú de opciones.
  
- `vistaImprimir.php`: Script encargado de generar el documento PDF con la información de los arrendatarios.

## Documentación

Dentro del repositorio, se incluye un archivo `docx` que proporciona una explicación detallada de los códigos y su funcionamiento.


## Autor

Este proyecto fue desarrollado por [Jorge Peñaloza](https://github.com/Jorge-Penaloza).

