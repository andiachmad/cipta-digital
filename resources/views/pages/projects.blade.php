@extends('layouts.app')

@section('title', 'Our Projects - Cipta Digital')

@section('content')
<div class="bg-light py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h1 class="fw-bold display-5">Our Portfolio</h1>
            <p class="lead text-muted">A collection of our finest work across various industries.</p>
        </div>

        <div class="row g-4">
            <!-- Project 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm transition hover-up">
                    <img src="{{ asset('images/projects/fintech_dashboard.png') }}" class="card-img-top" alt="FinTech Dashboard">
                    <div class="card-body p-4">
                        <span class="badge bg-primary mb-2">Web Application</span>
                        <h4 class="card-title fw-bold mb-2">FinTech Dashboard</h4>
                        <p class="card-text text-muted mb-4">A comprehensive dashboard for monitoring financial transactions and analytics in real-time.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm stretched-link">View Case Study</a>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm transition hover-up">
                    <img src="{{ asset('images/projects/healthtrack_pro.png') }}" class="card-img-top" alt="HealthTrack Pro">
                    <div class="card-body p-4">
                        <span class="badge bg-purple text-white mb-2" style="background-color: #6f42c1;">Mobile App</span>
                        <h4 class="card-title fw-bold mb-2">HealthTrack Pro</h4>
                        <p class="card-text text-muted mb-4">An iOS and Android application for tracking daily fitness activities and meal plans.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm stretched-link">View Case Study</a>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm transition hover-up">
                    <img src="{{ asset('images/projects/shoporganic.png') }}" class="card-img-top" alt="ShopOrganic">
                    <div class="card-body p-4">
                        <span class="badge bg-success mb-2">E-Commerce</span>
                        <h4 class="card-title fw-bold mb-2">ShopOrganic</h4>
                        <p class="card-text text-muted mb-4">A custom e-commerce platform for organic food delivery with integrated payment gateway.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm stretched-link">View Case Study</a>
                    </div>
                </div>
            </div>
             <!-- Project 4 -->
             <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm transition hover-up">
                    <img src="{{ asset('images/projects/travel_agency.png') }}" class="card-img-top" alt="Travel Agency Rebrand">
                    <div class="card-body p-4">
                        <span class="badge bg-info text-dark mb-2">UI/UX Design</span>
                        <h4 class="card-title fw-bold mb-2">Travel Agency Rebrand</h4>
                        <p class="card-text text-muted mb-4">Complete brand identity and website redesign for a leading travel agency.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm stretched-link">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-5">Start Your Project With Us</a>
        </div>
    </div>
</div>

<style>
    .hover-up {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-up:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
</style>
@endsection
