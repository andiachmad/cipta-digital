@extends('layouts.app')

@section('title', 'Cipta Digital - Website Profesional untuk Bisnis Anda')

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Buat Website Profesional untuk Bisnis Anda</h1>
            <button class="hero-btn" onclick="window.location.href='{{ route('homepage.products') }}'">Pesan Sekarang</button>
        </div>

        <div class="hero-image">
            <img src="{{ asset('images/hero-section.png') }}" alt="Hero Image">
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <h2>About Us</h2>
        <div class="about-content">
            <div class="about-logo">
                <div style="color: #2563eb;">Cipta <span style="color: #60a5fa;">Digital</span></div>
            </div>
            <div class="about-text">
                <p>Kami adalah perusahaan digital yang membantu bisnis, terutama UMKM, berkembang melalui layanan pembuatan website, SEO, dan digital marketing agar lebih mudah menjangkau pasar luas di era modern.</p>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features">
        <h2>Mengapa Memilih Kami ?</h2>
        <p class="features-subtitle">Layanan Digital Terlengkap Untuk Bisnis UMKM Anda</p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🌐</div>
                <h3>Pengerjaan Cepat</h3>
                <p>The advantage of hiring a web/app with us is that gives you confidence service and all-around flexibility.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3>Desain Kreatif</h3>
                <p>The advantage of hiring a web/app with us is that gives you confidence service and all-around flexibility.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏷️</div>
                <h3>Harga Terjangkau</h3>
                <p>The advantage of hiring a web/app with us is that gives you confidence service and all-around flexibility.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎧</div>
                <h3>Customer Service</h3>
                <p>The advantage of hiring a web/app with us is that gives you confidence service and all-around flexibility.</p>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="partners">
        <h2>Partner <span>Kami</span></h2>
        <div class="partners-grid">
            <div class="partner-logo">BRI</div>
            <div class="partner-logo" style="color: #0066cc;">BCA</div>
            <div class="partner-logo" style="color: #611f69;">Slack</div>
            <div class="partner-logo">
                <span style="color: #4285f4;">G</span><span style="color: #ea4335;">o</span><span style="color: #fbbc05;">o</span><span style="color: #4285f4;">g</span><span style="color: #34a853;">l</span><span style="color: #ea4335;">e</span>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="testimonials-header">
            <div class="testimonials-label">TESTIMONIALS</div>
            <h2>Review Pelanggan</h2>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <p class="testimonial-text">Website saya sekarang terlihat jauh lebih profesional, dan penjualan saya mulai meningkat setelah bekerja dengan digital marketing Ciptahost.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👤</div>
                    <div class="author-info">
                        <h4>Muhammad Rafty</h4>
                        <p>Founder & Head of Digital Growth CiptaHost Utama</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <p class="testimonial-text">Proses pengerjaannya sangat cepat dan hasilnya luar biasa, website saya sekarang sangat user-friendly dan menarik pelanggan baru.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👤</div>
                    <div class="author-info">
                        <h4>Yossefino</h4>
                        <p>Owner & Light Manufacturer Local Lampshade Co.</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <p class="testimonial-text">Terima kasih, berkat bantuan Anda, bisnis kami menjadi makin maju dan efektif menggunakan teknologi untuk memperluas pasar. Sangat Disarankan Untuk Bisnis UMKM Lokal Kami.</p>
                <div class="testimonial-author">
                    <div class="author-avatar">👤</div>
                    <div class="author-info">
                        <h4>Annil</h4>
                        <p>Founder & Business Development PT Belawa Berkah Abadi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('js/homepage.js') }}"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush