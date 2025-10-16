@extends('layouts.dashboard')

@section('title', 'Edit Info')
@section('page-title', 'Edit Info')

@section('content')
    <div class="section-header">
        <h2>Edit Basic Information: {{ $basicInfo->name }}</h2>
        <a href="{{ route('panel.basic-infos.index') }}" class="btn">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Basic Information</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('panel.basic-infos.update', $basicInfo->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ old('name', $basicInfo->name ?? '') }}" required>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Motto --}}
                    <div class="form-group">
                        <label for="motto">Motto</label>
                        <input type="text" id="motto" name="motto" class="form-control"
                            value="{{ old('motto', $basicInfo->motto ?? '') }}">
                        @error('motto')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Logo --}}
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" id="logo" name="logo" class="form-control">
                        @if (!empty($basicInfo->logo))
                            <small>Current: <a href="{{ asset('storage/' . $basicInfo->logo) }}" target="_blank">View
                                    Logo</a></small>
                        @endif
                        @error('logo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-row">

                    {{-- EIIN --}}
                    <div class="form-group">
                        <label for="eiin">EIIN</label>
                        <input type="text" id="eiin" name="eiin" class="form-control"
                            value="{{ old('eiin', $basicInfo->eiin ?? '') }}">
                        @error('eiin')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Phone --}}
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="tel" id="phone" name="phone" class="form-control"
                            value="{{ old('phone', $basicInfo->phone ?? '') }}" required>
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ old('email', $basicInfo->email ?? '') }}" required>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-row">

                    {{-- Office Time --}}
                    <div class="form-group">
                        <label for="office_time">Office Time</label>
                        <input type="text" id="office_time" name="office_time" class="form-control"
                            value="{{ old('office_time', $basicInfo->office_time ?? '') }}">
                        @error('office_time')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Facebook --}}
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="url" id="facebook" name="facebook" class="form-control"
                            value="{{ old('facebook', $basicInfo->facebook ?? '') }}">
                        @error('facebook')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Twitter --}}
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="url" id="twitter" name="twitter" class="form-control"
                            value="{{ old('twitter', $basicInfo->twitter ?? '') }}">
                        @error('twitter')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    {{-- Google Map --}}
                    <div class="form-group">
                        <label for="google_map">Google Map URL</label>
                        <input type="url" id="google_map" name="google_map" class="form-control"
                            value="{{ old('google_map', $basicInfo->google_map ?? '') }}">
                        @error('google_map')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Instagram --}}
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="url" id="instagram" name="instagram" class="form-control"
                            value="{{ old('instagram', $basicInfo->instagram ?? '') }}">
                        @error('instagram')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- YouTube --}}
                    <div class="form-group">
                        <label for="youtube">YouTube</label>
                        <input type="url" id="youtube" name="youtube" class="form-control"
                            value="{{ old('youtube', $basicInfo->youtube ?? '') }}">
                        @error('youtube')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                     {{-- Address --}}
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="2">{{ old('address', $basicInfo->address ?? '') }}</textarea>
                        @error('address')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Basic Info
                    </button>
                    <a href="{{ route('panel.basic-infos.index') }}" class="btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
