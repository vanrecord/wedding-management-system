@extends('layouts.app')
@section('style')
<style>
    h1, h2 {
        font-family: 'Great Vibes', cursive; /* Fancy heading */
        color: #d6336c;
    }
    h3 {
        font-family: 'Dancing Script', cursive; /* Fancy heading */
    }
    p, label, span {
        font-family: 'Dancing Script', cursive; /* Flowing text */
        font-size: 20px !important;
    }
    .btn {
        font-family: 'Dancing Script', cursive;
    }
</style>
@endsection
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">💍 Our Wedding Day</h1>
        <p class="lead text-muted">We are delighted to invite you to celebrate our special day with love, laughter, and joy.</p>
        <hr class="w-25 mx-auto">
    </div>
    <div class="row align-items-center mb-5">
        <div class="col-md-6 text-center">
            <h5 class="mt-3">👰 Bride's Name</h5>
            <h3 class="mt-3">Leng Davann</h3>
        </div>
        <div class="col-md-6 text-center">
            <h5 class="mt-3">🤵 Groom's Name</h5>
            <h3 class="mt-3">Chan Sovann</h3>
        </div>
    </div>

    <div class="card shadow-lg border-0 rounded-4 mb-5">
        <div class="card-body text-center p-5">
            <h2 class="fw-bold text-success">Wedding Details</h2>
            <p class="text-muted">Join us as we tie the knot on this beautiful day</p>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="fw-bold">📅 Date</h5>
                    <p>Wednesday, January 17, 2024</p>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">🕘 Time</h5>
                    <p>9:00 AM – 5:00 PM</p>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">📍 Venue</h5>
                    <p>S'ang, Kandal</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-5">
        <h2 class="fw-bold text-danger">Countdown to Our Wedding 💖</h2>
        <div id="countdown" class="display-5 fw-bold text-primary"></div>
    </div>
    <div class="text-center">
        <a href="{{ route('userinfo.index') }}" class="btn btn-lg btn-outline-primary shadow">📜 Guest List</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Simple countdown timer
const weddingDate = new Date("Dec 21, 2025 09:00:00").getTime();
const countdown = document.getElementById("countdown");

setInterval(() => {
    const now = new Date().getTime();
    const distance = weddingDate - now;

    if (distance < 0) {
        countdown.innerHTML = "🎉 Just Married! 💕";
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const secs = Math.floor((distance % (1000 * 60)) / 1000);

    countdown.innerHTML = `${days}d ${hours}h ${mins}m ${secs}s`;
}, 1000);
</script>
@endsection
