@extends('layouts.app')

@section('title', 'Products - Cipta Digital')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
    <!-- Header -->
    <div class="header">Our Product Page</div>

    <!-- Product Section -->
    <section class="product-section">
        <!-- Website Development -->
        <div class="product">
            <img src="{{ asset('images/jasa1.jpg') }}" alt="Website Development">
            <div class="product-content">
                <h4>Website Development</h4>
                <h2>We Provide You The Best Experience</h2>
                <p>
                    You don't have to worry about your online presence — our websites are crafted by professionals
                    with elegant design, premium performance, and the latest technology to elevate your brand.
                </p>
                <a href="#">More Info →</a>
            </div>
        </div>

        <!-- SEO -->
        <div class="product">
            <div class="product-content">
                <h4>Search Engine Optimization</h4>
                <h2>We Provide You The Best Experience</h2>
                <p>
                    We turn your website into a search engine magnet — combining data-driven strategies,
                    keyword precision, and modern SEO techniques to ensure your brand stays visible and relevant.
                </p>
                <a href="#">More Info →</a>
            </div>
            <img src="{{ asset('images/jasa2.png') }}" alt="SEO Services">
        </div>

        <!-- Digital Marketing -->
        <div class="product">
            <img src="{{ asset('images/jasa3.jpg') }}" alt="Digital Marketing">
            <div class="product-content">
                <h4>Digital Marketing</h4>
                <h2>We Provide You The Best Experience</h2>
                <p>
                    We create campaigns that connect — from social media engagement to targeted advertising,
                    our digital marketing services are designed to amplify your brand's presence and drive measurable
                    results.
                </p>
                <a href="#">More Info →</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="section-header">
            <h2 class="section-title">Layanan Unggulan Kami</h2>
            <p class="section-subtitle">Dijamin Aman & Terbaik</p>
        </div>

        <div class="services-grid">
            @foreach($products as $product)
                <div class="service-card">
                    {{-- Image removed for text-focused design --}}
                    <h3 class="service-title">{{ $product->nama }}</h3>
                    <p class="service-desc">{{ Str::limit($product->deskripsi, 100) }}</p>
                    <p class="service-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <input type="hidden" name="jumlah" value="1">
                        <button type="submit" class="btn-order">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Modal Package Selection (tetap di view agar khusus page ini) -->
    <div id="packageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalServiceTitle">Pilih Paket Layanan</h2>
                <p>Pilih paket yang sesuai dengan kebutuhan bisnis Anda</p>
                <span class="close-modal" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div class="package-selection">
                    <div class="package-card" onclick="selectPackage('basic')">
                        <div class="package-name">Basic</div>
                        <div class="package-price">Rp 2.500.000 <small>/paket</small></div>
                        <div class="package-description">Cocok untuk usaha kecil yang baru memulai</div>
                    </div>
                    <div class="package-card" onclick="selectPackage('standard')">
                        <div class="package-name">Standard</div>
                        <div class="package-price">Rp 5.000.000 <small>/paket</small></div>
                        <div class="package-description">Ideal untuk bisnis yang sedang berkembang</div>
                    </div>
                    <div class="package-card" onclick="selectPackage('premium')">
                        <div class="package-name">Premium</div>
                        <div class="package-price">Rp 10.000.000 <small>/paket</small></div>
                        <div class="package-description">Solusi lengkap untuk bisnis enterprise</div>
                    </div>
                </div>

                <div id="basicDetails" class="package-details">
                    <h3>Paket Basic - Fitur yang Didapatkan</h3>
                    <ul class="features-list" id="basicFeatures"></ul>
                </div>

                <div id="standardDetails" class="package-details">
                    <h3>Paket Standard - Fitur yang Didapatkan</h3>
                    <ul class="features-list" id="standardFeatures"></ul>
                </div>

                <div id="premiumDetails" class="package-details">
                    <h3>Paket Premium - Fitur yang Didapatkan</h3>
                    <ul class="features-list" id="premiumFeatures"></ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal btn-cancel" onclick="closeModal()">Batal</button>
                <button class="btn-modal btn-confirm" id="confirmBtn" onclick="confirmOrder()" disabled>Lanjutkan
                    Order</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/product.js') }}"></script>
@endpush