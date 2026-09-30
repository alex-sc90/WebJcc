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
- ✅ Tema WordPress creado, empaquetado e **instalado y activo** en judoclubcoruna.com (tema "Judo Club Coruña")
- ✅ Todas las disciplinas (Judo, Jiu-Jitsu, Karate, Aikido, Iaido, Tai Chi, Pilates) usan fotos reales en `assets/images/` (ya no hay SVG placeholder)
- ✅ `gimnasio` y `portada` son `.jpg` (antes `.png`, convertidas para reducir tamaño — ver "Límite de tamaño del ZIP" abajo)

## Flujo de Despliegue Automático (IMPORTANTE — leer antes de tocar el tema)

**Autorización permanente del usuario:** cuando el usuario añada/cambie fotos u otro contenido del tema WordPress, el agente debe reconstruir el ZIP, instalarlo en judoclubcoruna.com vía wp-admin (usando la extensión claude-in-chrome) y hacer commit+push a git, **sin pedir confirmación cada vez**. Esto ya fue pedido explícitamente por el usuario (sesión 2026-09-30). Sigue aplicando esta autorización en sesiones futuras salvo que el usuario diga lo contrario.

### 1. Reconstruir el ZIP — usar Python, NUNCA PowerShell `Compress-Archive`
`Compress-Archive` (y el `ZipFile.CreateFromDirectory` de .NET Framework en PowerShell 5.1) escribe las rutas internas con `\` en vez de `/`, lo que rompe la instalación en el servidor Linux (WordPress no encuentra `style.css` dentro de la carpeta). Usar siempre:
```python
import zipfile, os
src = 'judo-club-theme'
out = 'judo-club-theme.zip'
with zipfile.ZipFile(out, 'w', zipfile.ZIP_DEFLATED) as zf:
    for root, dirs, files in os.walk(src):
        for f in files:
            full = os.path.join(root, f)
            arcname = os.path.relpath(full, os.path.dirname(src)).replace(os.sep, '/')
            zf.write(full, arcname)
```
Verificar con `unzip -t judo-club-theme.zip` (debe decir "No errors detected").

### 2. Límite de tamaño del ZIP — mantenerlo por debajo de ~4 MB
El hosting (IONOS/1&1, ruta `/homepages/29/d857737997/htdocs/...`) falla al descomprimir temas subidos por wp-admin cuando el ZIP es grande (probado: 4.0 MB OK, 5.6 MB falla con "No se ha podido descomprimir el paquete. El tema no tiene la hoja de estilos style.css."). No es un archivo corrupto específico, es un límite de tiempo/recursos del propio hosting al descomprimir. La subida de medios normal (Media Library) sí admite hasta 128 MB sin problema — solo la instalación de temas vía ZIP es sensible a esto.
- Si el ZIP crece demasiado: comprimir imágenes fotográficas grandes a JPEG con calidad ~80-85 (`Pillow`, `im.save(dst, 'JPEG', quality=82, optimize=True)`) en vez de dejarlas en PNG. Las fotos no necesitan ser PNG.
- Si aun así hace falta más margen, considerar subir fotos nuevas vía Media Library y referenciar su URL desde `front-page.php` en vez de meterlas dentro del ZIP del tema.

### 3. Instalar el ZIP vía wp-admin con claude-in-chrome
La sesión de Chrome ya tiene una sesión iniciada en judoclubcoruna.com/wp-admin (usuario "Romay") — normalmente no hace falta login.
1. Navegar a `https://judoclubcoruna.com/wp-admin/theme-install.php`
2. Clic en "Subir tema"
3. Usar `file_upload` sobre el input de tipo file con la ruta absoluta del ZIP (debe estar dentro de una carpeta accesible a la sesión, p.ej. `C:\Users\alex\Desktop\webJCC\`)
4. Clic en "Instalar ahora"
5. Como el tema "judo-club-theme" ya existe, WordPress pedirá confirmar "Reemplazar el instalado con el subido" — confirmar. El resultado final debe decir "El tema se ha actualizado correctamente."
6. Verificar visualmente la home del sitio tras el despliegue.

### 4. Git: commit y push
- Commitear los cambios (imágenes nuevas, `front-page.php`, `judo-club-theme.zip`) tras un despliegue exitoso.
- `git push` puede fallar en esta máquina con `unable to get local issuer certificate` (el ca-bundle de Git for Windows/OpenSSL está incompleto). Solución: `git -c http.sslBackend=schannel push` (usa el almacén de certificados de Windows). Si se repite mucho, se puede ofrecer fijarlo con `git config --global http.sslBackend schannel`.

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
