<?php
$pageTitle = 'JagritiBricks - Quality Bricks for Strong Construction';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<!-- Hero Section -->
<section class="hero hero-animated" style="position: relative; min-height: 90vh; display: flex; align-items: center; overflow: hidden; color: white;">
    <!-- Parallax Background -->
    <div class="hero-bg parallax-bg" style="background-image: url('<?= SITE_URL ?>/assets/img/all/hero-indian-bricks.jpg'); opacity: 0.6;"></div>
    
    <!-- Gradient Overlay -->
    <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(16, 16, 16, 0.95) 0%, rgba(16, 16, 16, 0.7) 50%, rgba(16, 16, 16, 0.4) 100%); z-index: 1;"></div>

    <div class="container" style="position: relative; z-index: 2;">
        <div class="grid grid-2" style="gap: 4rem; align-items: center;">
            <!-- Left: Text Content -->
            <div class="hero-content">
                <span class="badge mb-md animate-on-scroll" style="background: linear-gradient(135deg, rgba(229, 57, 53, 0.25), rgba(183, 28, 28, 0.25)); border: 2px solid #E53935; color: #ffcdd2; padding: 0.6rem 1.5rem; font-size: 0.95rem; letter-spacing: 2px; backdrop-filter: blur(10px); text-transform: uppercase; font-weight: 700; box-shadow: 0 4px 15px rgba(229, 57, 53, 0.3);">
                    🚀 UP's #1 Construction Marketplace
                </span>
                
                <h1 class="hero-title animate-on-scroll" style="font-size: clamp(2.5rem, 6vw, 4rem); line-height: 1.2; margin-bottom: 1.5rem; font-weight: 900; letter-spacing: -2px; color: white; text-shadow: 0 4px 20px rgba(0,0,0,0.5), 0 0 40px rgba(255,255,255,0.1);">
                    <span style="display: block;">Build <span style="background: linear-gradient(135deg, #fff 0%, #f5f5f5 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: none;">Stronger.</span></span>
                    <span class="shimmer-text" style="display: block; background: linear-gradient(135deg, #E53935 0%, #ff6659 50%, #E53935 100%); background-size: 200% auto; -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: none; animation: shimmer 3s linear infinite;">Build Smarter.</span>
                </h1>
                
                <p class="hero-subtitle animate-on-scroll" style="font-size: 1.5rem; color: rgba(255,255,255,0.9); margin-bottom: 2.5rem; max-width: 650px; line-height: 1.7; font-weight: 400; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                    Your trusted partner for <strong style="color: #ffebee; border-bottom: 3px solid #E53935; padding-bottom: 2px; font-weight: 700;">Premium Bricks</strong>, <strong style="color: #ffebee; border-bottom: 3px solid #E53935; padding-bottom: 2px; font-weight: 700;">Quality Cement</strong>, <strong style="color: #ffebee; border-bottom: 3px solid #E53935; padding-bottom: 2px; font-weight: 700;">TMT Steel</strong>, and <strong style="color: #ffebee; border-bottom: 3px solid #E53935; padding-bottom: 2px; font-weight: 700;">Construction Sand</strong>. 
                    <span style="display: block; margin-top: 0.8rem; font-size: 1.3rem; color: #ffcdd2;">Delivered <u style="text-decoration-color: #E53935; text-decoration-thickness: 2px;">strictly on time</u>, every time.</span>
                </p>
                
                <div class="flex gap-md animate-on-scroll" style="animation-delay: 0.3s; flex-wrap: wrap;">
                    <a href="#shop-categories" class="btn btn-lg pulse-glow smooth-scroll-btn" style="border-radius: 50px; padding: 1.2rem 3.5rem; font-size: 1.15rem; font-weight: 800; display: flex; align-items: center; gap: 12px; background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%); color: #E53935; border: none; box-shadow: 0 10px 30px rgba(229, 57, 53, 0.4), 0 0 0 0 rgba(229, 57, 53, 0.4); transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 1px;">
                        <span>BUY NOW</span> <span style="font-size: 1.3rem;">🛒</span>
                    </a>
                    <a href="<?= SITE_URL ?>/contact.php" class="btn btn-outline btn-lg" style="border-radius: 50px; padding: 1.2rem 3.5rem; color: white; border: 3px solid rgba(255,255,255,0.4); font-size: 1.15rem; font-weight: 700; background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease;">
                        Get Best Quote
                    </a>
                </div>
                
                <div class="mt-xl flex gap-xl animate-on-scroll" style="animation-delay: 0.5s; border-top: 2px solid rgba(255,255,255,0.15); padding-top: 2.5rem; margin-top: 3rem;">
                    <div class="flex items-center gap-sm">
                        <span style="font-size: 2rem;">🏭</span>
                        <div>
                            <div style="font-weight: 800; font-size: 1.15rem; color: white; text-shadow: 0 2px 8px rgba(0,0,0,0.3);">Factory Direct</div>
                            <div style="font-size: 0.9rem; color: #bdbdbd; font-weight: 500;">Zero Middlemen</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-sm">
                        <span style="font-size: 2rem;">🚚</span>
                        <div>
                            <div style="font-weight: 800; font-size: 1.15rem; color: white; text-shadow: 0 2px 8px rgba(0,0,0,0.3);">Express Delivery</div>
                            <div style="font-size: 0.9rem; color: #bdbdbd; font-weight: 500;">Within 24 Hours</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right: Visual Feature (3D Card or Image) -->
            <div class="hero-visual animate-on-scroll d-none d-md-block" style="animation-delay: 0.4s; perspective: 1000px;">
                <div class="glass-card card-lift" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 2rem; border-radius: 24px; border: 1px solid rgba(255,255,255,0.2); transform: rotateY(-10deg); animation: float 6s ease-in-out infinite;">
                    <img src="<?= SITE_URL ?>/assets/img/all/1770573299_ChatGPTImageFeb8202610_54_20PM.jpg" 
                         alt="Modern Construction" 
                         style="width: 100%; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.3); transition: transform 0.3s ease;">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add keyframe animations -->
    <style>
        @keyframes float {
            0%, 100% {
                transform: rotateY(-10deg) translateY(0px);
            }
            50% {
                transform: rotateY(-10deg) translateY(-20px);
            }
        }
        
        .glass-card:hover img {
            transform: scale(1.05);
        }
    </style>
    
    <!-- Wave Bottom -->
    <div style="position: absolute; bottom: -1px; left: 0; width: 100%; overflow: hidden; line-height: 0;">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: calc(100% + 1.3px); height: 80px;">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" style="fill: #ffffff;"></path>
        </svg>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section" style="padding: 8rem 0; background: #fff;">
    <div class="container">
        <div class="text-center mb-xl">
            <h2 class="section-title animate-on-scroll" style="font-size: 2.8rem; margin-bottom: 1rem;">Why JagritiBricks?</h2>
             <p class="animate-on-scroll" style="color: var(--text-secondary); max-width: 600px; margin: 0 auto; font-size: 1.15rem;">
                Your one-stop destination for all core construction materials. We ensure quality, quantity, and quick delivery.
            </p>
        </div>
        
        <div class="grid grid-3" style="gap: 2.5rem;">
            <!-- Feature 1 -->
            <div class="feature-card animate-on-scroll hover-lift" style="padding: 2.5rem; border-radius: 20px; background: #fafafa; border: 1px solid #f0f0f0;">
                 <div class="icon-box pulse-glow" style="width: 80px; height: 80px; background: #ffebee; color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem;">
                    🏭
                </div>
                <h3 style="font-size: 1.4rem; margin-bottom: 1rem;">Direct Sourcing</h3>
                <p style="color: var(--text-secondary);">We source directly from manufacturers to give you the best market rates for Bricks, Cement, and Steel.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="feature-card animate-on-scroll hover-lift" style="padding: 2.5rem; border-radius: 20px; background: #fafafa; border: 1px solid #f0f0f0; animation-delay: 0.1s;">
                 <div class="icon-box pulse-glow" style="width: 80px; height: 80px; background: #e3f2fd; color: #2196f3; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem;">
                    ✔️
                </div>
                <h3 style="font-size: 1.4rem; margin-bottom: 1rem;">Quality Assured</h3>
                <p style="color: var(--text-secondary);">Every bag of cement and every bar of steel is verified for authenticity and grade.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="feature-card animate-on-scroll hover-lift" style="padding: 2.5rem; border-radius: 20px; background: #fafafa; border: 1px solid #f0f0f0; animation-delay: 0.2s;">
                 <div class="icon-box pulse-glow" style="width: 80px; height: 80px; background: #e8f5e9; color: #4caf50; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem;">
                    🚛
                </div>
                <h3 style="font-size: 1.4rem; margin-bottom: 1rem;">All-in-One Delivery</h3>
                <p style="color: var(--text-secondary);">Get bricks, sand, and cement delivered together to streamline your construction timeline.</p>
            </div>
        </div>
    </div>
