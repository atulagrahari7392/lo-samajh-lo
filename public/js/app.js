document.addEventListener('DOMContentLoaded', () => {
    // Dark Mode Toggle
    const themeToggleBtn = document.getElementById('theme-toggle');
    const html = document.documentElement;

    // Check saved theme or system preference
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    }

    // Sticky Header
    const header = document.getElementById('main-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                header.classList.add('shadow-md', 'backdrop-blur-xl', 'bg-white/80', 'dark:bg-[#0F172A]/80');
                header.classList.remove('bg-transparent');
            } else {
                header.classList.remove('shadow-md', 'backdrop-blur-xl', 'bg-white/80', 'dark:bg-[#0F172A]/80');
                header.classList.add('bg-transparent');
            }
        });
    }

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Scroll Reveal Animation
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    revealElements.forEach(el => revealObserver.observe(el));

    // Counter Animation
    const counters = document.querySelectorAll('.counter-value');
    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.getAttribute('data-target'));
                let startValue = 0;
                const duration = 2000; 
                const increment = finalValue / (duration / 16); // 60fps

                const updateCounter = () => {
                    startValue += increment;
                    if (startValue < finalValue) {
                        target.innerText = Math.ceil(startValue);
                        requestAnimationFrame(updateCounter);
                    } else {
                        target.innerText = finalValue;
                    }
                };
                updateCounter();
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => counterObserver.observe(counter));

    // OTP Input Auto-focus
    const otpInputs = document.querySelectorAll('.otp-input');
    if (otpInputs.length > 0) {
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });
    }
});
