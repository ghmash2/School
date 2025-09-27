@extends('layouts.dashboard')

@section('title', 'Add New Employee')
@section('page-title', 'Add New Employee')

@section('content')
    {{-- <div class="section-header">
    <h2>Add New Teacher</h2>

</div> --}}

    <div class="card" style="max-width: 900px; margin: 0 auto;">
        <div class="card-header">
            <h4>Employee Information</h4>
            <a href="{{ route('panel.staffs.index') }}" class="btn">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('panel.staffs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}"
                            required>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email' ) }}"
                            required>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}"
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
                            value="{{ old('subject' ) }}" required>
                        @error('subject')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="join_date">Join Date *</label>
                        <input type="date" id="join_date" name="join_date" class="form-control"
                            value="{{ old('join_date'   ) }}" required>
                        @error('join_date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="retire_date">Retire Date </label>
                        <input type="date" id="retire_date" name="retire_date" class="form-control"
                            value="{{ old('retire_date' ) }}">
                        {{-- @error('retire_date')
                            <span class="error">{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="designation">Designation *</label>
                        <input type="text" id="designation" name="designation" class="form-control"
                            value="{{ old('designation' )  }}" required>
                        @error('designation')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dept">Department </label>
                        <input type="text" id="dept" name="dept" class="form-control"
                            value="{{ old('dept' ) }}">
                        @error('dept')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Age *</label>
                        <input type="text" id="age" name="age" class="form-control"
                            value="{{ old('age' ) }}" required>
                        @error('age')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row" style="grid-template-columns: 2fr 1fr;">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" value="{{ old('image') }}">
                        @error('image')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Employee
                    </button>
                    <button type="submit" class="btn btn-secondary">
                    <a href="{{ route('panel.staffs.index') }}" style="text-decoration: none;">Cancel</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
