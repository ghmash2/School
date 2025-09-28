@extends('layouts.dashboard')

@section('title', 'Manage Employees')
@section('page-title', 'Manage Employees')

@section('content')
{{-- <div class="section-header">
    <h2>Manage Teachers</h2>
</div> --}}

<div class="card">
    <div class="card-header">
        <h3>Employee List</h3>
        <div class="search-filter">
            <input type="text" id="search-teachers" placeholder="Search employees..." class="form-control">
        </div>
        <a href="{{ route('panel.staffs.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Employee
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
                    @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td>{{$staff->name }}</td>
                        <td>{{ $staff->subject }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->phone }}</td>
                        {{-- $teacher->join_date->format('Y-m-d') --}}
                        <td>{{ $staff->join_date}}</td>
                        <td class="action-btns">
                            <a href="{{ route('panel.staffs.edit', $staff->id) }}" class="btn btn-outline btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('panel.staffs.destroy', $staff->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">
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
            {{ $staffs->links() }}
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
