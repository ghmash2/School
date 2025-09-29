@extends('layouts.dashboard')

@section('title', 'Image Gallery')
@section('page-title', 'Image Gallery')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/imageGallery.css') }}">

    <div class="gallery-container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="gallery-header">
                <h3> Gallery Management</h3>
                <div class="search-filter">
                <input type="text" id="search-contents" placeholder="Search Images..." class="form-control">
                </div>
            <a href="{{ route('panel.gallery-images.create') }}" class="create-btn">
                <i class="fas fa-plus"></i> Add New Images
            </a>
        </div>

        <div class="gallery-body">
            @if($galleryImages->count() > 0)
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Tag</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleryImages as $image)
                            <tr>
                                <td class="image-preview-cell">
                                    <div class="table-image-container">
                                        <img src="{{ Storage::url($image->image) }}" alt="{{ $image->title }}" class="table-image">
                                    </div>
                                </td>
                                <td class="image-title">
                                    <div class="title-text">{{ $image->title ?? 'Untitled' }}</div>
                                </td>
                                <td class="image-tag">
                                    @if($image->tag)
                                        <span class="tag-badge">{{ $image->tag }}</span>
                                    @else
                                        <span class="no-tag">No tag</span>
                                    @endif
                                </td>
                                <td class="image-description">
                                    @if($image->description)
                                        <div class="description-text">{{ Str::limit($image->description, 80) }}</div>
                                    @else
                                        <span class="no-description">No description</span>
                                    @endif
                                </td>
                                <td class="image-actions">
                                    <div class="action-buttons">
                                        <a href="{{ route('panel.gallery-images.edit', $image->id) }}" class="btn-outline" title="Edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('panel.gallery-images.destroy', $image->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger" onclick="return confirm('Are you sure you want to delete this image?')" title="Delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-images">
                    {{-- <div class="empty-state">
                        <i class="fas fa-images"></i>
                        <h3>No Images Found</h3>
                        <p>Get started by uploading your first gallery image.</p>
                        <a href="{{ route('panel.gallery-images.create') }}" class="create-btn">
                            <i class="fas fa-plus"></i> Upload Images
                        </a>
                    </div> --}}
                </div>
            @endif
        </div>
    </div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('search-contents');
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    const searchValue = this.value.toLowerCase();
                    const rows = document.querySelectorAll('.data-table tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchValue) ? '' : 'none';
                    });
                });
            }
        });
    </script>
@endsection
