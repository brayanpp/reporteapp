<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Reportes de Contaminación

Este es un proyecto desarrollado para el curso de **Proyecto de Ingeniería** en la **Universidad Nacional Abierta y a Distancia (UNAD)**. La aplicación se enfoca en la gestión de **reportes de contaminación hídrica** a través de un sistema web desarrollado con **Laravel** y **Filament**. Los usuarios pueden registrar y visualizar reportes relacionados con diferentes tipos de contaminación, tales como derrames de sustancias químicas, aguas residuales y otros problemas medioambientales. 

## Tecnologías Utilizadas

- **[Laravel](https://laravel.com)**: Framework de PHP para el desarrollo de aplicaciones web robustas y seguras. Laravel ofrece una sintaxis expresiva y herramientas para manejar tareas comunes como el enrutamiento, la gestión de bases de datos y la autenticación de usuarios.
- **[Filament](https://filamentphp.com)**: Un conjunto de herramientas para crear paneles de administración rápidos y hermosos. En este proyecto, Filament se usa para crear y gestionar el panel de administración, donde se visualizan los reportes y otros indicadores.
- **[SQLite](https://www.sqlite.org)**: Base de datos ligera, utilizada en este proyecto para almacenar los datos de los reportes de contaminación.

## Características del Proyecto

- **Registro de reportes**: Los usuarios pueden registrar reportes de contaminación, indicando el tipo de contaminación, ubicación, prioridad y estado del reporte.
- **Dashboard interactivo**: Un panel de administración desarrollado con Filament que permite visualizar estadísticas y gráficos sobre los reportes de contaminación.
- **Generación de reportes**: Los administradores pueden visualizar los reportes en una tabla y gráficos dinámicos como gráficos de barras y pasteles que muestran la distribución de los tipos de contaminación.
- **Autenticación de usuarios**: El sistema incluye una funcionalidad básica de autenticación, permitiendo que solo los usuarios registrados puedan crear o visualizar reportes.

## Instalación

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/brayanpp/reporteapp.git
