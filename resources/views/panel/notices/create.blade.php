@extends('layouts.dashboard')

@section('title', 'Create notice')
@section('page-title', 'Create New notice')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">

    <div class="content-form-container">
        <div class="form-header">
            <h4> Create New notice</h4>
            <a href="{{ route('panel.notices.index') }}" class="btn">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
        <div class="form-container">
            <form action="{{ route('panel.notices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <!-- section Field as Dropdown -->
                    <div class="form-group">
                        <label for="section">Notice section *</label>
                        <select name="section" id="section" class="form-control" required>
                            <option value="">-- Select notice section --</option>
                            <option value="Academic Calendar" {{ old('section') == 'Academic Calender' ? 'selected' : '' }}>Academic Calender </option>
                            <option value="Class Routine" {{ old('section') == 'Class Routine' ? 'selected' : '' }}>
                                Class Routine</option>
                            <option value="Syllabus and Booklist" {{ old('section') == 'Syllabus and Booklist' ? 'selected' : '' }}>
                                Syllabus and Booklist</option>

                            <option value="Exam Routine" {{ old('section') == 'Exam Routine' ? 'selected' : '' }}>
                                Exam Routine</option>
                            <option value="Notices" {{ old('section') == 'Notices' ? 'selected' : '' }}>Notices</option><option value="Student Life" {{ old('section') == 'Student Life' ? 'selected' : '' }}>Student Life
                            </option>
                            <option value="Result" {{ old('section') == 'Result' ? 'selected' : '' }}>Result</option>
                            <option value="Admission Circular" {{ old('section') == 'Admission Circular' ? 'selected' : '' }}>Admission Circular</option>
                            <option value="Prospectus" {{ old('section') == 'Prospectus' ? 'selected' : '' }}>Prospectus</option>
                            <option value="Admission Result" {{ old('section') == 'Admission Result' ? 'selected' : '' }}>Admission Result</option>
                            <option value="Waiting List" {{ old('section') == 'Waiting List' ? 'selected' : '' }}>Waiting List</option>
                            <option value="Courses" {{ old('section') == 'Courses' ? 'selected' : '' }}>Courses</option>
                            <option value="Digital-Class-Six" {{ old('section') == 'Digital-Class-Six' ? 'selected' : '' }}>Digital-Class-Six</option>
                            <option value="Digital-Class-Seven" {{ old('section') == 'Digital-Class-Seven' ? 'selected' : '' }}>Digital-Class-Seven</option>
                            <option value="Digital-Class-Eight" {{ old('section') == 'Digital-Class-Eight' ? 'selected' : '' }}>Digital-Class-Eight</option>
                            <option value="Digital-Class-Nine-Ten" {{ old('section') == 'Digital-Class-Nine-Ten' ? 'selected' : '' }}>Digital-Class-Nine-Ten</option>

                        </select>
                        @error('section')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <small class="help-text">Select from predefined notice sections to maintain consistency</small>
                    </div>
                     <!-- Title Field -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title') }}" placeholder="Title of the notice">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
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
                <div class="form-row">
                     <!-- Publisher Field -->
                    <div class="form-group">
                        <label for="published_date">Published Date</label>
                        <input type="date" name="published_date" id="published_date" class="form-control"
                            value="{{ old('published_date') }}" placeholder="{{ now()->toDateString() }}">
                        @error('published_date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="published_by">Published Date</label>
                        <input type="text" name="published_by" id="published_by" class="form-control"
                            value="{{ auth()->user()->name }}">
                        @error('published_by')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- notice Field -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="2"
                        placeholder="Enter the notice details here...">{{ old('description') }}</textarea>
                    @error('description')
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



                <!-- Files Field -->
                <div class="form-group">
                    <label for="files">Files</label>
                    <div class="file-upload-container">
                        <input type="file" name="files[]" id="files" class="file-input" multiple accept="file/*">
                        <label for="files" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Choose files (multiple allowed)</span>
                        </label>
                        <div class="file-preview" id="filePreview"></div>
                    </div>
                    @error('filees.*')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-group" style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Create notice
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
            const fileInput = document.getElementById('files');
            const filePreview = document.getElementById('filePreview');

            fileInput.addEventListener('change', function() {
                filePreview.innerHTML = '';

                if (this.files.length > 0) {
                    filePreview.classList.add('active');

                    for (let file of this.files) {
                        const reader = new FileReader();
                        const previewItem = document.createElement('div');
                        previewItem.className = 'preview-item';

                        const img = document.createElement('file');
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
            //         //         'This notice title already exists. Please choose a different title or edit the existing notice.');
            //         // }
            //     }
            // });
        });
    </script>
@endsection
