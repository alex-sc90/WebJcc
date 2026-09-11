# AGENTS.md - Judo Club Coruña

## Resumen del Proyecto
Página web para el Judo Club Coruña (judoclubcoruna.com) con dos versiones:
1. **HTML independiente** → `index.html` (sin WordPress)
2. **Tema WordPress** → `judo-club-theme/` (para judoclubcoruna.com)

## Estructura del Proyecto

```
C:\Users\alex\Desktop\webJCC\
├── index.html                  ← Página HTML independiente
├── css/style.css               ← Estilos HTML
├── js/main.js                  ← JavaScript HTML
├── img/                        ← Imágenes (vacía)
├── functions-horarios.php      ← Shortcode WordPress (obsoleto)
├── functions-contacto.php      ← Shortcode WordPress (obsoleto)
├── README.md                   ← Instrucciones HTML
├── judo-club-theme/            ← TEMA WORDPRESS (principal)
│   ├── style.css               ← Info del tema
│   ├── functions.php           ← Funciones principales
│   ├── header.php              ← Cabecera
│   ├── footer.php              ← Pie de página
│   ├── front-page.php          ← Homepage (carrusel + noticias)
│   ├── index.php               ← Fallback
│   ├── single.php              ← Noticia individual
│   ├── archive.php             ← Archivo noticias
│   ├── page.php                ← Página genérica
│   ├── screenshot.png          ← Preview del tema
│   ├── inc/
│   │   ├── custom-post-types.php   ← CPTs: Noticias, Fotos Carrusel
│   │   └── theme-settings.php      ← Panel "Opciones JCC"
│   ├── template-parts/
│   │   └── noticia-card.php        ← Tarjeta de noticia
│   └── assets/
│       ├── css/style.css           ← Estilos del tema
│       ├── js/main.js              ← JavaScript del tema
│       └── images/                 ← Imágenes (vacía, usuario las pone)
└── judo-club-theme.zip         ← ZIP para subir a WordPress
```

## Estado Actual
- ✅ Tema WordPress creado y empaquetado en ZIP
- ✅ Estructura base lista
- ⏳ Pendiente: Usuario sube imágenes a `assets/images/`
- ⏳ Pendiente: Usuario instala tema en judoclubcoruna.com

## Pendiente / Next Steps

### 1. Subir imágenes al tema
El usuario debe añadir en `judo-club-theme/assets/images/`:
- `logo.png` - Logo del club
- `hero-bg.jpg` - Fondo hero (recomendado: imagen de judo)
- `judo.jpg`, `jiu-jitsu.jpg`, `aikido.jpg`, `iaido.jpg`, `taichi.jpg`, `fitness.jpg`
- `sobre-nosotros.jpg` - Foto del gimnasio

### 2. Instalar tema en WordPress
1. Ve a `judoclubcoruna.com/wp-admin`
2. Apariencia > Temas > Añadir nuevo > Subir tema
3. Selecciona `judo-club-theme.zip`
4. Activar

### 3. Configurar después de instalar
- **Apariencia > Menús** → Crear menú "Menú Principal"
- **Apariencia > Opciones JCC** → Datos del club
- **Fotos Carrusel** → Añadir fotos al carrusel
- **Noticias** → Añadir noticias

## Custom Post Types (CPTs)

### Noticias (`noticia`)
- Título, contenido, imagen destacada
- Categoría: noticia | competicion | evento | galeria
- Se muestra automáticamente en homepage (máx 3)
- Se oculta si no hay noticias

### Fotos Carrusel (`foto_carrusel`)
- Título, imagen destacada
- Campo `_jcc_foto_orden` para ordenar
- Se muestra en homepage automáticamente

### Info Club (opciones)
- Almacenada en `wp_options` como `jcc_theme_options`
- Campos: telefono, email, direccion, horario_general, instagram, facebook, google_maps

## Funcionalidades Clave

### Carrusel
- Auto-play 5 segundos
- Flechas de navegación
- Puntos indicadores
- Touch support (móvil)
- Pausa al pasar ratón

### Panel de noticias
- Se oculta si no hay noticias publicadas
- Tarjetas con imagen, categoría, fecha, excerpt
- Enlace a noticia completa (single.php)

### Admin WordPress
- **Opciones JCC** → Apariencia > Opciones JCC
- **Noticias** → Menú lateral
- **Fotos Carrusel** → Menú lateral

## Datos del Club (predefinidos)
- Dirección: Calle Pintor Seijo Rubio, 19 Bajo, 15006 A Coruña
- Teléfono: 981 29 07 39
- Email: gimnasiojc.coruna@mundo-r.com
- Instagram: @judoclubcoruna
- Facebook: Judo Club Coruña
- Horarios en tabla estática en front-page.php

## Colores
- Primary (rojo): #c8102e
- Secondary (azul oscuro): #1a1a2e
- Dark: #0f0f1a
- Colores por disciplina: Judo #c8102e, Jiu-Jitsu #2563eb, Aikido #059669, Iaido #7c3aed, Tai Chi #d97706

## Fuentes
- Headings: Montserrat
- Body: Open Sans
- Icons: Font Awesome 6.4.0

## Cómo Continuar
Si necesitas continuar este proyecto:
1. Revisa este archivo para entender el estado
2. Pregunta al usuario qué quiere hacer
3. Los archivos principales están en `judo-club-theme/`
4. El ZIP está listo para subir: `judo-club-theme.zip`
