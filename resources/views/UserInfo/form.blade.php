@extends('layouts.app')

@section('title', "Guest's Information")

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg border-0 rounded-4" style="max-width: 500px; width: 100%;">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5"/>
            </svg>
            <h5 class="mb-0">Guest's Information</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('userinfo.store',['id'=>!empty($user_info)?$user_info->id:'']) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name (ឈ្មោះ)</label>
                    <input type="text" value="{{!empty($user_info)?$user_info->name:''}}" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="go_with" class="form-label">Go With (ទៅជាមួយ)</label>
                    <input type="text" value="{{!empty($user_info)?$user_info->go_with:''}}" class="form-control" id="go_with" name="go_with">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address (ទីតាំង)</label>
                    <input type="text" value="{{!empty($user_info)?$user_info->address:''}}" class="form-control" id="address" name="address">
                </div>

                <div class="mb-3">
                    <label for="reil" class="form-label">Reil (រៀល)</label>
                    <input type="text" value="{{!empty($user_info)?$user_info->reil:''}}" class="form-control" id="reil" name="reil">
                </div>

                <div class="mb-3">
                    <label for="usd" class="form-label">USD (ដុល្លា)</label>
                    <input type="text" value="{{!empty($user_info)?$user_info->usd:''}}" class="form-control" id="usd" name="usd">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">
                        Back
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
