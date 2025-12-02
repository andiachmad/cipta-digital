@extends('layouts.app')

@section('title', 'Your Shopping Cart')

@push('styles')
<style>
    :root {
        --primary: #2563eb;
        --secondary: #64748b;
        --success: #10b981;
        --danger: #ef4444;
        --bg-light: #f8fafc;
        --text-dark: #1e293b;
        --text-light: #64748b;
        --border: #e2e8f0;
    }

    .cart-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: 'Poppins', sans-serif;
    }

    .page-header {
        margin-bottom: 40px;
        text-align: center;
    }
    .page-header h1 {
        font-size: 2.5rem;
        color: var(--text-dark);
        margin-bottom: 10px;
        font-weight: 700;
    }
    .page-header p {
        color: var(--text-light);
        font-size: 1.1rem;
    }

    /* Card Style */
    .card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        overflow: hidden;
        margin-bottom: 30px;
        border: 1px solid var(--border);
    }

    .card-header {
        padding: 20px 30px;
        background: #fff;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .card-header h2 {
        font-size: 1.25rem;
        color: var(--text-dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Table Styles */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }
    .custom-table th {
        background: var(--bg-light);
        padding: 15px 30px;
        text-align: left;
        font-weight: 600;
        color: var(--text-light);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .custom-table td {
        padding: 20px 30px;
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
        color: var(--text-dark);
    }
    .custom-table tr:last-child td {
        border-bottom: none;
    }

    /* Product Column */
    .product-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .product-thumb {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        object-fit: cover;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .product-details h4 {
        margin: 0 0 5px 0;
        font-size: 1rem;
        color: var(--text-dark);
    }
    .product-details p {
        margin: 0;
        font-size: 0.85rem;
        color: var(--text-light);
    }

    /* Actions & Buttons */
    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s;
        cursor: pointer;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
        text-decoration: none;
    }
    .btn-sm { padding: 8px 16px; font-size: 0.85rem; }
    
    .btn-primary { background: var(--primary); color: white; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-1px); }
    
    .btn-danger { background: #fee2e2; color: var(--danger); }
    .btn-danger:hover { background: #fecaca; }
    
    .btn-success { background: var(--success); color: white; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); }
    .btn-success:hover { background: #059669; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(16, 185, 129, 0.3); }

    .btn-outline { border: 2px solid var(--border); background: transparent; color: var(--text-dark); }
    .btn-outline:hover { border-color: var(--text-dark); background: var(--text-dark); color: white; }

    /* Summary Section */
    .cart-footer {
        padding: 30px;
        background: var(--bg-light);
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }
    .total-section {
        text-align: right;
    }
    .total-label {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    .total-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
    }

    /* Status Badges */
    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .status-pending { background: #fff7ed; color: #ea580c; border: 1px solid #ffedd5; }
    .status-approved { background: #f0fdf4; color: #16a34a; border: 1px solid #dcfce7; }
    .status-rejected { background: #fef2f2; color: #dc2626; border: 1px solid #fee2e2; }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    .empty-icon {
        font-size: 4rem;
        color: var(--border);
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .cart-footer { flex-direction: column; text-align: center; }
        .total-section { text-align: center; width: 100%; margin-bottom: 20px; }
        .product-info { flex-direction: column; text-align: center; }
        .custom-table th, .custom-table td { padding: 15px; }
    }
</style>
@endpush

@section('content')
<div class="cart-container">
    <div class="page-header">
        <h1>Shopping Cart</h1>
        <p>Manage your digital service requests</p>
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fecaca;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <!-- Active Cart Section -->
    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-shopping-cart" style="color: var(--primary)"></i> Active Items</h2>
            <span class="badge" style="background: var(--bg-light); color: var(--text-light)">{{ $carts->count() }} Items</span>
        </div>

        @if($carts->isEmpty())
            <div class="empty-state">
                <i class="fas fa-shopping-basket empty-icon"></i>
                <h3>Your cart is empty</h3>
                <p style="color: var(--text-light); margin-bottom: 20px;">Looks like you haven't added any services yet.</p>
                <a href="{{ route('homepage.products') }}" class="btn btn-primary">
                    Browse Services <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th width="40%">Service</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach($carts as $cart)
                            @php 
                                $subtotal = $cart->product->harga * $cart->jumlah;
                                $grandTotal += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    <div class="product-info">
                                        @if($cart->product->photo)
                                            <img src="{{ asset($cart->product->photo) }}" alt="{{ $cart->product->nama }}" class="product-thumb">
                                        @else
                                            <div class="product-thumb" style="background: #eee; display: flex; align-items: center; justify-content: center; color: #999;">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                        <div class="product-details">
                                            <h4>{{ $cart->product->nama }}</h4>
                                            <p>{{ Str::limit($cart->product->deskripsi, 50) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Rp {{ number_format($cart->product->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span style="background: var(--bg-light); padding: 5px 12px; border-radius: 6px; font-weight: 600;">
                                        {{ $cart->jumlah }}
                                    </span>
                                </td>
                                <td style="font-weight: 600; color: var(--primary);">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </td>
                                <td>
                                    <form action="{{ route('cart.destroy', $cart->cart_id) }}" method="POST" onsubmit="return confirm('Remove this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-footer">
                <a href="{{ route('homepage.products') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
                
                <div style="display: flex; align-items: center; gap: 30px; flex-wrap: wrap; justify-content: center;">
                    <div class="total-section">
                        <div class="total-label">Total Amount</div>
                        <div class="total-value">Rp {{ number_format($grandTotal, 0, ',', '.') }}</div>
                    </div>
                    
                    <form action="{{ route('cart.submit') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success" style="padding: 12px 30px; font-size: 1.1rem;">
                            Submit Order <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <!-- Order History Section -->
    @if(isset($orders) && $orders->count() > 0)
        <div class="card" style="margin-top: 50px;">
            <div class="card-header">
                <h2><i class="fas fa-history" style="color: var(--secondary)"></i> Request History</h2>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date Submitted</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><span style="font-family: monospace; color: var(--text-light);">#{{ $order->order_id }}</span></td>
                                <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                <td style="font-weight: 600;">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                <td>
                                    @php $status = strtolower($order->status ?? 'pending'); @endphp
                                    <span class="badge status-{{ $status }}">
                                        @if($status == 'approved') <i class="fas fa-check-circle"></i>
                                        @elseif($status == 'rejected') <i class="fas fa-times-circle"></i>
                                        @else <i class="fas fa-clock"></i>
                                        @endif
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-outline btn-sm" style="border: 1px solid #ddd; color: #666;">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection