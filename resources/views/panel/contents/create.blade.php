@extends('layouts.dashboard')

@section('title', 'Create Content')
@section('page-title', 'Create New Content')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">

    <div class="content-form-container">
        <div class="form-header">
            <h4> Create New Content</h4>
            <a href="{{ route('panel.contents.index') }}" class="btn">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
        <div class="form-container">
            <form action="{{ route('panel.contents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <!-- Title Field as Dropdown -->
                    <div class="form-group">
                        <label for="title">Content Title *</label>
                        <select name="title" id="title" class="form-control" required>
                            <option value="">-- Select Content Title --</option>
                            <option value="At a Glance" {{ old('title') == 'At a Glance' ? 'selected' : '' }}>At a Glance</option>
                            <option value="History" {{ old('title') == 'History' ? 'selected' : '' }}>
                                History</option>
                            <option value="Why Study at BGAB" {{ old('title') == 'Why Study at BGAB' ? 'selected' : '' }}>
                                Why Study at BGAB</option>
    
                            <option value="Achievements" {{ old('title') == 'Achievements' ? 'selected' : '' }}>
                                Achievements</option>
                            <option value="News & Events" {{ old('title') == 'News & Events' ? 'selected' : '' }}>News & Events</option><option value="Student Life" {{ old('title') == 'Student Life' ? 'selected' : '' }}>Student Life
                            </option>
                            <option value="Sports" {{ old('title') == 'Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Tours" {{ old('title') == 'Tours' ? 'selected' : '' }}>Tours</option>
                            <option value="Scouts" {{ old('title') == 'Scouts' ? 'selected' : '' }}>Scouts</option>
                            <option value="ICT Club" {{ old('title') == 'ICT Club' ? 'selected' : '' }}>ICT Club</option>
                             <option value="Science Club" {{ old('title') == 'Science Club' ? 'selected' : '' }}>Science Club</option>
                              <option value="Cultural Club" {{ old('title') == 'Cultural Club' ? 'selected' : '' }}>Cultural Club</option>
                               <option value="Photography Club" {{ old('title') == 'Photography Club' ? 'selected' : '' }}> Photography Club</option>
                        </select>
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <small class="help-text">Select from predefined content titles to maintain consistency</small>
                    </div>

                    <!-- Tag Field -->
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" name="tag" id="tag" class="form-control"
                            value="{{ old('tag') }}" placeholder="e.g., News, Event, Announcement">
                        @error('tag')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-row">
                <!-- Slug Field -->
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" placeholder="auto-generates-if-empty">
                    <small class="help-text">Leave empty to auto-generate from title</small>
                    @error('slug')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

                <!-- Content Field -->
                <div class="form-group">
                    <label for="content">Content *</label>
                    <textarea name="content" id="content" class="form-control" rows="12" required
                        placeholder="Enter the content details here...">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Images Field -->
                <div class="form-group">
                    <label for="images">Images</label>
                    <div class="file-upload-container">
                        <input type="file" name="images[]" id="images" class="file-input" multiple accept="image/*">
                        <label for="images" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Choose images (multiple allowed)</span>
                        </label>
                        <div class="file-preview" id="filePreview"></div>
                    </div>
                    @error('images.*')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-group" style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Create Content
                    </button>
                    <a href="{{ route('panel.contents.index') }}" class="btn-secondary">
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
                } else {
                    filePreview.classList.remove('active');
                }
            });

            // // Auto-generate slug from title
            // const titleInput = document.getElementById('title');
            // const slugInput = document.getElementById('slug');

            // titleInput.addEventListener('change', function() {
            //     if (!slugInput.value) {
            //         const slug = this.value
            //             .toLowerCase()
            //             .replace(/[^a-z0-9 -]/g, '')
            //             .replace(/\s+/g, '-')
            //             .replace(/-+/g, '-');
            //         slugInput.value = slug;
            //     }
            // });

            // Check if title already exists
            // titleInput.addEventListener('blur', function() {
            //     if (this.value) {
            //         // In a real application, you would make an AJAX request to check if the title exists
            //         // For now, we'll show a generic message
            //         // const existingTitles = [
            //         //     'About Us', 'Academic Programs', 'Admission Process',
            //         //     'School Facilities', 'Faculty & Staff', 'Student Life'
            //         // ];

            //         // if (existingTitles.includes(this.value)) {
            //         //     alert(
            //         //         'This content title already exists. Please choose a different title or edit the existing content.');
            //         // }
            //     }
            // });
        });
    </script>
@endsection
