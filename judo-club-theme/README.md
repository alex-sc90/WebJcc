# Judo Club Coruña - Tema WordPress

## Instalación

### Método 1: Subir ZIP desde WordPress (Recomendado)

1. Ve a **Apariencia > Temas > Añadir nuevo > Subir tema**
2. Selecciona el archivo `judo-club-theme.zip`
3. Haz clic en **Instalar ahora**
4. Una vez instalado, haz clic en **Activar**

### Método 2: FTP

1. Descomprime `judo-club-theme.zip`
2. Sube la carpeta `judo-club-theme` a `/wp-content/themes/`
3. Ve a **Apariencia > Temas** y activa "Judo Club Coruña"

## Configuración Inicial

### 1. Configurar Menú
1. Ve a **Apariencia > Menús**
2. Crea un nuevo menú llamado "Menú Principal"
3. Añade los enlaces: Inicio, Actividades, Horarios, Sobre Nosotros, Actualidad, Contacto
4. Selecciona la ubicación "Menú Principal"

### 2. Configurar Opciones del Tema
1. Ve a **Apariencia > Opciones JCC**
2. Rellena:
   - Teléfono: 981 29 07 39
   - Email: gimnasiojc.coruna@mundo-r.com
   - Dirección: Calle Pintor Seijo Rubio, 19 Bajo, 15006 A Coruña
   - Horario General: Lunes a Viernes: 10:30 - 13:30 / 17:00 - 21:30 / Sábados: 10:00 - 13:00
   - Instagram: https://www.instagram.com/judoclubcoruna/
   - Facebook: https://www.facebook.com/Judo-Club-Coruña-114301045261292/
   - Google Maps URL (embed)
3. Haz clic en **Guardar Cambios**

### 3. Añadir Imágenes
Sube las imágenes a la carpeta `assets/images/` del tema:
- `logo.png` - Logo del club
- `hero-bg.jpg` - Fondo del hero
- `judo.jpg`, `jiu-jitsu.jpg`, `aikido.jpg`, `iaido.jpg`, `taichi.jpg`, `fitness.jpg` - Actividades
- `sobre-nosotros.jpg` - Sección "Sobre Nosotros"

## Uso

### Añadir Fotos al Carrusel

1. Ve a **Fotos Carrusel > Añadir nueva**
2. Escribe un título (se muestra como leyenda)
3. Sube una imagen destacada
4. Establece el **Orden en Carrusel** (0 = primera)
5. Publica

### Añadir Noticias

1. Ve a **Noticias > Añadir nueva**
2. Escribe título y contenido
3. Sube imagen destacada
4. Selecciona la **Categoría de Noticia**: Noticia, Competiciones, Eventos o Galería
5. Publica

Las noticias aparecen automáticamente en la sección "Actualidad" (máximo 3). Si no hay noticias, la sección se oculta automáticamente.

## Estructura del Tema

```
judo-club-theme/
├── style.css                    ← Info del tema
├── functions.php                ← Funciones principales
├── header.php                   ← Cabecera
├── footer.php                   ← Pie de página
├── front-page.php               ← Página principal
├── index.php                    ← Fallback
├── single.php                   ← Noticia individual
├── archive.php                  ← Archivo de noticias
├── page.php                     ← Página genérica
├── template-parts/
│   └── noticia-card.php         ← Tarjeta de noticia
├── inc/
│   ├── custom-post-types.php    ← Tipos de contenido
│   └── theme-settings.php       ← Panel de opciones
└── assets/
    ├── css/style.css            ← Estilos
    ├── js/main.js               ← JavaScript
    └── images/                  ← Imágenes del tema
```

## Solución de Problemas

### Las noticias no aparecen
- Asegúrate de tener al menos 1 noticia publicada
- Revisa que la fecha de publicación no sea futura

### El carrusel no se muestra
- Añade al menos 1 foto en "Fotos Carrusel"
- Verifica que la imagen destacada esté establecida

### Los estilos no se aplican
- Ve a **Apariencia > Personalizar > CSS adicional** y verifica
- Limpia la caché del navegador

## Soporte

Para problemas o dudas, contacta con el administrador del sitio.
