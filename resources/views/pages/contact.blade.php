@extends('layouts.app')

@section('title', 'Contact Us - Cipta Digital')

@section('content')
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <!-- Contact Form -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white p-4 text-center">
                    <h3 class="fw-bold mb-0">Get in Touch</h3>
                    <p class="mb-0 opacity-75">Fill out the form below and we'll get back to you shortly.</p>
                </div>
                <div class="card-body p-5">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold small text-uppercase text-muted">Full Name</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0" id="name" placeholder="John Doe" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold small text-uppercase text-muted">Email Address</label>
                            <input type="email" class="form-control form-control-lg bg-light border-0" id="email" placeholder="name@company.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="service" class="form-label fw-bold small text-uppercase text-muted">Service Required</label>
                            <select class="form-select form-select-lg bg-light border-0" id="service" required>
                                <option selected disabled>Select a service...</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Mobile App Development">Mobile App Development</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold small text-uppercase text-muted">Message</label>
                            <textarea class="form-control form-control-lg bg-light border-0" id="message" rows="4" placeholder="Tell us about your project..." required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold py-3 hover-lift">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Contact Info Side -->
        <div class="col-lg-5 ps-lg-5 mt-5 mt-lg-0">
            <h6 class="text-primary fw-bold text-uppercase ls-1 mb-3">Contact Information</h6>
            <h2 class="display-6 fw-bold mb-4">Let's Build Something Amazing.</h2>
            <p class="text-muted mb-5">Have a project in mind? We'd love to hear from you. Our team is ready to answer all your questions.</p>
            
            <div class="d-flex align-items-start mb-4">
                <div class="icon-box bg-light text-primary rounded-circle p-3 me-3">
                    <i class="fas fa-map-marker-alt fa-lg"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Our Office</h5>
                    <p class="text-muted">Jl. Kebon Jeruk Raya No. 27<br>Jakarta Barat 11530, Indonesia</p>
                </div>
            </div>
            
             <div class="d-flex align-items-start mb-4">
                <div class="icon-box bg-light text-primary rounded-circle p-3 me-3">
                    <i class="fas fa-envelope fa-lg"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Email Us</h5>
                    <p class="text-muted">info@ciptadigital.co.id<br>support@ciptadigital.co.id</p>
                </div>
            </div>
            
             <div class="d-flex align-items-start">
                <div class="icon-box bg-light text-primary rounded-circle p-3 me-3">
                    <i class="fas fa-phone fa-lg"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Call Us</h5>
                    <p class="text-muted">(021) 0000-0000<br>0800-0000-0000 (WhatsApp)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