</section>

<style>
/* ... existing animations ... */
@keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-10px); } 100% { transform: translateY(0px); } }
@keyframes pulse-glow { 0% { box-shadow: 0 0 0 0 rgba(229, 57, 53, 0.4); } 70% { box-shadow: 0 0 0 10px rgba(229, 57, 53, 0); } 100% { box-shadow: 0 0 0 0 rgba(229, 57, 53, 0); } }
@keyframes gradient-bg { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

/* Hero Gradient */
/* Hero Background - Real Image for Trust */
.hero {
  position: relative;
  overflow: hidden;
  color: white !important;
  background: #222; /* Fallback */
}

.hero::before {
  content: "";
  position: absolute;
  inset: 0;
  /* HERO IMAGE HERE - Trust + Quality */
  background:
    linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.5)),
    url("<?= SITE_URL ?>/assets/img/hero/hero-indian-bricks.jpg") center / cover no-repeat;
  z-index: 0;
  background-attachment: fixed; /* Parallax feel */
}

.hero .container {
  position: relative;
  z-index: 2;
}

.hero-title, .hero-subtitle { color: white !important; text-shadow: 0 2px 10px rgba(0,0,0,0.5); }

/* Trust Line */
.hero-trust-line {
  margin-top: 15px;
  font-size: 1rem;
  opacity: 0.95;
  letter-spacing: 0.5px;
  font-weight: 500;
  color: #fff;
  text-shadow: 0 1px 5px rgba(0,0,0,0.5);
}
.hero-title, .hero-subtitle { color: white !important; text-shadow: 0 2px 10px rgba(0,0,0,0.2); }

