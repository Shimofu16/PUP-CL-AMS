@extends('AMS.frontend.layouts.master')

@section('page-title', 'Login')

@section('contents')
    <form action="{{ route('login.store') }}" method="post" class="text-start">
        <div class="card-body pt-1">
            @csrf
            @method('POST')
            <div class="row mb-2">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="email" class="form-label fw-bold">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="password" class="form-label fw-bold">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex flex-column mb-3">
            <button type="submit" class="btn btn-maroon mb-1">Signin</button>
            <a href="{{ route('home.index') }}" id="back" class="btn btn-outline-maroon text-maroon">
                Back
            </a>
        </div>
    </form>
@endsection
