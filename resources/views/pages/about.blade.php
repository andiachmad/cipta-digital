@extends('layouts.app')

@section('title', 'About Us - Cipta Digital')

@section('content')
<!-- Header -->
<div class="bg-dark text-white py-5 position-relative overflow-hidden">
    <div class="container position-relative z-index-1 text-center py-5">
        <h1 class="display-4 fw-bold mb-3">About Cipta Digital</h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">We are a team of passionate developers, designers, and strategists driven by a single purpose: to build digital products that matter.</p>
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at center, #1e56a0 0%, #0b1c3c 100%); opacity: 0.8;"></div>
</div>

<!-- Story & Mission -->
<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-4 shadow-lg" alt="Our Team">
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h5 class="text-primary fw-bold text-uppercase ls-1">Our Story</h5>
                <h2 class="display-6 fw-bold mb-4">Innovating for the Future</h2>
                <p class="text-muted mb-4 lead fs-6">Founded in 2020, Cipta Digital began with a simple idea: that technology should be accessible, robust, and beautiful. What started as a small freelance group has grown into a full-scale agency serving clients worldwide.</p>
                <p class="text-muted mb-4">Our mission is to empower businesses with technology that not only solves problems but creates new opportunities.</p>
                <div class="row text-center mt-5">
                    <div class="col-4">
                        <h2 class="fw-bold text-dark display-5">50+</h2>
                        <small class="text-uppercase text-muted fw-bold ls-1">Projects</small>
                    </div>
                    <div class="col-4 border-start border-end">
                        <h2 class="fw-bold text-dark display-5">30+</h2>
                        <small class="text-uppercase text-muted fw-bold ls-1">Clients</small>
                    </div>
                    <div class="col-4">
                        <h2 class="fw-bold text-dark display-5">5+</h2>
                        <small class="text-uppercase text-muted fw-bold ls-1">Years</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<div class="bg-light py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Core Values</h2>
        </div>
        <div class="row g-4">
             <div class="col-md-4 text-center">
                 <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                     <i class="fas fa-lightbulb fa-3x text-warning mb-4"></i>
                     <h4 class="fw-bold mb-3">Innovation</h4>
                     <p class="text-muted">We don't just follow trends; we set them. We constantly explore new technologies to give you the edge.</p>
                 </div>
             </div>
             <div class="col-md-4 text-center">
                 <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                     <i class="fas fa-shield-alt fa-3x text-primary mb-4"></i>
                     <h4 class="fw-bold mb-3">Integrity</h4>
                     <p class="text-muted">Trust is our currency. We believe in transparent communication and delivering on our promises.</p>
                 </div>
             </div>
             <div class="col-md-4 text-center">
                 <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                     <i class="fas fa-rocket fa-3x text-danger mb-4"></i>
                     <h4 class="fw-bold mb-3">Excellence</h4>
                     <p class="text-muted">Good enough isn't for us. We strive for pixel-perfect designs and bug-free code.</p>
                 </div>
             </div>
        </div>
    </div>
</div>
@endsection
