SISTEMA DE GESTION DE PERSONAJES DE JUEGO DE ROL - PHP ORIENTADO A OBJETOS

Aplicacion web completa desarrollada en PHP que implementa un sistema de gestion de personajes para juegos de rol utilizando programacion orientada a objetos. Diseñada para demostrar habilidades avanzadas en desarrollo backend y arquitectura de software.

ESTRUCTURA DEL PROYECTO

JUEGO_DE_ROL/
├── index.php - Pagina principal con formulario y historial
├── process.php - Procesamiento y creacion de personajes
├── limpiar_historial.php - Gestion de limpieza de datos
├── assets/css/style.css - Estilos tematicos medievales
├── includes/ - Componentes y formularios
│ ├── header.html - Cabecera de la aplicacion
│ ├── footer.html - Pie de pagina
│ ├── form_crear_personajes_1.php - Formulario inicial
│ ├── form_crear_personajes_2.php - Formulario especifico por clase
│ └── personajes.php - Definiciones de clases PHP
└── utils/functions.php - Funciones auxiliares

ARQUITECTURA ORIENTADA A OBJETOS

CLASE PADRE: Personaje

Atributos: nombre, especie, puntosExperiencia

Metodo: calcularExperiencia() (abstracto)

CLASES HIJA:

Guerrero: enemigosAbatidos, danoSufrido

Mago: secretosDescubiertos, hechizosLanzados

Explorador: objetivosDescubiertos, vecesSinSerDescubierto

FUNCIONALIDADES PRINCIPALES

Creacion de Personajes

Seleccion entre 3 clases: Guerrero, Mago, Explorador

Formularios dinamicos que cambian segun la clase seleccionada

Validacion de datos de entrada

Calculo automatico de puntos de experiencia

Sistema de Experiencia

Guerrero: (enemigosAbatidos × 10) + (danoSufrido × 5)

Mago: (secretosDescubiertos × 5) + (hechizosLanzados × 10)

Explorador: (objetivosDescubiertos × 10) + (vecesSinSerDescubierto × 5)

Gestion de Datos

Almacenamiento en sesiones PHP

Historial completo de personajes creados

Funcion de limpieza de historial con confirmacion

Persistencia de datos durante la sesion

Interfaz de Usuario

Diseño tematico medieval con paleta de colores acorde

Visualizacion organizada del historial

Mensajes de confirmacion y error

Navegacion intuitiva entre pasos

CARACTERISTICAS TECNICAS

Programacion Orientada a Objetos pura en PHP

Uso de sesiones para persistencia de datos

Formularios multipaso con validacion

Separacion de logica y presentacion (MVC basico)

Reutilizacion de componentes mediante includes

Manejo de excepciones y errores

Codigo modular y mantenible

TECNOLOGIAS IMPLEMENTADAS

PHP 7+ con soporte completo para OOP

HTML5 semantico

CSS3 con variables personalizadas y gradientes

JavaScript basico para confirmaciones

Sessions PHP para gestion de estado

Metodos POST para envio de formularios

FLUJO DE LA APLICACION

Usuario selecciona clase de personaje y nombre

Sistema muestra formulario especifico para la clase

Usuario introduce estadisticas del personaje

Sistema calcula puntos de experiencia automaticamente

Personaje se almacena en sesion y se muestra en historial

Usuario puede consultar o limpiar el historial en cualquier momento

VALIDACIONES IMPLEMENTADAS

Campos obligatorios completos

Formato correcto de nombres

Valores numericos en rangos adecuados

Prevencion de inyeccion SQL (htmlspecialchars)

Validacion de especies/clases validas

Confirmacion antes de acciones destructivas (limpiar historial)

HABILIDADES DEMOSTRADAS

Dominio de Programacion Orientada a Objetos en PHP

Diseño de jerarquias de clases y herencia

Implementacion de metodos abstractos y polimorfismo

Gestion avanzada de sesiones y estado

Creacion de formularios dinamicos y adaptativos

Validacion robusta de datos de usuario

Desarrollo de interfaces tematicas y atractivas

Organizacion de proyectos complejos

Separacion de responsabilidades (SOLID principles)

Manejo de excepciones y flujos de error

CASOS DE USO EJEMPLO

Creacion de Guerrero:

Nombre: "Thorin"

Enemigos abatidos: 15

Daño sufrido: 200

Experiencia calculada: (15×10) + (200×5) = 150 + 1000 = 1150 pts

Creacion de Mago:

Nombre: "Merlin"

Secretos descubiertos: 8

Hechizos lanzados: 45

Experiencia calculada: (8×5) + (45×10) = 40 + 450 = 490 pts

PUNTOS DESTACADOS DEL CODIGO

Jerarquia de Clases:

Clase abstracta Personaje con metodo abstracto

Especializacion por tipo con atributos especificos

Calculo de experiencia polimorfico

Gestion de Estado:

Uso de $_SESSION para almacenamiento

Mantenimiento del historial entre paginas

Limpieza controlada de datos

Interfaz de Usuario:

Formularios que se adaptan a la seleccion

Feedback visual inmediato

Diseño coherente y tematico

Seguridad:

Sanitizacion de entradas

Validacion de tipos de datos

Proteccion contra acceso directo a archivos

INSTALACION Y USO

Subir archivos a servidor con PHP habilitado

Asegurar que las sesiones PHP esten activadas

Acceder a index.php desde navegador web

Comenzar creando personajes mediante el formulario

REQUISITOS DEL SISTEMA

PHP 7.0 o superior

Soporte para sesiones habilitado

Navegador web moderno

Servidor web (Apache, Nginx, etc.)

EXTENSIONES POSIBLES

Base de datos para persistencia permanente

Sistema de batallas entre personajes

Mas clases de personajes (arquero, clerigo, etc.)

Exportacion de historial a PDF/Excel

Sistema de niveles y habilidades

Multiples usuarios con autenticacion

APLICACIONES PRACTICAS

Herramienta para maestros de juegos de rol

Ejemplo educativo de OOP en PHP

Base para sistemas mas complejos de gestion

Demostracion de habilidades tecnicas para portafolio

NOTAS DEL DESARROLLADOR

Este proyecto fue desarrollado como demostracion avanzada de habilidades en PHP OOP. Muestra capacidad para:

Diseñar arquitecturas de software escalables

Implementar patrones de diseño orientados a objetos

Crear sistemas complejos con mantenibilidad

Desarrollar interfaces de usuario intuitivas

Gestionar estado y persistencia en aplicaciones web

Seguir mejores practicas de desarrollo

El codigo sigue principios SOLID y esta organizado para facilitar su expansion y mantenimiento futuro.

AUTOR: Luis Enrique Molina Moreno
CONTACTO: le.molina87@outlook.com
LICENCIA: MIT
VERSION: 1.0
FECHA: 2025
