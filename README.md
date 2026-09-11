# Judo Club Coruña - Página Web

## 🥋 Descripción

Página web completa para el Judo Club Coruña, incluyendo carrusel de fotos, información de contacto, horarios, noticias y diseño responsive moderno.

## 📁 Estructura de Archivos

```
judo-club-coruna/
├── index.html              ← Página principal (HTML independiente)
├── css/
│   └── style.css           ← Estilos personalizados
├── js/
│   └── main.js             ← Interacciones JavaScript
├── img/                    ← Directorio para imágenes
├── functions-horarios.php  ← Shortcode WordPress para horarios
├── functions-contacto.php  ← Shortcode WordPress para contacto
└── README.md               ← Este archivo
```

## 🚀 Opción 1: Página HTML Independiente

Si quieres usar la página sin WordPress:

1. Copia toda la carpeta `judo-club-coruna/` a tu servidor web
2. Abre `index.html` en tu navegador
3. ¡Listo! La página funcionará directamente

### Requisitos:
- Cualquier servidor web (Apache, Nginx, etc.)
- No necesita PHP ni bases de datos

## 📸 Cómo Añadir Fotos al Carrusel

### Paso 1: Editar index.html
Busca la sección `<!-- CARRUSEL -->` y añade tus fotos:

```html
<div class="carousel-slide">
    <img src="TU-FOTO.jpg" alt="Descripción de la foto">
    <div class="carousel-caption">
        <h3>Título de la foto</h3>
        <p>Descripción opcional</p>
    </div>
</div>
```

### Paso 2: Añadir más slides
Copia el bloque anterior y cambia:
- `src="TU-FOTO.jpg"` → URL de tu imagen
- `alt="Descripción"` → Texto alternativo
- `Título de la foto` → Título que se muestra
- `Descripción opcional` → Subtítulo

### Consejos:
- **Tamaño recomendado:** 1200x600 píxeles
- **Formatos:** JPG, PNG, WebP
- **Peso máximo:** 500KB por foto (para carga rápida)

## 📰 Cómo Añadir Noticias

### Opción 1: Panel de Administración (Recomendada)

1. Abre la página en el navegador
2. Pulsa **Ctrl+Shift+A** para abrir el panel de admin
3. Rellena el formulario:
   - **Título:** Nombre de la noticia
   - **Descripción:** Texto de la noticia
   - **URL de imagen:** Enlace a la foto
   - **Fecha:** Fecha de publicación
   - **Categoría:** Noticia, Competiciones, Eventos o Galería
4. Pulsa **Publicar**

### Opción 2: Editar HTML Directamente

Busca la sección `<!-- ACTUALIDAD -->` y añade:

```html
<article class="noticia-card">
    <div class="noticia-img">
        <img src="TU-FOTO.jpg" alt="Descripción">
        <span class="noticia-badge noticia">Noticia</span>
    </div>
    <div class="noticia-content">
        <div class="noticia-meta">
            <span><i class="far fa-calendar"></i> 15 Agosto 2026</span>
            <span><i class="far fa-user"></i> Admin</span>
        </div>
        <h3 class="noticia-title">Título de la noticia</h3>
        <p class="noticia-excerpt">Descripción breve de la noticia...</p>
        <a href="#" class="noticia-link">Leer más <i class="fas fa-arrow-right"></i></a>
    </div>
</article>
```

