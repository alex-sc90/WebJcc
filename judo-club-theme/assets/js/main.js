/* ===================================
   JUDO CLUB CORUÑA - JAVASCRIPT
   =================================== */

document.addEventListener('DOMContentLoaded', function() {
    
    // === MENÚ MÓVIL ===
    const navToggle = document.getElementById('nav-toggle');
    const nav = document.getElementById('nav');
    
    if (navToggle && nav) {
        navToggle.addEventListener('click', function() {
            nav.classList.toggle('active');
            
            // Cambiar icono
            const icon = this.querySelector('i');
            if (nav.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }
    
    // Cerrar menú al hacer clic en un enlace
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            if (nav.classList.contains('active')) {
                nav.classList.remove('active');
                navToggle.querySelector('i').classList.remove('fa-times');
                navToggle.querySelector('i').classList.add('fa-bars');
            }
        });
    });
    
    // === HEADER SCROLL ===
    const header = document.getElementById('header');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    // === ACTIVE NAV LINK ===
    const sections = document.querySelectorAll('section[id]');
    
    function highlightNav() {
        const scrollY = window.pageYOffset;
        
        sections.forEach(function(section) {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 200;
            const sectionId = section.getAttribute('id');
            const navLink = document.querySelector('.nav-link[href="#' + sectionId + '"]');
            
            if (navLink) {
                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    navLink.classList.add('active');
                } else {
                    navLink.classList.remove('active');
                }
            }
        });
    }
    
    window.addEventListener('scroll', highlightNav);
    
    // === SMOOTH SCROLL ===
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerHeight = header.offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // === ANIMATIONS ON SCROLL ===
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.actividad-card, .contacto-item, .feature');
        
        elements.forEach(function(element) {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('animate');
            }
        });
    };
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Ejecutar una vez al cargar
    
    // === FORM VALIDATION (si se añade formulario) ===
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Aquí iría la lógica de validación y envío
            alert('Gracias por tu mensaje. Te contactaremos pronto.');
            this.reset();
        });
    }
    
    // === LAZY LOADING PARA IMÁGENES ===
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    observer.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
    }
    
    // === BACK TO TOP BUTTON ===
    const createBackToTop = function() {
        const button = document.createElement('button');
        button.innerHTML = '<i class="fas fa-chevron-up"></i>';
        button.className = 'back-to-top';
        button.setAttribute('aria-label', 'Volver arriba');
        document.body.appendChild(button);
        
        // Estilos del botón
        button.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--color-primary, #c8102e);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
            box-shadow: 0 4px 15px rgba(200, 16, 46, 0.4);
        `;
        
        // Mostrar/ocultar botón
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                button.style.opacity = '1';
                button.style.visibility = 'visible';
            } else {
                button.style.opacity = '0';
                button.style.visibility = 'hidden';
            }
        });
        
        // Acción al hacer clic
        button.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Efecto hover
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 6px 20px rgba(200, 16, 46, 0.5)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 15px rgba(200, 16, 46, 0.4)';
        });
    };
    
    createBackToTop();
    
    // === COUNT UP ANIMATION ===
    const countUp = function(element, target, duration) {
        let start = 0;
        const increment = target / (duration / 16);
        
        const timer = setInterval(function() {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    };
    
    // Aplicar a elementos con data-count
    const countElements = document.querySelectorAll('[data-count]');
    if (countElements.length > 0) {
        const countObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.count);
                    countUp(entry.target, target, 2000);
                    countObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        countElements.forEach(function(el) {
            countObserver.observe(el);
        });
    }
    
    // === CARRUSEL DE FOTOS ===
    const carousel = document.querySelector('.carousel');
    if (carousel) {
        const slides = carousel.querySelectorAll('.carousel-slide');
        const dotsContainer = carousel.querySelector('.carousel-dots');
        const prevBtn = carousel.querySelector('.carousel-prev');
        const nextBtn = carousel.querySelector('.carousel-next');
        let currentSlide = 0;
        let autoPlayInterval;
        
        // Crear puntos de navegación
        slides.forEach(function(slide, index) {
            const dot = document.createElement('button');
            dot.className = 'carousel-dot' + (index === 0 ? ' active' : '');
            dot.setAttribute('aria-label', 'Ir a slide ' + (index + 1));
            dot.addEventListener('click', function() {
                goToSlide(index);
            });
            dotsContainer.appendChild(dot);
        });
        
        const dots = dotsContainer.querySelectorAll('.carousel-dot');
        
        function goToSlide(index) {
            slides[currentSlide].classList.remove('active');
            dots[currentSlide].classList.remove('active');
            currentSlide = index;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }
        
        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            goToSlide(next);
        }
        
        function prevSlide() {
            const prev = (currentSlide - 1 + slides.length) % slides.length;
            goToSlide(prev);
        }
        
        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, 5000);
        }
        
        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }
        
        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                stopAutoPlay();
                nextSlide();
                startAutoPlay();
            });
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                stopAutoPlay();
                prevSlide();
                startAutoPlay();
            });
        }
        
        // Pausar al pasar el ratón
        carousel.addEventListener('mouseenter', stopAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);
        
        // Touch support
        let touchStartX = 0;
        let touchEndX = 0;
        
        carousel.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
            stopAutoPlay();
        }, { passive: true });
        
        carousel.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
            
            startAutoPlay();
        }, { passive: true });
        
        // Iniciar auto-play
        startAutoPlay();
    }
    
    // === PANEL DE ADMINISTRACIÓN ===
    const btnAdminToggle = document.getElementById('btn-admin-toggle');
    const adminPanel = document.getElementById('admin-panel');
    const closeAdmin = document.getElementById('close-admin');
    const newsForm = document.getElementById('news-form');
    const actualidadGrid = document.getElementById('actualidad-grid');
    
    // Atajo de teclado Ctrl+Shift+A para mostrar panel admin
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.shiftKey && e.key === 'A') {
            e.preventDefault();
            if (adminPanel) {
                adminPanel.style.display = adminPanel.style.display === 'none' ? 'block' : 'none';
            }
        }
    });
    
    if (btnAdminToggle && adminPanel) {
        btnAdminToggle.addEventListener('click', function() {
            adminPanel.style.display = adminPanel.style.display === 'none' ? 'block' : 'none';
        });
    }
    
    if (closeAdmin && adminPanel) {
        closeAdmin.addEventListener('click', function() {
            adminPanel.style.display = 'none';
        });
    }
    
    // Formulario para añadir noticias
    if (newsForm && actualidadGrid) {
        newsForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const title = document.getElementById('news-title').value;
            const content = document.getElementById('news-content').value;
            const imageUrl = document.getElementById('news-image').value;
            const date = document.getElementById('news-date').value || new Date().toISOString().split('T')[0];
            const category = document.getElementById('news-category').value;
            
            // Formatear fecha
            const formattedDate = new Date(date).toLocaleDateString('es-ES', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            // Crear nueva tarjeta de noticia
            const newArticle = document.createElement('article');
            newArticle.className = 'noticia-card';
            newArticle.innerHTML = `
                <div class="noticia-img">
                    <img src="${imageUrl}" alt="${title}">
                    <span class="noticia-badge ${category}">${category.charAt(0).toUpperCase() + category.slice(1)}</span>
                </div>
                <div class="noticia-content">
                    <div class="noticia-meta">
                        <span><i class="far fa-calendar"></i> ${formattedDate}</span>
                        <span><i class="far fa-user"></i> Admin</span>
                    </div>
                    <h3 class="noticia-title">${title}</h3>
                    <p class="noticia-excerpt">${content}</p>
                    <a href="#" class="noticia-link">Leer más <i class="fas fa-arrow-right"></i></a>
                </div>
            `;
            
            // Añadir al principio del grid
            actualidadGrid.insertBefore(newArticle, actualidadGrid.firstChild);
            
            // Guardar en localStorage
            saveNewsToStorage({
                title: title,
                content: content,
                imageUrl: imageUrl,
                date: date,
                category: category
            });
            
            // Limpiar formulario
            newsForm.reset();
            
            // Mostrar mensaje de éxito
            showNotification('Noticia publicada correctamente');
        });
    }
    
    // Guardar noticias en localStorage
    function saveNewsToStorage(news) {
        let newsList = JSON.parse(localStorage.getItem('jcc_news') || '[]');
        newsList.unshift(news);
        localStorage.setItem('jcc_news', JSON.stringify(newsList));
    }
    
    // Cargar noticias guardadas
    function loadNewsFromStorage() {
        const newsList = JSON.parse(localStorage.getItem('jcc_news') || '[]');
        const actualidadGrid = document.getElementById('actualidad-grid');
        
        newsList.forEach(function(news) {
            const formattedDate = new Date(news.date).toLocaleDateString('es-ES', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            const newArticle = document.createElement('article');
            newArticle.className = 'noticia-card';
            newArticle.innerHTML = `
                <div class="noticia-img">
                    <img src="${news.imageUrl}" alt="${news.title}">
                    <span class="noticia-badge ${news.category}">${news.category.charAt(0).toUpperCase() + news.category.slice(1)}</span>
                </div>
                <div class="noticia-content">
                    <div class="noticia-meta">
                        <span><i class="far fa-calendar"></i> ${formattedDate}</span>
                        <span><i class="far fa-user"></i> Admin</span>
                    </div>
                    <h3 class="noticia-title">${news.title}</h3>
                    <p class="noticia-excerpt">${news.content}</p>
                    <a href="#" class="noticia-link">Leer más <i class="fas fa-arrow-right"></i></a>
                </div>
            `;
            
            actualidadGrid.insertBefore(newArticle, actualidadGrid.firstChild);
        });
    }
    
    // Cargar noticias al iniciar
    loadNewsFromStorage();
    
    // Notificación flotante
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 30px;
            background: #059669;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            font-weight: 600;
            z-index: 10000;
            animation: slideIn 0.3s ease;
            box-shadow: 0 4px 15px rgba(5, 150, 105, 0.4);
        `;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(function() {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 3000);
    }
    
});

// === CSS para animaciones ===
const style = document.createElement('style');
style.textContent = `
    .actividad-card,
    .contacto-item,
    .feature,
    .noticia-card {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    .actividad-card.animate,
    .contacto-item.animate,
    .feature.animate,
    .noticia-card.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    .actividad-card:nth-child(2) { transition-delay: 0.1s; }
    .actividad-card:nth-child(3) { transition-delay: 0.2s; }
    .actividad-card:nth-child(4) { transition-delay: 0.3s; }
    .actividad-card:nth-child(5) { transition-delay: 0.4s; }
    .actividad-card:nth-child(6) { transition-delay: 0.5s; }
    
    .noticia-card:nth-child(1) { transition-delay: 0.1s; }
    .noticia-card:nth-child(2) { transition-delay: 0.2s; }
    .noticia-card:nth-child(3) { transition-delay: 0.3s; }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100px);
        }
    }
`;
document.head.appendChild(style);
