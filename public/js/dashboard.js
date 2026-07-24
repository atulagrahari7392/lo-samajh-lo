document.addEventListener('DOMContentLoaded', () => {
    // Chart.js Configuration
    const chartCanvas = document.getElementById('performanceChart');
    if (chartCanvas) {
        const ctx = chartCanvas.getContext('2d');
        
        // Setup gradients
        const gradientPrimary = ctx.createLinearGradient(0, 0, 0, 300);
        gradientPrimary.addColorStop(0, 'rgba(14, 165, 233, 0.4)'); // primary-500
        gradientPrimary.addColorStop(1, 'rgba(14, 165, 233, 0.0)');

        const performanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Score Percentage',
                    data: [65, 59, 80, 81, 76, 85, 90],
                    borderColor: '#0EA5E9', // primary-500
                    backgroundColor: gradientPrimary,
                    borderWidth: 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#0EA5E9',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4 // smooth curves
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0F172A',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 10,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return `Score: ${context.parsed.y}%`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.05)' : 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false,
                        },
                        ticks: {
                            color: document.documentElement.classList.contains('dark') ? '#94A3B8' : '#64748B',
                            stepSize: 20
                        }
                    },
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: {
                            color: document.documentElement.classList.contains('dark') ? '#94A3B8' : '#64748B'
                        }
                    }
                }
            }
        });

        // Watch for theme changes to update chart grid colors
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class') {
                    const isDark = document.documentElement.classList.contains('dark');
                    performanceChart.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.05)' : 'rgba(0, 0, 0, 0.05)';
                    performanceChart.options.scales.y.ticks.color = isDark ? '#94A3B8' : '#64748B';
                    performanceChart.options.scales.x.ticks.color = isDark ? '#94A3B8' : '#64748B';
                    performanceChart.update();
                }
            });
        });
        observer.observe(document.documentElement, { attributes: true });
    }
});
