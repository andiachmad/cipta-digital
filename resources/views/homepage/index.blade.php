@extends('layouts.app')

@section('title', 'Beranda - Cipta Digital')

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section" style="background-image: url('{{ asset('images/banner.png') }}');">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Solusi Digital Terbaik untuk Bisnis Anda</h1>
            <p class="hero-subtitle">
                Kami membantu mengembangkan bisnis Anda melalui teknologi terkini. 
                Percayakan kebutuhan digital Anda bersama Cipta Digital.
            </p>
            <a href="#services" class="btn-cta">Lihat Layanan Kami</a>
        </div>
    </section>

    {{-- Services Section --}}
    <section id="services" class="services-section">
        <h2 class="section-title">Layanan Unggulan</h2>
        
        <div class="services-grid">
            {{-- Card 1 --}}
            <div class="service-card">
                <img src="{{ asset('images/jasa1.jpg') }}" alt="Jasa Pembuatan Website" class="service-image">
                <div class="service-info">
                    <h3 class="service-title">Pengembangan Website</h3>
                    <p class="service-desc">
                        Jasa pembuatan website profesional yang responsif dan SEO friendly untuk meningkatkan kredibilitas bisnis Anda.
                    </p>
                    <a href="#" class="btn-detail">Selengkapnya &rarr;</a>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="service-card">
                <img src="{{ asset('images/jasa2.png') }}" alt="Digital Marketing" class="service-image">
                <div class="service-info">
                    <h3 class="service-title">Digital Marketing</h3>
                    <p class="service-desc">
                        Strategi pemasaran digital yang efektif untuk menjangkau lebih banyak pelanggan dan meningkatkan konversi.
                    </p>
                    <a href="#" class="btn-detail">Selengkapnya &rarr;</a>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="service-card">
                <img src="{{ asset('images/jasa3.jpg') }}" alt="Desain Grafis" class="service-image">
                <div class="service-info">
                    <h3 class="service-title">Desain Grafis Kreatif</h3>
                    <p class="service-desc">
                        Visualisasi brand yang menarik dan profesional untuk memperkuat identitas bisnis Anda di pasar.
                    </p>
                    <a href="#" class="btn-detail">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </section>
@endsection