/* Buttons */
.btn-lg {
    background: white !important;
    color: #E53935 !important;
    border: none;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

/* Category Cards - Colorful & Interactive */
.category-card:nth-child(1) .category-icon { background: linear-gradient(135deg, #FF9A9E, #FECFEF); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 3.5rem; }
.category-card:nth-child(2) .category-icon { background: linear-gradient(135deg, #a18cd1, #fbc2eb); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 3.5rem; }
.category-card:nth-child(3) .category-icon { background: linear-gradient(135deg, #84fab0, #8fd3f4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 3.5rem; }
.category-card:nth-child(4) .category-icon { background: linear-gradient(135deg, #e0c3fc, #8ec5fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 3.5rem; }

/* Enhanced Section Header */
.section-title {
    position: relative;
    display: inline-block;
    padding-bottom: 15px;
    margin-bottom: 2rem;
}
.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #E53935, #FF8E53);
    border-radius: 2px;
}

.category-card {
    border-radius: 20px;
    border: 1px solid rgba(0,0,0,0.05);
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

/* Process Cards - Glassy */
.process-card {
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-radius: 20px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05); /* Softer shadow */
    position: relative; /* Ensure badge is positioned relative to card */
    overflow: hidden; /* clear corners */
    height: 100%; /* Uniform height */
}
.step-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
    color: white;
    padding: 6px 16px;
    border-radius: 30px;
    display: inline-block;
    font-weight: 700;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.5);
    z-index: 10;
    border: 2px solid white;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.process-card h3 { font-weight: 700; margin-top: 1rem; color: #2c3e50; }
.process-card p { font-size: 0.95rem; color: #666; line-height: 1.6; padding: 0 1rem 1.5rem 1rem; }
.process-img { margin-bottom: 0 !important; } /* Reset margin */

/* Typing Cursor */
.typing-cursor::after { content: '|'; animation: blink 1s step-start infinite; }
@keyframes blink { 50% { opacity: 0; } }

/* 3D Tilt */
.process-card {
    transition: transform 0.1s ease-out, box-shadow 0.3s ease; 
    transform-style: preserve-3d;
    perspective: 1000px;
}
.process-img-placeholder, h3, p { transform: translateZ(20px); }

/* Particles */
.particle {
    position: absolute;
    background: rgba(255, 255, 255, 0.3); /* Softer particles */
    border-radius: 50%;
    pointer-events: none;
    animation: rise 10s infinite linear;
}
@keyframes rise {
    0% { transform: translateY(0) scale(1); opacity: 0; }
    20% { opacity: 0.6; }
    100% { transform: translateY(-200px) scale(0); opacity: 0; }
}

/* Value Badge */
.value-badge {
  position: absolute;
  top: 12px;
  left: 12px;
  background: #E53935;
  color: white;
  font-size: 0.75rem;
  padding: 5px 10px;
  border-radius: 50px;
  font-weight: 600;
  z-index: 10;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.value-badge.green { background: #2E7D32; }

/* Brick Gallery */
.brick-gallery {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
}
.brick-gallery img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  border-radius: 16px;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  cursor: pointer;
}
.brick-gallery img:hover {
  transform: scale(1.05);
  box-shadow: 0 20px 40px rgba(0,0,0,0.25);
  z-index: 2;
}
@media (max-width: 768px) { .brick-gallery { grid-template-columns: repeat(2, 1fr); } }

/* Process & Category Images */
.process-img { width: 100%; height: 160px; object-fit: cover; border-radius: 14px; margin-bottom: 12px; }
.category-img { width: 100%; height: 140px; object-fit: cover; border-radius: 16px; margin-bottom: 12px; }

/* Pattern Backgrounds */
.bg-pattern-dots {
    background-color: #ffffff;
    background-image: radial-gradient(#e5e5e5 1px, transparent 1px);
    background-size: 20px 20px;
}
.bg-pattern-grid {
    background-size: 40px 40px;
    background-image: linear-gradient(to right, rgba(0,0,0,0.03) 1px, transparent 1px),
                      linear-gradient(to bottom, rgba(0,0,0,0.03) 1px, transparent 1px);
}

/* Journey Connecting Line */
.journey-line-container {
    position: relative;
}
.journey-line-container::before {
    content: '';
    position: absolute;
    top: 40px; /* Aligns with badges */
    left: 10%;
    right: 10%;
    height: 2px;
    background: repeating-linear-gradient(90deg, #FF8E53 0, #FF8E53 10px, transparent 10px, transparent 20px);
    z-index: 0;
    opacity: 0.6;
}
@media (max-width: 992px) { .journey-line-container::before { display: none; } } /* Hide on mobile */

/* Wave Divider (SVG) */
.wave-divider {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}
.wave-divider svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 50px;
}
.wave-divider .shape-fill { fill: #fafafa; }

/* CTA Gradient */
.cta-gradient {
    background: linear-gradient(135deg, #cb2d3e 0%, #ef473a 100%);
    color: white;
    padding: 6rem 0;
    position: relative;
    overflow: hidden;
}
.cta-gradient::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>

<script>
// 1. Typing Effect for Subtitle
document.addEventListener('DOMContentLoaded', () => {
    const subtitle = document.querySelector('.hero-subtitle');
    if(subtitle) {
        const text = subtitle.innerText;
        subtitle.innerText = '';
        subtitle.classList.add('typing-cursor');
        
        let i = 0;
        const type = () => {
            if(i < text.length) {
                subtitle.innerText += text.charAt(i);
                i++;
                setTimeout(type, 50);
            } else {
                subtitle.classList.remove('typing-cursor');
            }
        };
        setTimeout(type, 1000); // Start after 1s
    }

    // 2. 3D Tilt for Process Cards
    const cards = document.querySelectorAll('.process-card');
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = ((y - centerY) / centerY) * -10;
            const rotateY = ((x - centerX) / centerX) * 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
        });
    });

    // 3. Simple Particle System
    const particleContainer = document.getElementById('particles-js');
    if(particleContainer) {
        const createParticle = () => {
            const particle = document.createElement('div');
            particle.className = 'particle';
            const size = Math.random() * 5 + 2;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDuration = `${Math.random() * 5 + 5}s`;
            
            particleContainer.appendChild(particle);
            
            // Remove after animation
            setTimeout(() => { particle.remove(); }, 10000);
        };
        
        // Create initial batch
        for(let i=0; i<20; i++) createParticle();
        // Keep creating
        setInterval(createParticle, 500);
    }
});
</script>

<!-- Building Journey Section -->
<section class="section" style="background: #fafafa; position: relative; padding: 6rem 0;">
    <div class="container">
        <h2 class="section-title text-center animate-on-scroll" style="font-size: 2.5rem; font-weight: 800;">Your Building Journey</h2>
        <div class="text-center mb-xl animate-on-scroll">
            <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto; line-height: 1.6;">
                From the first plot of land to the final coat of paint, follow our step-by-step guide to build your dream home with confidence.
            </p>
        </div>
        
        <div class="journey-line-container grid grid-4" style="gap: 1.5rem;">
            <!-- Step 1 -->
            <div class="process-card animate-on-scroll" style="transition: transform 0.3s ease; position: relative; z-index: 2;" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="step-badge">Step 1</div>
                <img src="<?= SITE_URL ?>/assets/img/all/1770573299_ChatGPTImageFeb8202610_54_20PM.jpg" alt="Choose Land" class="process-img">
                <div class="text-center">
                    <h3>Choose Ideal Land</h3>
                    <p>Learn how to evaluate soil quality, location, and legal aspects before buying.</p>
                </div>
            </div>
            
            <!-- Step 2 -->
            <div class="process-card animate-on-scroll" style="animation-delay: 0.2s; transition: transform 0.3s ease; position: relative; z-index: 2;" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="step-badge">Step 2</div>
                <img src="<?= SITE_URL ?>/assets/img/all/1770573311_ChatGPTImageFeb8202610_56_27PM.jpg" alt="Planning and Design" class="process-img">
                <div class="text-center">
                    <h3>Planning & Design</h3>
                    <p>Work with architects to create a functional and aesthetic blueprint for your future home.</p>
                </div>
            </div>
            
            <!-- Step 3 -->
            <div class="process-card animate-on-scroll" style="animation-delay: 0.4s; transition: transform 0.3s ease; position: relative; z-index: 2;" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="step-badge">Step 3</div>
                <img src="<?= SITE_URL ?>/assets/img/all/1770573322_ChatGPTImageFeb8202610_58_19PM.jpg" alt="Budgeting and Materials" class="process-img">
                <div class="text-center">
                    <h3>Budgeting & Materials</h3>
                    <p>Estimate costs accurately and select the right cement and materials for longevity.</p>
                </div>
            </div>
            
            <!-- Step 4 -->
            <div class="process-card animate-on-scroll" style="animation-delay: 0.6s; transition: transform 0.3s ease; position: relative; z-index: 2;" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="step-badge">Step 4</div>
                <img src="<?= SITE_URL ?>/assets/img/all/1770573335_ChatGPTImageFeb8202610_59_40PM.jpg" alt="Construction Techniques" class="process-img">
                <div class="text-center">
                    <h3>Construction Techniques</h3>
                    <p>Understand best practices for foundation, masonry, and curing to ensure strength.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="shop-categories" class="section bg-pattern-grid" style="padding: 6rem 0; scroll-margin-top: 80px;">
    <div class="container">
        <h2 class="section-title text-center animate-on-scroll" style="font-size: 2.5rem; font-weight: 800;">
            Shop by Category
        </h2>
        
        <div class="grid grid-4">
            <a href="<?= SITE_URL ?>/shop.php?category=brick" class="category-card animate-on-scroll">
                <img src="<?= SITE_URL ?>/assets/img/all/clay.jpg" alt="Bricks" class="category-img" onerror="this.src='https://placehold.co/400x300?text=Bricks'">
                <div class="text-center" style="padding: 1.5rem 1rem;">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🧱</div>
                    <h3 class="category-title">Bricks</h3>
                    <p class="category-description">Red Clay, Fly Ash, Concrete</p>
                </div>
            </a>
            
            <a href="<?= SITE_URL ?>/shop.php?category=cement" class="category-card animate-on-scroll">
                <img src="<?= SITE_URL ?>/assets/img/all/cement.jpg" alt="Cement" class="category-img" onerror="this.src='https://placehold.co/400x300?text=Cement'">
                <div class="text-center" style="padding: 1.5rem 1rem;">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🏗️</div>
                    <h3 class="category-title">Cement</h3>
                    <p class="category-description">OPC, PPC (All Brands)</p>
                </div>
            </a>
            
            <a href="<?= SITE_URL ?>/shop.php?category=sariya" class="category-card animate-on-scroll">
                <img src="<?= SITE_URL ?>/assets/img/all/sariya.jpg" alt="Sariya / TMT" class="category-img" onerror="this.src='https://placehold.co/400x300?text=TMT+Bar'">
                <div class="text-center" style="padding: 1.5rem 1rem;">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🔩</div>
                    <h3 class="category-title">Sariya (TMT)</h3>
                    <p class="category-description">500D, 550D Steel Bars</p>
                </div>
            </a>
            
            <a href="<?= SITE_URL ?>/shop.php?category=mauram-sand" class="category-card animate-on-scroll">
                <img src="<?= SITE_URL ?>/assets/img/all/mauram.jpg" alt="Mauram & Sand" class="category-img" onerror="this.src='https://placehold.co/400x300?text=Sand'">
                <div class="text-center" style="padding: 1.5rem 1rem;">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🏜️</div>
                    <h3 class="category-title">Mauram & Sand</h3>
                    <p class="category-description">Coarse & Fine Aggregates</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Slider (Manual Control) -->
<section class="section" style="padding: 6rem 0; background: #fff; position: relative; overflow: hidden;">
    <!-- Background Decoration -->
    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255, 107, 107, 0.05) 0%, transparent 70%); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -50px; left: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255, 142, 83, 0.05) 0%, transparent 70%); border-radius: 50%;"></div>

    <div class="container mb-xl">
        <h2 class="section-title text-center animate-on-scroll" style="font-size: 2.5rem; font-weight: 800; color: #1a1a1a;">Trusted by Builders & Families</h2>
        <p class="text-center animate-on-scroll" style="color: #666; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Join 10,000+ happy customers building their dreams with JagritiBricks</p>
    </div>

    <div class="container position-relative animate-on-scroll">
        <!-- Slider Container -->
        <div id="testimonial-track" style="display: flex; gap: 2rem; overflow-x: auto; scroll-behavior: smooth; padding: 1rem 0.5rem; scroll-snap-type: x mandatory; -ms-overflow-style: none; scrollbar-width: none;">
            
            <?php 
            $testimonials = [
                ['RK', '#FF6B6B, #FF8E53', 'Rajesh Kumar', 'Home Owner • Kanpur', 'Used JagritiBricks for my G+1 house. The brick quality is superior to what local vendors offer, and the direct factory delivery saved me a lot of hassle.'],
                ['AS', '#4facfe, #00f2fe', 'Amit Singh', 'Contractor • Lucknow', 'Consistent quality across 5 truckloads. Zero breakage issues and timely delivery enabled us to finish the walls 2 days early.'],
                ['PS', '#43e97b, #38f9d7', 'Priya Sharma', 'Architect • Unnao', 'The fly ash bricks are eco-friendly and perfectly shaped. They require less mortar and plaster, which is a huge cost saving.'],
                ['MD', '#fa709a, #fee140', 'Manoj Dubey', 'Developer • Kanpur', 'Highly professional service. The machine-molded bricks give a very premium finish to the exposed walls.'],
                ['VK', '#667eea, #764ba2', 'Vikram Khanna', 'Civil Engineer', 'I tested their bricks in the lab and the compressive strength exceeded industry standards. Validated!']
            ];
            
            foreach($testimonials as $t): ?>
            
            <div class="testimonial-card" style="flex: 0 0 350px; scroll-snap-align: center; background: white; border: 1px solid #eee; padding: 2rem; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s ease;">
                <div style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, <?= $t[1] ?>); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.2rem; color: white; margin-right: 1rem; flex-shrink: 0;"><?= $t[0] ?></div>
                    <div>
                        <h4 style="margin: 0; font-size: 1.1rem; color: #1a1a1a; font-weight: 700;"><?= $t[2] ?></h4>
                        <span style="font-size: 0.85rem; color: #888;"><?= $t[3] ?></span>
                    </div>
                </div>
                <div style="color: #FFD700; font-size: 1.1rem; margin-bottom: 1rem;">⭐⭐⭐⭐⭐</div>
                <p style="color: #555; line-height: 1.6; font-style: italic; font-size: 0.95rem;">"<?= $t[4] ?>"</p>
                <div style="margin-top: 1.5rem; display: flex; align-items: center; font-size: 0.8rem; color: #4CAF50; font-weight: 600;">
                    <span style="margin-right: 5px;">✔</span> Verified Purchase
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
        
        <!-- Navigation Buttons -->
        <button onclick="slideTestimonials('left')" class="slider-btn prev" style="position: absolute; left: -20px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; border-radius: 50%; background: white; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center; color: #333; font-size: 1.5rem;">
            ‹
        </button>
        <button onclick="slideTestimonials('right')" class="slider-btn next" style="position: absolute; right: -20px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; border-radius: 50%; background: white; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center; color: #333; font-size: 1.5rem;">
            ›
        </button>
    </div>

    <style>
    /* Hide scrollbar but keep functionality */
    #testimonial-track::-webkit-scrollbar { display: none; }
    
    .slider-btn:hover { background: var(--primary); color: white; transform: translateY(-50%) scale(1.1) !important; transition: all 0.3s ease; }
    
    @media (max-width: 768px) {
        .testimonial-card { flex: 0 0 85% !important; } /* Full width on mobile */
        .slider-btn { display: none !important; } /* Hide arrows on mobile, rely on swipe */
    }
    </style>

    <script>
    function slideTestimonials(direction) {
        const track = document.getElementById('testimonial-track');
        const scrollAmount = 370; // Card width + gap
        
        if(direction === 'left') {
            track.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    }
    </script>
</section>

<!-- Featured Bricks -->


<!-- CTA Section -->
<!-- CTA Section -->
<section class="cta-gradient text-center">
    <div class="container" style="position: relative; z-index: 2;">
        <h2 class="cta-title animate-on-scroll" style="font-size: 3rem; margin-bottom: 1.5rem; text-shadow: 0 4px 10px rgba(0,0,0,0.2);">
            Ready to Build Something Great?
        </h2>
        <p class="cta-text animate-on-scroll" style="font-size: 1.3rem; margin-bottom: 3rem; opacity: 0.95;">
            Trusted by builders across the region • Fair pricing • Reliable supply
        </p>
        <div class="flex justify-center gap-md animate-on-scroll">
            <a href="<?= SITE_URL ?>/shop.php" class="btn btn-lg pulse-glow" style="background: white; color: #E53935; font-weight: 800; padding: 1rem 3rem; border-radius: 50px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                Browse All Materials
            </a>
            <a href="<?= SITE_URL ?>/contact.php" class="btn btn-outline btn-lg" style="border: 2px solid white; color: white; padding: 1rem 3rem; border-radius: 50px; font-weight: 700;">
                Get a Quote
            </a>
        </div>
    </div>
</section>

<script>

</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
