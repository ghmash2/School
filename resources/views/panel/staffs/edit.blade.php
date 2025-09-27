@extends('layouts.dashboard')

@section('title', 'Edit Employee')
@section('page-title', 'Edit Employee')

@section('content')
    <div class="section-header">
        <h2>Edit Employee: {{ $staff->name }}</h2>
        <a href="{{ route('panel.staffs.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Employee Information</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('panel.staffs.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $staff->name) }}"
                            required>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $staff->email) }}"
                            required>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone' , $staff->phone) }}"
                            required>
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" class="form-control"
                            value="{{ old('subject' , $staff->subject) }}" required>
                        @error('subject')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="join_date">Join Date *</label>
                        <input type="date" id="join_date" name="join_date" class="form-control"
                            value="{{ old('join_date', $staff->join_date  ) }}" required>
                        @error('join_date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="retire_date">Retire Date </label>
                        <input type="date" id="retire_date" name="retire_date" class="form-control"
                            value="{{ old('retire_date', $staff->retire_date) }}">
                        {{-- @error('retire_date')
                            <span class="error">{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="designation">Designation *</label>
                        <input type="text" id="designation" name="designation" class="form-control"
                            value="{{ old('designation' , $staff->designation) }}" required>
                        @error('designation')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dept">dept </label>
                        <input type="text" id="dept" name="dept" class="form-control"
                            value="{{ old('dept' , $staff->dept) }}">
                        @error('dept')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Age *</label>
                        <input type="text" id="age" name="age" class="form-control"
                            value="{{ old('age' , $staff->age) }}" required>
                        @error('age')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row" style="grid-template-columns: 2fr 1fr;">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="2">{{ old('address' , $staff->address) }}</textarea>
                        @error('address')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" value="{{ old('image' , $staff->image) }}">
                        @error('image')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Employee
                    </button>
                    <a href="{{ route('panel.staffs.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
