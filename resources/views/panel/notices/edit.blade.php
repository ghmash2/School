@extends('layouts.dashboard')

@section('title', 'Edit Notice')
@section('page-title', 'Edit Notice')

@section('content')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">

<div class="content-form-container">
    <div class="form-header">

            <h2>Edit Notice</h2>

        <a href="{{ route('panel.notices.index') }}" class="btn">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="form-container">
        <form action="{{ route('panel.notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-row">
                <!-- section Field as Dropdown -->
                <div class="form-group">
                    <label for="section">notice section *</label>
                    <select name="section" id="section" class="form-control" required>
                        <option value="">-- Select notice section --</option>

                        <option value="At a Glance" {{ old('section', $notice->section) == 'At a Glance' ? 'selected' : '' }}>At a Glance</option>
                        <option value="Academic Calender" {{ old('section', $notice->section) == 'Academic Calender' ? 'selected' : '' }}>Academic Calender</option>
                        <option value="Class Routine" {{ old('section', $notice->section) == 'Class Routine' ? 'selected' : '' }}>Class Routine</option>
                        <option value="Syllabus and Booklist" {{ old('section', $notice->section) == 'Syllabus and Booklist' ? 'selected' : '' }}>Syllabus and Booklist</option>
                        <option value="Exam Routine" {{ old('section', $notice->section) == 'Exam Routine' ? 'selected' : '' }}>Exam Routine</option>
                        <option value="Notices" {{ old('section', $notice->section) == 'Notices' ? 'selected' : '' }}>Notices</option>
                        <option value="Student Life" {{ old('section', $notice->section) == 'Student Life' ? 'selected' : '' }}>Student Life</option>
                        <option value="Result" {{ old('section', $notice->section) == 'Result' ? 'selected' : '' }}>Result</option>
                        <option value="Admission Circular" {{ old('section', $notice->section) == 'Admission Circular' ? 'selected' : '' }}>Admission Circular</option>
                        <option value="Prospectus" {{ old('section', $notice->section) == 'Prospectus' ? 'selected' : '' }}>Prospectus</option>
                        <option value="Admission Result" {{ old('section', $notice->section) == 'Admission Result' ? 'selected' : '' }}>Admission Result</option>
                        <option value="Waiting List" {{ old('section', $notice->section) == 'Waiting List' ? 'selected' : '' }}>Waiting List</option>
                        <option value="Courses" {{ old('section', $notice->section) == 'Courses' ? 'selected' : '' }}>Courses</option>
                        <option value="Digital-Class-Six" {{ old('section', $notice->section) == 'Digital-Class-Six' ? 'selected' : '' }}>Digital-Class-Six</option>
                        <option value="Digital-Class-Seven" {{ old('section', $notice->section) == 'Digital-Class-Seven' ? 'selected' : '' }}>Digital-Class-Seven</option>
                        <option value="Digital-Class-Eight" {{ old('section', $notice->section) == 'Digital-Class-Eight' ? 'selected' : '' }}>Digital-Class-Eight</option>
                        <option value="Digital-Class-Nine-Ten" {{ old('section', $notice->section) == 'Digital-Class-Nine-Ten' ? 'selected' : '' }}>Digital-Class-Nine-Ten</option>

                    </select>
                    @error('section')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                  <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $notice->title) }}" placeholder="Title of the notice">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                <!-- Tag Field -->
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag', $notice->tag) }}" placeholder="e.g., News, Event, Announcement">
                    @error('tag')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- <div class="form-row">
                <!-- Slug Field -->
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $notice->slug) }}">
                    @error('slug')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

           <div class="form-row">
                     <!-- Publisher Field -->
                    <div class="form-group">
                        <label for="published_date">Published Date</label>
                        <input type="date" name="published_date" id="published_date" class="form-control"
                            value="{{ old('published_date' , $notice->published_date) }}" placeholder="{{ now()->toDateString() }}">
                        @error('published_date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="published_by">Published Date</label>
                        <input type="text" name="published_by" id="published_by" class="form-control"
                            value="{{ old('published_date' , $notice->published_date) }}">
                        @error('published_by')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- notice Field -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="2"
                        placeholder="Enter the notice details here...">{{ old('description', $notice->description) }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                </div>

            <!-- Current Images -->
            @if($notice->notice_files->count() > 0)
            <div class="form-group">
                <label>Current Files</label>
                <div class="current-images">
                    @foreach($notice->notice_files as $file)
                    <div class="image-item">
                        <file src="{{ Storage::url($file->file) }}" alt="Notice File">
                        <div class="image-info">
                            <span class="image-name">{{ basename($file->file) }}</span>
                            <span class="image-size">File {{ $loop->iteration }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <small class="help-text">Uploading new filees will replace all current files</small>
            </div>
            @endif

            <!-- New Files Field -->
            <div class="form-group">
                <label for="files">Upload New Files</label>
                <div class="file-upload-container">
                    <input type="file" name="files[]" id="files" class="file-input" multiple accept="file/*">
                    <label for="files" class="file-upload-label">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Choose new files (will replace current ones)</span>
                    </label>
                    <div class="file-preview" id="filePreview"></div>
                </div>
                @error('files.*')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="form-group" style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Update notice
                </button>
                <a href="{{ route('panel.notices.index') }}" class="btn-secondary">
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

        // Check if title already exists (excluding current content)
        const titleInput = document.getElementById('section');

        titleInput.addEventListener('blur', function() {
            if (this.value && this.value !== '{{ $notice->section }}') {
                // In a real application, you would make an AJAX request to check if the section exists
                // For now, we'll show a generic message
                const existingTitles = [
                    'About Us', 'Academic Programs', 'Admission Process',
                    'School Facilities', 'Faculty & Staff', 'Student Life'
                ];

                if (existingTitles.includes(this.value)) {
                    alert('This notice section already exists. Please choose a different section.');
                }
            }
        });
    });
</script>
@endsection