### Categorías disponibles:
- `noticia` → Rojo (#c8102e)
- `competicion` → Azul (#2563eb)
- `evento` → Verde (#059669)
- `galeria` → Púrpura (#7c3aed)

## 📝 Opción 2: Integración con WordPress

Si ya tienes un sitio en WordPress y quieres añadir los shortcodes:

### Paso 1: Subir archivos PHP
1. Sube `functions-horarios.php` y `functions-contacto.php` a la carpeta de tu tema:
   ```
   /wp-content/themes/tu-tema/
   ```

### Paso 2: Añadir al functions.php
Abre el archivo `functions.php` de tu tema y añade estas líneas al final:

```php
// Shortcodes Judo Club Coruña
require_once(get_template_directory() . '/functions-horarios.php');
require_once(get_template_directory() . '/functions-contacto.php');
```

### Paso 3: Usar los shortcodes
En cualquier página o entrada de WordPress, añade:

**Para horarios:**
```
[horarios_judo]
```

**Para contacto:**
```
[contacto_judo]
```

### Ejemplo en WordPress:
1. Ve a **Páginas > Añadir nueva**
2. Añade un título (ej: "Horarios")
3. En el editor, escribe: `[horarios_judo]`
4. Publica la página

## 🎨 Personalización

### Cambiar colores
Edita las variables CSS al inicio de `css/style.css`:

```css
:root {
    --color-primary: #c8102e;    /* Color principal (rojo) */
    --color-secondary: #1a1a2e;  /* Color secundario (azul oscuro) */
    --color-dark: #0f0f1a;       /* Color oscuro */
    --color-white: #ffffff;      /* Blanco */
}
```

### Cambiar información de contacto
Edita los archivos PHP o el HTML para actualizar:
- Teléfono
- Email
- Dirección
- Horarios

### Cambiar imágenes
Las imágenes se cargan desde URLs externas. Para usar tus propias imágenes:
1. Sube las imágenes a la carpeta `img/`
2. Actualiza las URLs en `index.html`

## 📱 Características

- ✅ **Carrusel de fotos** con auto-play y navegación
- ✅ Diseño 100% responsive (móvil, tablet, escritorio)
- ✅ Menú hamburguesa en móvil
- ✅ Scroll suave entre secciones
- ✅ Efectos hover en cards
- ✅ **Sección de noticias** con panel de administración
- ✅ Tabla de horarios con colores por disciplina
- ✅ Mapa de Google embebido
- ✅ Redes sociales (Instagram, Facebook)
- ✅ Botón "Volver arriba"
- ✅ Animaciones al hacer scroll
- ✅ Compatible con todos los navegadores modernos

## 🖼️ Carrusel de Fotos

### Características:
- **Auto-play:** Cambia de foto cada 5 segundos
- **Flechas:** Navegación manual izquierda/derecha
- **Puntos:** Indicadores clickeables
- **Touch:** Deslizar en móvil
- **Responsive:** Se adapta a cualquier pantalla
- **Transiciones:** Efecto fade suave

### Para pausar el carrusel:
- Pasa el ratón por encima → Se pausa automáticamente
- Saca el ratón → Se reanuda

## 📰 Sección de Actualidad

### Panel de Administración:
- **Atajo de teclado:** Ctrl+Shift+A
- **Botón:** Icono de engranaje abajo a la izquierda
- **Formulario:** Título, descripción, imagen, fecha, categoría
- **Almacenamiento:** Se guardan en localStorage del navegador

### Categorías:
- 📰 **Noticia** (rojo)
- 🏆 **Competiciones** (azul)
- 🎉 **Eventos** (verde)
- 📷 **Galería** (púrpura)

## 📞 Información de Contacto del Club

| Campo | Valor |
|-------|-------|
| **Nombre** | Judo Club Coruña |
| **Dirección** | Calle Pintor Seijo Rubio, 19 Bajo, 15006 A Coruña |
| **Teléfono** | 981 29 07 39 |
| **Email** | gimnasiojc.coruna@mundo-r.com |
| **Instagram** | @judoclubcoruna |
| **Facebook** | Judo Club Coruña |

## 🥋 Disciplinas

| Disciplina | Horarios |
|------------|----------|
| **Judo** | Lun, Mié, Vie: 18:00-21:30 / Mar, Jue: 17:30-18:30 |
| **Jiu-Jitsu** | Lun, Mié, Vie: 9:30-10:30 / Mar, Jue: 18:30-21:30 |
| **Aikido** | Todos los días: 21:30 |
| **Iaido** | Sábados: 10:00-12:00 |
| **Tai Chi** | Lun, Mié, Vie: 16:50-17:50 |

## 🛠️ Tecnologías Utilizadas

- HTML5
- CSS3 (con variables CSS)
- JavaScript vanilla (sin dependencias)
- Font Awesome 6.4.0 (iconos)
- Google Fonts (Montserrat, Open Sans)
- localStorage (para guardar noticias)

## 📄 Licencia

Este proyecto es de uso libre para el Judo Club Coruña.

---

**Creado con ❤️ para el Judo Club Coruña**
