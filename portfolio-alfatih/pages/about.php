<?php
$pageTitle = "About Me";
require_once '../config/koneksi.php';
require_once '../templates/header.php';

// Get profile data
$stmt = $pdo->query("SELECT * FROM profil WHERE id = 1");
$profile = $stmt->fetch();
?>

<!-- About Hero Section -->
<section class="about-hero section-padding">
    <div class="container">
        <div class="about-hero-content" data-aos="fade-up">
            <h1>About Me</h1>
            <p class="subtitle">Get to know me better</p>
            
            <div class="about-hero-quote">
                <i class="fas fa-quote-left"></i>
                <p>"Crafting digital experiences that blend functionality with beautiful design."</p>
                <i class="fas fa-quote-right"></i>
            </div>
        </div>
    </div>
</section>

<!-- About Content Section -->
<section class="about-content section-padding">
    <div class="container">
        <div class="about-grid">
            <!-- Image Column -->
            <div class="about-image-column" data-aos="fade-right">
                <div class="about-image">
                    <img src="<?= BASE_URL ?>/uploads/profile/<?= $profile['profile_image'] ?? 'default-profile.jpg' ?>" alt="<?= OWNER_NAME ?>">
                </div>
                
                <div class="about-social">
                    <a href="<?= OWNER_GITHUB ?>" target="_blank" class="social-icon">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="mailto:<?= OWNER_EMAIL ?>" class="social-icon">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="https://wa.me/<?= str_replace(['+', ' '], '', OWNER_WHATSAPP) ?>" class="social-icon">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <!-- Content Column -->
            <div class="about-text-column" data-aos="fade-left">
                <div class="about-text-card">
                    <h2>Hello! I'm <?= OWNER_NAME ?></h2>
                    
                    <p class="about-text-intro">
                        <?= $profile['summary'] ?? 'I am a passionate web developer and digital marketer currently pursuing my Bachelor\'s degree in Informatics at ITB Widya Gama Lumajang. With a strong foundation in both technical development and marketing strategies, I create digital solutions that not only function flawlessly but also effectively communicate with target audiences.' ?>
                    </p>
                    
                    <p>
                        My journey in web development began with a curiosity about how websites work, which quickly evolved into a passion for creating them. I continuously strive to expand my skill set and stay updated with the latest industry trends and technologies.
                    </p>
                    
                    <div class="about-info-grid">
                        <div class="about-info-item">
                            <div class="info-label">Name</div>
                            <div class="info-value"><?= OWNER_NAME ?></div>
                        </div>
                        
                        <div class="about-info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value"><?= OWNER_EMAIL ?></div>
                        </div>
                        
                        <div class="about-info-item">
                            <div class="info-label">Phone</div>
                            <div class="info-value"><?= OWNER_WHATSAPP ?></div>
                        </div>
                        
                        <div class="about-info-item">
                            <div class="info-label">Location</div>
                            <div class="info-value"><?= $profile['location'] ?? 'Lumajang, East Java, Indonesia' ?></div>
                        </div>
                        
                        <div class="about-info-item">
                            <div class="info-label">Study At</div>
                            <div class="info-value"><?= OWNER_EDUCATION ?></div>
                        </div>
                        
                        <div class="about-info-item">
                            <div class="info-label">Interests</div>
                            <div class="info-value">Web Development, UI/UX Design, Digital Marketing</div>
                        </div>
                    </div>
                    
                    <div class="about-cta">
                        <a href="<?= BASE_URL ?>/pages/cv.php" class="btn btn-primary">View CV</a>
                        <a href="<?= BASE_URL ?>/pages/contact.php" class="btn btn-outline">Contact Me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section with Logos -->
