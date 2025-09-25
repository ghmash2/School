@extends('layouts.dashboard')

@section('title', 'Manage Teachers')
@section('page-title', 'Manage Teachers')

@section('content')
{{-- <div class="section-header">
    <h2>Manage Teachers</h2>

</div> --}}

<div class="card">
    <div class="card-header">
        <h3>Teacher List</h3>
        <div class="search-filter">
            <input type="text" id="search-teachers" placeholder="Search teachers..." class="form-control">
        </div>
        <a href="{{ route('panel.teachers.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Teacher
    </a>
    </div>
    <div class="card-body">
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Join Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->subject }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->join_date->format('Y-m-d') }}</td>
                        <td class="action-btns">
                            <a href="{{ route('panel.teachers.edit', $teacher->id) }}" class="btn btn-outline btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('panel.teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this teacher?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $teachers->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Search functionality
    document.getElementById('search-teachers').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('.data-table tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endpush
