@extends('layouts.app')
@section('title', 'Home')
@section("stylesheet")
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
</style>
@endsection
@section('content')
  <h1>Welcome</h1>
  <p>Click "User Form" in the menu to go to the form.</p>
@endsection