<section class="skills-section section-padding">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>My Skills</h2>
            <p>Technologies & tools I work with</p>
        </div>
        
        <div class="skills-container">
            <!-- Frontend Skills -->
            <div class="skills-category" data-aos="fade-up">
                <h3><i class="fas fa-laptop-code"></i> Frontend Development</h3>
                <div class="skills-grid">
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/html.png" alt="HTML5">
                        </div>
                        <div class="skill-info">
                            <h4>HTML5</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 95%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/css.png" alt="CSS3">
                        </div>
                        <div class="skill-info">
                            <h4>CSS3</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 90%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/js.png" alt="JavaScript">
                        </div>
                        <div class="skill-info">
                            <h4>JavaScript</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 85%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/bootstrap.png" alt="Bootstrap">
                        </div>
                        <div class="skill-info">
                            <h4>Bootstrap</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Backend Skills -->
            <div class="skills-category" data-aos="fade-up" data-aos-delay="100">
                <h3><i class="fas fa-server"></i> Backend Development</h3>
                <div class="skills-grid">
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/php.png" alt="PHP">
                        </div>
                        <div class="skill-info">
                            <h4>PHP</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 90%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/mysql.png" alt="MySQL">
                        </div>
                        <div class="skill-info">
                            <h4>MySQL</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 85%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/laravel.png" alt="Laravel">
                        </div>
                        <div class="skill-info">
                            <h4>Laravel</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 75%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/api.png" alt="RESTful API">
                        </div>
                        <div class="skill-info">
                            <h4>RESTful API</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Design & Marketing Skills -->
            <div class="skills-category" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="fas fa-paint-brush"></i> Design & Marketing</h3>
                <div class="skills-grid">
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/figma.png" alt="Figma">
                        </div>
                        <div class="skill-info">
                            <h4>Figma</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/photoshop.png" alt="Photoshop">
                        </div>
                        <div class="skill-info">
                            <h4>Photoshop</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 75%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/seo.png" alt="SEO">
                        </div>
                        <div class="skill-info">
                            <h4>SEO</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 85%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-icon">
                            <img src="<?= BASE_URL ?>/assets/img/skills/analytics.png" alt="Analytics">
                        </div>
                        <div class="skill-info">
                            <h4>Analytics</h4>
                            <div class="skill-progress">
                                <div class="progress" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Timeline -->
<section class="experience-section section-padding">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>My Journey</h2>
            <p>Education & experience</p>
        </div>
        
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2023 - Present</div>
                    <h3>S1 Informatika</h3>
                    <h4>ITB Widya Gama Lumajang</h4>
                    <p>Currently in 3rd semester, focusing on web development, algorithms, and database management.</p>
                </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2019 - 2022</div>
                    <h3>Teknik Komputer & Jaringan</h3>
                    <h4>SMK Miftahul Islam Kunir</h4>
                    <p>Learned computer networking, hardware troubleshooting, and basic programming.</p>
                </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2016 - 2019</div>
                    <h3>MTs</h3>
                    <h4>MTs Salafiyah Al-Yasiny</h4>
                    <p>Junior high school education with additional Islamic studies.</p>
                </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2010 - 2016</div>
                    <h3>MI</h3>
                    <h4>MI Salafiyah Al-Yasiny</h4>
                    <p>Primary education with basic computer literacy courses.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interests Section -->
<section class="interests-section section-padding">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>My Interests</h2>
            <p>Things I love beyond coding</p>
        </div>
        
        <div class="interests-grid">
            <div class="interest-item" data-aos="fade-up">
                <div class="interest-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3>Reading</h3>
                <p>I enjoy reading tech blogs, science fiction, and self-improvement books.</p>
            </div>
            
            <div class="interest-item" data-aos="fade-up" data-aos-delay="100">
                <div class="interest-icon">
                    <i class="fas fa-music"></i>
                </div>
                <h3>Music</h3>
                <p>Listening to music helps me focus and boosts creativity while coding.</p>
            </div>
            
            <div class="interest-item" data-aos="fade-up" data-aos-delay="200">
                <div class="interest-icon">
                    <i class="fas fa-hiking"></i>
                </div>
                <h3>Outdoor Activities</h3>
                <p>Hiking and exploring nature helps me refresh my mind.</p>
            </div>
            
            <div class="interest-item" data-aos="fade-up" data-aos-delay="300">
                <div class="interest-icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <h3>Gaming</h3>
                <p>I enjoy strategy games that challenge my problem-solving skills.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="cta-container" data-aos="fade-up">
            <h2>Interested in working together?</h2>
            <p>Let's bring your ideas to life! I'm always open to discussing new projects, creative ideas or opportunities to be part of your vision.</p>
            <a href="<?= BASE_URL ?>/pages/contact.php" class="btn btn-primary btn-lg">Get In Touch</a>
        </div>
    </div>
</section>

<?php require_once '../templates/footer.php'; ?>