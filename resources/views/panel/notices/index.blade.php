@extends('layouts.dashboard')

@section('title', 'Manage Notices')
@section('page-title', 'Manage Notices')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">

    <div class="content-container">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="content-header">
            <h3> Notice Management</h3>
            <div class="search-filter">
                <input type="text" id="search-contents" placeholder="Search Content..." class="form-control">
            </div>
            <a href="{{ route('panel.notices.create') }}" class="create-btn">
                <i class="fas fa-plus"></i> Create New notice
            </a>
        </div>

        <div class="card-body">
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Section</th>
                            <th>Title</th>
                            <th>Tag</th>
                            <th>Files</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notices as $notice)
                            <tr>
                                <td>{{ $notice->id }}</td>
                                <td>{{ Str::limit($notice->title, 50) }}</td>
                                <td>{{ $notice->section }}</td>
                                <td>
                                    @if ($notice->tag)
                                        <span
                                            style="background: #e3f2fd; color: #1a3a8f; padding: 4px 8px; border-radius: 3px; font-size: 12px;">
                                            {{ $notice->tag }}
                                        </span>
                                    @else
                                        <span style="color: #6c757d; font-style: italic;">No tag</span>
                                    @endif
                                </td>
                                {{-- <td>{{ Str::limit($notice->slug, 30) }}</td> --}}
                                <td>
                                    <span style="display: flex; align-items: center; gap: 5px; color: #666;">
                                        <i class="fas fa-image"></i> {{ $notice->notice_files->count() }}
                                    </span>
                                </td>
                                {{-- <td>{{ $notice->created_at->format('M d, Y') }}</td> --}}
                                <td class="action-btns">
                                    <a href="{{ route('panel.notices.edit', $notice->id) }}" class="btn-outline">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('panel.notices.destroy', $notice->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this notice?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                {{-- <td colspan="7" class="no-content">
                                    <div class="empty-state">
                                        <i class="fas fa-file-alt"></i>
                                        <h3>No notice Found</h3>
                                        <p>Get started by creating your first notice piece.</p>
                                        <a href="{{ route('panel.notices.create') }}" class="create-btn">
                                            <i class="fas fa-plus"></i> Create notice
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($notices->hasPages())
                <div class="pagination">
                    {{ $notices->links() }}
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
