@extends('layouts.dashboard')

@section('title', 'Manage Basic Information')
@section('page-title', 'Manage Basic Information')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Basic Information</h3>
        </div>

        <div class="card-body">
            <div class="table-container">
                <table class="data-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Motto</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Office Time</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <td>{{ $basicInfo->name }}</td>

                            <td>
                                @if ($basicInfo->logo)
                                    <img src="{{ asset('storage/' . $basicInfo->logo) }}" alt="Logo" width="50"
                                        height="50" class="rounded">
                                @else
                                    <span class="text-muted">No Logo</span>
                                @endif
                            </td>

                            <td>{{ $basicInfo->motto }}</td>
                            <td>{{ $basicInfo->email }}</td>
                            <td>{{ $basicInfo->phone }}</td>
                            <td>{{ Str::limit($basicInfo->address, 30) }}</td>
                            <td>{{ $basicInfo->office_time }}</td>

                            <td class="action-btns">
                                <a href="{{ route('panel.basic-infos.edit', $basicInfo->id) }}"
                                    class="btn btn-outline btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @empty($basicInfo)
                            <tr>
                                <td colspan="14" class="text-center text-muted">No basic information available.</td>
                            </tr>
                        @endempty


                    </tbody>
                </table>
            </div>


        </div>
    </div>

@endsection
