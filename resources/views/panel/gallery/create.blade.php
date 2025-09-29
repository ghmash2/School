@extends('layouts.dashboard')

@section('title', 'Add Gallery Images')
@section('page-title', 'Add Gallery Images')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/imageGallery.css') }}">

    <div class="gallery-form-container">
        <div class="form-header">
                <h4> Add Gallery Images</h4>
            <a href="{{ route('panel.gallery-images.index') }}" class="btn">
                <i class="fas fa-arrow-left"></i> Back to Gallery
            </a>
        </div>

        <div class="form-container">
            <form action="{{ route('panel.gallery-images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <!-- Tag Field -->
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag') }}" placeholder="e.g., Events, Sports, Academic">
                        @error('tag')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <small class="help-text">Optional: Categorize your images with tags</small>
                    </div>

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title">Title Prefix</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="e.g., Sports Day, Annual Function">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <small class="help-text">Images will be named as: Title-1, Title-2, etc.</small>
                    </div>
                    <!-- Description Field -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Brief description of the images">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                </div>

                <!-- Images Field -->
                <div class="form-group">
                    <label for="images">Select Images *</label>
                    <div class="file-upload-container">
                        <input type="file" name="image[]" id="images" class="file-input" multiple accept="image/*" required>
                        <label for="images" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Click to select multiple images</span>
                            {{-- <small class="help-text">Supported formats: JPEG, PNG, JPG, GIF | Max size: 2MB per image</small> --}}
                        </label>
                        <div class="file-preview" id="filePreview"></div>
                    </div>
                    @error('image')
                        <span class="error">{{ $message}}</span>
                    @enderror
                    @error('image.*')
                        <span class="error">{{ $message}}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-group" style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-upload"></i> Upload Images
                    </button>
                    <a href="{{ route('panel.gallery-images.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File preview functionality
            const fileInput = document.getElementById('images');
            const filePreview = document.getElementById('filePreview');

            fileInput.addEventListener('change', function() {
                filePreview.innerHTML = '';

                if (this.files.length > 0) {
                    filePreview.classList.add('active');

                    for (let file of this.files) {
                        const reader = new FileReader();
                        const previewItem = document.createElement('div');
                        previewItem.className = 'preview-item';

                        const img = document.createElement('img');
                        const nameDiv = document.createElement('div');
                        nameDiv.className = 'preview-name';
                        nameDiv.textContent = file.name;

                        previewItem.appendChild(img);
                        previewItem.appendChild(nameDiv);
                        filePreview.appendChild(previewItem);

                        reader.onload = function(e) {
                            img.src = e.target.result;
                        };

                        reader.readAsDataURL(file);
                    }

                    // Update the file upload label
                    const label = document.querySelector('.file-upload-label span');
                    label.textContent = `${this.files.length} image(s) selected`;
                } else {
                    filePreview.classList.remove('active');
                    const label = document.querySelector('.file-upload-label span');
                    label.textContent = 'Click to select multiple images';
                }
            });
        });
    </script>
@endsection
