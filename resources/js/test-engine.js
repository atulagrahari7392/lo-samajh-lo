// Test Engine Core Logic
class TestEngine {
    constructor(config) {
        this.attemptId = config.attemptId;
        this.questions = config.questions || [];
        this.currentQIndex = 0;
        this.answers = JSON.parse(localStorage.getItem('test_ans_'+this.attemptId)) || {};
        this.marked = JSON.parse(localStorage.getItem('test_mark_'+this.attemptId)) || {};
        this.timeLeft = config.durationSeconds;
        this.timerInterval = null;
        this.init();
    }

    init() {
        this.startTimer();
        this.autoSave();
        this.setupKeyboardNav();
        this.detectTabSwitch();
    }

    startTimer() {
        this.timerInterval = setInterval(() => {
            if (this.timeLeft > 0) {
                this.timeLeft--;
                // Update UI timer
            } else {
                this.submitTest();
            }
        }, 1000);
    }

    selectAnswer(qIndex, val) {
        this.answers[qIndex] = val;
        this.saveLocally();
    }

    saveLocally() {
        localStorage.setItem('test_ans_'+this.attemptId, JSON.stringify(this.answers));
        localStorage.setItem('test_mark_'+this.attemptId, JSON.stringify(this.marked));
    }

    autoSave() {
        setInterval(() => {
            // AJAX POST to save state to server
            console.log('Auto-saving to server...');
        }, 30000);
    }

    submitTest() {
        clearInterval(this.timerInterval);
        localStorage.removeItem('test_ans_'+this.attemptId);
        localStorage.removeItem('test_mark_'+this.attemptId);
        // AJAX POST to submit
        alert('Test Submitted');
    }

    setupKeyboardNav() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') this.nextQuestion();
            if (e.key === 'ArrowLeft') this.prevQuestion();
            if (e.key === 'm' || e.key === 'M') this.toggleMark();
        });
    }

    detectTabSwitch() {
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                alert('Warning: Switching tabs is not allowed during the test!');
                // Could record warning to server
            }
        });
    }
}
