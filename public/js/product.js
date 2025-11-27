// Package data for each service
        const packageData = {
            'Website Development Service': {
                basic: [
                    'Landing Page Responsive (1 Halaman)',
                    'Design Modern & Professional',
                    'Mobile Friendly',
                    'Form Kontak',
                    'Google Maps Integration',
                    'Loading Speed Optimization',
                    'Free Domain .com (1 Tahun)',
                    'Free Hosting (1 Tahun)',
                    'Free SSL Certificate',
                    'Revisi 2x',
                    'Support 30 Hari'
                ],
                standard: [
                    'Website Multi Page (5-7 Halaman)',
                    'Custom Design Premium',
                    'Fully Responsive (Mobile, Tablet, Desktop)',
                    'CMS (Content Management System)',
                    'Contact Form dengan Email Notification',
                    'Google Analytics Integration',
                    'Social Media Integration',
                    'SEO Friendly Structure',
                    'Free Domain .com (1 Tahun)',
                    'Free Premium Hosting (1 Tahun)',
                    'Free SSL Certificate',
                    'Speed Optimization',
                    'Revisi 5x',
                    'Support 60 Hari',
                    'Training Penggunaan CMS'
                ],
                premium: [
                    'Website Complex (10+ Halaman)',
                    'Custom Design Ultra Premium',
                    'Advanced Features & Functionality',
                    'Advanced CMS dengan User Management',
                    'E-commerce Integration (jika diperlukan)',
                    'Payment Gateway Integration',
                    'Advanced SEO On-Page',
                    'Multi-language Support',
                    'Blog System',
                    'Newsletter Integration',
                    'Advanced Analytics & Reporting',
                    'Security Enhancement',
                    'Backup Automation',
                    'Free Domain .com (2 Tahun)',
                    'Free Premium Hosting (2 Tahun)',
                    'Free SSL Certificate',
                    'Performance & Security Optimization',
                    'Revisi Unlimited',
                    'Priority Support 90 Hari',
                    'Training Comprehensive',
                    'Monthly Maintenance (3 Bulan)'
                ]
            },
            'Search Engine Optimization': {
                basic: [
                    'Keyword Research (10 Keywords)',
                    'On-Page SEO Optimization',
                    'Meta Tags Optimization',
                    'Content Optimization',
                    'Image SEO',
                    'Internal Linking Structure',
                    'Google Search Console Setup',
                    'Google Analytics Setup',
                    'XML Sitemap Creation',
                    'Robots.txt Optimization',
                    'Monthly Report (Basic)',
                    'Support 30 Hari'
                ],
                standard: [
                    'Keyword Research (25 Keywords)',
                    'Comprehensive On-Page SEO',
                    'Technical SEO Audit',
                    'Website Speed Optimization',
                    'Mobile SEO Optimization',
                    'Schema Markup Implementation',
                    'Local SEO Setup (Google My Business)',
                    'Competitor Analysis',
                    'Backlink Analysis',
                    'Content Strategy Development',
                    '4 Blog Posts (SEO Optimized)',
                    'Google Search Console & Analytics',
                    'Monthly Ranking Report',
                    'Monthly Traffic Report',
                    'Support 60 Hari',
                    'Monthly Consultation Call'
                ],
                premium: [
                    'Keyword Research (50+ Keywords)',
                    'Advanced On-Page & Technical SEO',
                    'Comprehensive Technical Audit',
                    'Advanced Schema Markup',
                    'International SEO (Multi-region)',
                    'E-commerce SEO (jika applicable)',
                    'Advanced Local SEO',
                    'Link Building Strategy',
                    'High-Quality Backlink Acquisition',
                    'Competitor Deep Analysis',
                    'Content Marketing Strategy',
                    '8 Blog Posts (Premium Quality)',
                    'Video SEO Optimization',
                    'Social Signals Optimization',
                    'Advanced Analytics & Tracking',
                    'Conversion Rate Optimization',
                    'Weekly Progress Reports',
                    'Monthly Comprehensive Reports',
                    'Priority Support 90 Hari',
                    'Bi-weekly Strategy Calls',
                    'Dedicated SEO Manager'
                ]
            },
            'Digital Marketing': {
                basic: [
                    'Social Media Management (2 Platform)',
                    'Content Planning & Scheduling',
                    '12 Posts per Bulan',
                    'Basic Graphic Design',
                    'Facebook/Instagram Ads Setup',
                    'Ad Budget Management (up to 3 juta)',
                    'Audience Targeting',
                    'Campaign Monitoring',
                    'Monthly Performance Report',
                    'Support 30 Hari'
                ],
                standard: [
                    'Social Media Management (3-4 Platform)',
                    'Comprehensive Content Strategy',
                    '24 Posts per Bulan',
                    'Professional Graphic Design',
                    'Video Content (2 per Bulan)',
                    'Multi-Platform Ads (FB, IG, Google)',
                    'Ad Budget Management (up to 10 juta)',
                    'Advanced Audience Targeting',
                    'A/B Testing',
                    'Retargeting Campaigns',
                    'Influencer Outreach',
                    'Email Marketing Setup',
                    'Community Management',
                    'Competitor Analysis',
                    'Bi-weekly Reports',
                    'Monthly Strategy Meeting',
                    'Support 60 Hari'
                ],
                premium: [
                    'Full Social Media Management (All Major Platforms)',
                    'Premium Content Strategy',
                    '40 Posts per Bulan',
                    'Premium Design & Copywriting',
                    'Professional Video Production (4 per Bulan)',
                    'Omnichannel Advertising',
                    'Ad Budget Management (unlimited)',
                    'Advanced Marketing Automation',
                    'CRM Integration',
                    'Lead Generation Funnel',
                    'Landing Page Optimization',
                    'Email Marketing Campaigns',
                    'WhatsApp Marketing',
                    'Influencer Partnership Management',
                    'PR & Media Coverage',
                    'Brand Reputation Management',
                    'Advanced Analytics & BI Dashboard',
                    'Weekly Performance Reports',
                    'Bi-weekly Strategy Calls',
                    'Priority Support 90 Hari',
                    'Dedicated Account Manager',
                    'Quarterly Business Review'
                ]
            }
        };

        let currentService = '';
        let selectedPackage = '';

        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const navMenu = document.getElementById('navMenu');

        if (mobileToggle) {
            mobileToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
            });
        }

        // Handle order function - Open Modal
        function handleOrder(serviceName) {
            currentService = serviceName;
            selectedPackage = '';
            
            // Update modal title
            document.getElementById('modalServiceTitle').textContent = 'Pilih Paket ' + serviceName;
            
            // Reset package selection
            document.querySelectorAll('.package-card').forEach(card => {
                card.classList.remove('selected');
            });
            
            // Hide all package details
            document.querySelectorAll('.package-details').forEach(detail => {
                detail.classList.remove('active');
            });
            
            // Disable confirm button
            document.getElementById('confirmBtn').disabled = true;
            
            // Show modal
            document.getElementById('packageModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Select package
        function selectPackage(packageType) {
            selectedPackage = packageType;
            
            // Update card selection
            document.querySelectorAll('.package-card').forEach(card => {
                card.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');
            
            // Hide all details
            document.querySelectorAll('.package-details').forEach(detail => {
                detail.classList.remove('active');
            });
            
            // Show selected package details
            const detailsElement = document.getElementById(packageType + 'Details');
            detailsElement.classList.add('active');
            
            // Populate features
            const features = packageData[currentService][packageType];
            const featuresList = document.getElementById(packageType + 'Features');
            featuresList.innerHTML = features.map(feature => `<li>${feature}</li>`).join('');
            
            // Enable confirm button
            document.getElementById('confirmBtn').disabled = false;
            
            // Smooth scroll to details
            detailsElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        // Close modal
        function closeModal() {
            document.getElementById('packageModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('packageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Confirm order
        function confirmOrder() {
            if (!selectedPackage) {
                alert('Silakan pilih paket terlebih dahulu!');
                return;
            }
            
            const packageNames = {
                'basic': 'Basic',
                'standard': 'Standard',
                'premium': 'Premium'
            };
            
            const prices = {
                'basic': 'Rp 2.500.000',
                'standard': 'Rp 5.000.000',
                'premium': 'Rp 10.000.000'
            };
            
            alert(`Order Dikonfirmasi!\n\nLayanan: ${currentService}\nPaket: ${packageNames[selectedPackage]}\nHarga: ${prices[selectedPackage]}\n\nAnda akan dihubungi oleh tim kami segera.`);
            
            closeModal();
            
            // Here you can add actual order processing logic
            // For example: redirect to checkout page or send data to backend
            // window.location.href = `/checkout?service=${encodeURIComponent(currentService)}&package=${selectedPackage}`;
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });