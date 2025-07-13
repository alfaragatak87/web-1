// Wait for DOM content to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize AOS (Animate on Scroll)
    AOS.init({
        duration: 800,
        easing: 'ease',
        once: true,
        offset: 100
    });
    
    // Initialize Particles.js for background
    if (document.getElementById('particles-js')) {
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#00e5ff"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#000000"
                    },
                    polygon: {
                        nb_sides: 5
                    }
                },
                opacity: {
                    value: 0.5,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#00e5ff",
                    opacity: 0.2,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "out",
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "bubble"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 400,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 200,
                        size: 5,
                        duration: 2,
                        opacity: 0.8,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    }
    
    // Ganti kode kursor di assets/js/main.js

// Custom Cursor
const cursor = document.querySelector('.cursor-dot');
const cursorOutline = document.querySelector('.cursor-dot-outline');

if (cursor && cursorOutline) {
    // Menghindari efek kursor di perangkat mobile
    if (window.innerWidth > 768) {
        // Sembunyikan kursor default
        document.body.style.cursor = 'none';
        
        document.addEventListener('mousemove', function(e) {
            // Tunda untuk efek yang lebih halus
            requestAnimationFrame(() => {
                cursor.style.opacity = '1';
                cursorOutline.style.opacity = '1';
                
                // Posisi kursor
                cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
                
                // Posisi outline dengan penundaan
                setTimeout(function() {
                    cursorOutline.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
                }, 80);
            });
        });
        
        // Sembunyikan kursor saat meninggalkan window
        document.addEventListener('mouseleave', function() {
            cursor.style.opacity = '0';
            cursorOutline.style.opacity = '0';
        });
        
        // Tampilkan kursor saat memasuki window
        document.addEventListener('mouseenter', function() {
            cursor.style.opacity = '1';
            cursorOutline.style.opacity = '1';
        });
        
        // Efek kursor untuk link dan tombol
        const interactiveElements = document.querySelectorAll('a, button, .btn, input, textarea, select, .language-btn, .language-dropdown-content a');
        
        interactiveElements.forEach(el => {
            el.addEventListener('mouseenter', function() {
                cursorOutline.style.transform = 'translate(-50%, -50%) scale(1.5)';
                cursorOutline.style.backgroundColor = 'rgba(0, 229, 255, 0.1)';
                cursorOutline.style.borderColor = 'rgba(0, 229, 255, 0.5)';
                cursor.style.transform = 'translate(-50%, -50%) scale(0.5)';
                cursor.style.backgroundColor = 'var(--primary-color)';
                
                // Tambahkan class ke cursor
                cursor.classList.add('cursor-hover');
                cursorOutline.classList.add('cursor-hover');
            });
            
            el.addEventListener('mouseleave', function() {
                cursorOutline.style.transform = 'translate(-50%, -50%) scale(1)';
                cursorOutline.style.backgroundColor = 'rgba(0, 229, 255, 0.2)';
                cursorOutline.style.borderColor = 'rgba(0, 229, 255, 0.2)';
                cursor.style.transform = 'translate(-50%, -50%) scale(1)';
                cursor.style.backgroundColor = 'var(--primary-color)';
                
                // Hapus class dari cursor
                cursor.classList.remove('cursor-hover');
                cursorOutline.classList.remove('cursor-hover');
            });
        });
        
        // Efek klik
        document.addEventListener('mousedown', function() {
            cursor.style.transform = 'translate(-50%, -50%) scale(0.7)';
            cursorOutline.style.transform = 'translate(-50%, -50%) scale(1.5)';
        });
        
        document.addEventListener('mouseup', function() {
            cursor.style.transform = 'translate(-50%, -50%) scale(1)';
            cursorOutline.style.transform = 'translate(-50%, -50%) scale(1)';
        });
    } else {
        // Nonaktifkan kursor khusus di perangkat mobile
        cursor.style.display = 'none';
        cursorOutline.style.display = 'none';
    }
}

    // Typed.js initialization for hero section
    if (document.getElementById('typed-text')) {
        let typedStrings = ['Web Developer', 'UI/UX Designer', 'Mahasiswa Informatika', 'Problem Solver'];
        
        // Check if jobTitles variable is defined (from index.php)
        if (typeof jobTitles !== 'undefined') {
            typedStrings = jobTitles;
        }
        
        new Typed('#typed-text', {
            strings: typedStrings,
            typeSpeed: 70,
            backSpeed: 50,
            backDelay: 2000,
            loop: true
        });
    }
    
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            menuToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
            
            // Toggle menu animation
            const spans = menuToggle.querySelectorAll('span');
            if (menuToggle.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
    }
    
    // Close mobile menu when clicking a nav link
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (navMenu.classList.contains('active')) {
                menuToggle.click();
            }
        });
    });
    
    // Back to Top Button
    const backToTopButton = document.getElementById('backToTop');
    
    if (backToTopButton) {
        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });
        
        // Scroll to top when clicked
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Navbar scroll effect
    const header = document.querySelector('header');
    
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
    
    // Project Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');
    
    if (filterButtons.length > 0 && projectCards.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                
                // Filter projects
                projectCards.forEach(card => {
                    if (filter === 'all') {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 100);
                    } else if (card.getAttribute('data-category') === filter) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 100);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });
    }
    
    // Form validation
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Get form fields
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const subject = document.getElementById('subject');
            const message = document.getElementById('message');
            
            // Simple validation
            if (name.value.trim() === '') {
                isValid = false;
                highlightError(name);
            } else {
                removeError(name);
            }
            
            if (email.value.trim() === '' || !isValidEmail(email.value)) {
                isValid = false;
                highlightError(email);
            } else {
                removeError(email);
            }
            
            if (subject.value.trim() === '') {
                isValid = false;
                highlightError(subject);
            } else {
                removeError(subject);
            }
            if (message.value.trim() === '') {
                isValid = false;
                highlightError(message);
            } else {
                removeError(message);
            }
            
            // Prevent form submission if validation fails
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    // Helper functions for form validation
    function highlightError(element) {
        element.style.borderColor = 'var(--error-color)';
    }
    
    function removeError(element) {
        element.style.borderColor = '';
    }
    
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                e.preventDefault();
                
                window.scrollTo({
                    top: target.offsetTop - 80, // Accounting for fixed header
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Project Details Modal
    const viewDetailsButtons = document.querySelectorAll('.view-details');
    const modal = document.getElementById('projectModal');
    
    if (viewDetailsButtons.length > 0 && modal) {
        const closeBtn = document.querySelector('.close-modal');
        const projectDetails = document.getElementById('projectDetails');
        
        // View Details Button Click
        viewDetailsButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const projectId = this.getAttribute('data-id');
                
                // AJAX request to get project details
                fetch(`${window.location.origin}/portfolio-alfatih/includes/get_project.php?id=${projectId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const project = data.project;
                            let modalContent = `
                                <div class="modal-header">
                                    <h2>${project.judul}</h2>
                                    <span class="project-category">${project.kategori}</span>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-image">
                                        <img src="${window.location.origin}/portfolio-alfatih/uploads/projects/${project.gambar_proyek}" alt="${project.judul}">
                                    </div>
                                    <div class="modal-text">
                                        <h3>Project Description</h3>
                                        <p>${project.deskripsi}</p>
                                        <p class="project-date"><i class="far fa-calendar"></i> ${new Date(project.tanggal_dibuat).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'})}</p>
                                        ${project.link_proyek ? `<a href="${project.link_proyek}" class="btn btn-primary" target="_blank">View Live Project</a>` : ''}
                                    </div>
                                </div>
                            `;
                            projectDetails.innerHTML = modalContent;
                            modal.style.display = 'block';
                            
                            // Disable scroll on body
                            document.body.style.overflow = 'hidden';
                        } else {
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while fetching project details.');
                    });
            });
        });
        
        // Close modal
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
                
                // Enable scroll on body
                document.body.style.overflow = '';
            });
        }
        
        // Close modal when clicking outside
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
                
                // Enable scroll on body
                document.body.style.overflow = '';
            }
        });
    }
});