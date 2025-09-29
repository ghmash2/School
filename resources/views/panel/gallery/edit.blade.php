@extends('layouts.dashboard')

@section('title', 'Edit Gallery Image')
@section('page-title', 'Edit Gallery Image')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/imageGallery.css') }}">

    <div class="gallery-form-container">
        <div class="form-header">
                <h3>Edit Gallery Image</h3>
            <a href="{{ route('panel.gallery-images.index') }}" class="btn">
                <i class="fas fa-arrow-left"></i> Back to Gallery
            </a>
        </div>

        <div class="form-container">
            <form action="{{ route('panel.gallery-images.update', $galleryImage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <!-- Tag Field -->
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag', $galleryImage->tag) }}" placeholder="e.g., Events, Sports, Academic">
                        @error('tag')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $galleryImage->title) }}" placeholder="Image title">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Description Field -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Brief description of the image">{{ old('description', $galleryImage->description) }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Current Image -->
                <div class="form-group">
                    <label>Current Image</label>
                    <div class="current-image-container">
                        <img src="{{ Storage::url($galleryImage->image) }}" alt="{{ $galleryImage->title }}" class="current-image">
                        <div class="image-info">
                            {{ basename($galleryImage->image) }}
                        </div>
                    </div>
                </div>

                <!-- New Image Field -->
                <div class="form-group">
                    <label for="image">Replace Image</label>
                    <div class="file-upload-container">
                        <input type="file" name="image" id="image" class="file-input" accept="image/*">
                        <label for="image" class="file-upload-label">
                            <i class="fas fa-sync-alt"></i>
                            <span>Click to replace current image</span>
                            <small class="help-text">Leave empty to keep current image</small>
                        </label>
                        <div class="file-preview" id="filePreview"></div>
                    </div>
                    @error('image')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-group" style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Update Image
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
            const fileInput = document.getElementById('image');
            const filePreview = document.getElementById('filePreview');

            fileInput.addEventListener('change', function() {
                filePreview.innerHTML = '';

                if (this.files.length > 0) {
                    filePreview.classList.add('active');

                    const file = this.files[0];
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

                    // Update the file upload label
                    const label = document.querySelector('.file-upload-label span');
                    label.textContent = 'New image selected';
                } else {
                    filePreview.classList.remove('active');
                    const label = document.querySelector('.file-upload-label span');
                    label.textContent = 'Click to replace current image';
                }
            });
        });
    </script>
@endsection
