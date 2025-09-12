@extends('layouts.app')
@section('title', "Guest's Name")
@section('stylesheet')
<style>
    .container {
        text-align: center;
    }
    table {
        border-collapse: collapse;
        margin: 0 auto; /* center the table inside container */
    }
    table th, table td {
        border: 1px solid #333;
        padding: 6px 12px;
    }
    .btn-primary {
    background: #78d0f1;   /* light blue */
    color: #111827;        /* dark text for contrast */
    border: 1px solid #60a5fa;
    }

    .btn-primary:hover {
    background: #3b82f6;   /* darker blue on hover */
    color: #fff;
    }

    .btn-secondary {
    background: #e5e7eb;   /* gray */
    color: #111827;
    border: 1px solid #d1d5db;
    }

    .btn-secondary:hover {
    background: #d1d5db;
    }

    .btn-link {
    background: transparent;
    color: #3b82f6;
    border: none;
    padding: 0;
    }

    .btn-link:hover {
    text-decoration: underline;
    }

    button:active,
    .btn-link:active { 
    transform: translateY(1px) scale(0.998); 
    }

    button {
    appearance: none;
    padding: 12px 16px;
    border-radius: 12px;
    cursor: pointer;
    font-weight: 600;
    transition: transform 0.06s ease, filter 0.2s ease, background 0.2s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    }
    .btn-delete{
        color:red;
    }

</style>
@endsection

@section('content')
<div class="container">
    <div style="padding-bottom:15px;">
        @if(auth()->user())
        <button type="button" class="btn-primary"
                onclick="window.location='{{ route('userinfo.create') }}'">
            + Create Guest's Name
        </button>
        @endif
    </div>
    <div class="card-body">
        {{ $dataTable->table() }}
    </div>
</div>
@endsection
@section('script')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection


