@extends('layouts.dashboard')

@section('title', 'Edit Teacher')
@section('page-title', 'Edit Teacher')

@section('content')
<div class="section-header">
    <h2>Edit Teacher: {{ $teacher->name }}</h2>
    <a href="{{ route('panel.teachers.index') }}" class="btn btn-outline">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3>Teacher Information</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('panel.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $teacher->name) }}" required>
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $teacher->email) }}" required>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject', $teacher->subject) }}" required>
                    @error('subject')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone', $teacher->phone) }}" required>
                    @error('phone')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="join_date">Join Date *</label>
                    <input type="date" id="join_date" name="join_date" class="form-control" value="{{ old('join_date', $teacher->join_date->format('Y-m-d')) }}" required>
                    @error('join_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                    @if($teacher->photo)
                        <div class="current-photo">
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" width="100">
                        </div>
                    @endif
                    @error('photo')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control" rows="3">{{ old('address', $teacher->address) }}</textarea>
                @error('address')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" class="form-control" rows="5">{{ old('bio', $teacher->bio) }}</textarea>
                @error('bio')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Teacher
                </button>
                <a href="{{ route('panel.teachers.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
