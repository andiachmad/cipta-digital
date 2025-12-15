@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order #{{ $order->order_id }} Details</h1>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Back to Orders
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <!-- Order Items -->
        <div class="card mb-4 card-dashboard">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold">Items</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->details as $detail)
                        <tr>
                            <td>{{ $detail->product->name ?? 'Product Deleted' }}</td>
                            <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Grand Total</th>
                            <th class="fw-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <!-- Customer & Payment Info -->
        <div class="card card-dashboard mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold">Customer Info</h5>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Name:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $order->user->email ?? '-' }}</p>
                <p class="mb-0"><strong>Ordered:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <!-- Payment Verification -->
        <div class="card card-dashboard">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold">Payment Verification</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted small text-uppercase">Current Status</label>
                    <div>
                        @if($order->status == 'paid')
                            <span class="badge bg-success fs-6">Paid</span>
                        @elseif($order->status == 'pending')
                            <span class="badge bg-warning text-dark fs-6">Pending Payment</span>
                        @elseif($order->status == 'cancelled')
                            <span class="badge bg-danger fs-6">Cancelled</span>
                        @else
                            <span class="badge bg-secondary fs-6">{{ ucfirst($order->status) }}</span>
                        @endif
                    </div>
                </div>

                @if($order->payment_proof)
                    <div class="mb-3">
                        <label class="form-label text-muted small text-uppercase">Payment Proof</label>
                        <a href="{{ asset($order->payment_proof) }}" target="_blank" class="d-block">
                            <img src="{{ asset($order->payment_proof) }}" alt="Proof" class="img-fluid rounded border">
                        </a>
                    </div>
                @else
                   <div class="alert alert-warning py-2 mb-3 small">
                       <i class="fas fa-exclamation-triangle me-1"></i> No payment proof uploaded.
                   </div>
                @endif

                <hr>

                <form action="{{ route('admin.orders.status', $order->order_id) }}" method="POST">
                    @csrf
                    <div class="d-grid gap-2">
                        @if($order->status != 'paid')
                        <button type="submit" name="status" value="paid" class="btn btn-success">
                            <i class="fas fa-check me-1"></i> Verify Payment
                        </button>
                        @endif
                         @if($order->status != 'cancelled')
                        <button type="submit" name="status" value="cancelled" class="btn btn-outline-danger">
                            <i class="fas fa-times me-1"></i> Cancel / Reject
                        </button>
                         @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
