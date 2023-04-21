@extends('AMS.frontend.layouts.master')

@section('page-title','Register')

@section('contents')
    <form action="{{ route('register.store') }}" method="POST" class="text-start">
        <div class="card-body py-1">
            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <label for="student_no" class="form-label fw-bold">Student Number:</label>
                    <input type="text" class="form-control" id="student_no" name="student_no" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="first_name" class="form-label fw-bold">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-6">
                    <label for="last_name" class="form-label fw-bold">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="email" class="form-label fw-bold">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label fw-bold">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="address" class="form-label fw-bold">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="date_of_birth" class="form-label fw-bold">Date of Birth:</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-5">
                    <label for="gender" class="form-label fw-bold">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="section_id" class="form-label fw-bold">Section:</label>
                    <select class="form-control" id="section_id" name="section_id" required>
                        <option value="">Select Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex flex-column mb-3">
            <button type="submit" class="btn btn-maroon mb-1">Register</button>
            <a href="{{ route('home.index') }}" id="back" class="btn btn-outline-maroon text-maroon">
                Back
            </a>
        </div>
    </form>
@endsection
