class TestEngine {
    constructor() {
        this.timerElement = document.getElementById('timer');
        this.submitBtn = document.getElementById('submit-test-btn');
        this.submitModal = document.getElementById('submit-modal');
        this.cancelSubmitBtn = document.getElementById('cancel-submit');
        this.fullscreenBtn = document.getElementById('fullscreen-btn');
        this.clearBtn = document.getElementById('clear-btn');
        this.options = document.querySelectorAll('input[type="radio"]');
        
        // Time in seconds (2 hours)
        this.totalSeconds = 2 * 60 * 60; 
        
        this.init();
    }

    init() {
        this.startTimer();
        this.attachEventListeners();
        this.setupKeyboardShortcuts();
        this.detectTabSwitch();
    }

    startTimer() {
        // Restore from localStorage if exists to prevent refresh cheating
        const savedTime = localStorage.getItem('test_timer_left');
        if (savedTime && !isNaN(savedTime)) {
            this.totalSeconds = parseInt(savedTime);
        }

        this.timerInterval = setInterval(() => {
            if (this.totalSeconds <= 0) {
                clearInterval(this.timerInterval);
                this.forceSubmit();
                return;
            }

            this.totalSeconds--;
            localStorage.setItem('test_timer_left', this.totalSeconds);
            this.updateTimerDisplay();

            // Auto-save simulation every 30 seconds
            if (this.totalSeconds % 30 === 0) {
                console.log('Auto-saving progress...');
                // fetch('/api/save-progress', {...})
            }
        }, 1000);
    }

    updateTimerDisplay() {
        if (!this.timerElement) return;
        
        const h = Math.floor(this.totalSeconds / 3600);
        const m = Math.floor((this.totalSeconds % 3600) / 60);
        const s = this.totalSeconds % 60;
        
        this.timerElement.innerText = 
            `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
            
        // Flash red in last 5 minutes
        if (this.totalSeconds < 300) {
            this.timerElement.classList.add('animate-pulse', 'text-red-600');
        }
    }

    attachEventListeners() {
        if (this.submitBtn) {
            this.submitBtn.addEventListener('click', () => {
                this.submitModal.classList.remove('hidden');
            });
        }

        if (this.cancelSubmitBtn) {
            this.cancelSubmitBtn.addEventListener('click', () => {
                this.submitModal.classList.add('hidden');
            });
        }

        if (this.fullscreenBtn) {
            this.fullscreenBtn.addEventListener('click', () => {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen().catch(err => {
                        console.log(`Error attempting to enable fullscreen: ${err.message}`);
                    });
                } else {
                    document.exitFullscreen();
                }
            });
        }

        if (this.clearBtn) {
            this.clearBtn.addEventListener('click', () => {
                this.options.forEach(opt => opt.checked = false);
            });
        }
    }

    setupKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            // Left arrow -> prev
            if (e.key === 'ArrowLeft') {
                console.log('Navigating to previous question');
            }
            // Right arrow -> save & next
            if (e.key === 'ArrowRight') {
                console.log('Navigating to next question');
            }
            // M -> mark for review
            if (e.key === 'm' || e.key === 'M') {
                const markBtn = document.getElementById('mark-review-btn');
                if (markBtn) markBtn.click();
            }
        });
    }

    detectTabSwitch() {
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                // Log warning or penalize
                console.warn('Tab switched during test! Recording violation.');
                alert('WARNING: Tab switching is not allowed during the test. Continued violations may auto-submit your test.');
            }
        });
    }

    forceSubmit() {
        alert("Time is up! Submitting test automatically.");
        localStorage.removeItem('test_timer_left');
        window.location.href = '/student/tests/result';
    }
}

// Initialize on load
document.addEventListener('DOMContentLoaded', () => {
    new TestEngine();
});
