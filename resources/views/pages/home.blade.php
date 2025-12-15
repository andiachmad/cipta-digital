@extends('layouts.app')

@section('title', 'Cipta Digital - Home')

@section('content')
<!-- Hero Section -->
<section class="hero-section d-flex align-items-center position-relative" style="background: linear-gradient(135deg, #0b1c3c 0%, #1e56a0 100%); min-height: 80vh; overflow: hidden;">
    <div class="container position-relative z-index-1">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white" data-aos="fade-right">
                <h1 class="display-3 fw-bold mb-4">Transforming Ideas into <span class="text-info">Digital Reality</span></h1>
                <p class="lead mb-5 text-white">We are a premium software development agency specializing in building robust websites, mobile apps, and scalable digital solutions.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary btn-lg px-4">View Our Work</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4">Contact Us</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block position-relative" data-aos="fade-left">
                 <!-- You can replace this with a hero image/illustration -->
                 <img src="{{ asset('images/hero-illustration-v2.png') }}" alt="Software Development" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
    
    <!-- Abstract Background Shapes -->
    <div class="position-absolute top-0 end-0 bg-white opacity-10 rounded-circle" style="width: 300px; height: 300px; filter: blur(80px); transform: translate(30%, -30%);"></div>
    <div class="position-absolute bottom-0 start-0 bg-info opacity-10 rounded-circle" style="width: 400px; height: 400px; filter: blur(100px); transform: translate(-30%, 30%);"></div>
</section>

<!-- Services Details -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold text-uppercase ls-1">Our Expertise</h6>
            <h2 class="display-5 fw-bold">Comprehensive Digital Services</h2>
            <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #0d6efd;"></div>
        </div>
        
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-up transition">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-primary-soft text-primary rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: rgba(13, 110, 253, 0.1);">
                            <i class="fas fa-laptop-code fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Web Development</h4>
                        <p class="card-text text-muted">Custom websites built with modern technologies like Laravel, React, and Vue to ensure speed, security, and scalability.</p>
                    </div>
                </div>
            </div>
            
            <!-- Service 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-up transition">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-purple-soft text-purple rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                            <i class="fas fa-mobile-alt fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Mobile Apps</h4>
                        <p class="card-text text-muted">Native and cross-platform mobile applications for iOS and Android that provide seamless user experiences.</p>
                    </div>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-up transition">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-success-soft text-success rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: rgba(25, 135, 84, 0.1);">
                            <i class="fas fa-paint-brush fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">UI/UX Design</h4>
                        <p class="card-text text-muted">User-centric design that beautifies your brand while ensuring intuitive navigation and interaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card bg-primary text-white border-0 shadow-lg overflow-hidden rounded-4">
                    <div class="card-body p-5 text-center position-relative">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'); opacity: 0.1;"></div>
                        <h2 class="fw-bold mb-3 display-6 position-relative">Ready to start your digital journey?</h2>
                        <p class="lead mb-4 position-relative opacity-75">Let's discuss how we can bring your vision to life.</p>
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5 fw-bold position-relative text-primary">Get a Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-up {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-up:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
</style>
@endsection
