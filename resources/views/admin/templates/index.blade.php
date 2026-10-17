@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold" style="color: #1B2A4A;">Admin: Template Management</h3>
            <p class="text-muted small mb-0">Manage system wedding invitation templates and configurations.</p>
        </div>
        <a href="{{ route('admin.templates.create') }}" class="btn btn-gold">+ Add New Template</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Preview</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Default Accent</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($templates as $template)
                        <tr>
                            <td class="ps-4">
                                <img src="{{ asset('storage/' . $template->preview_image) }}" alt="{{ $template->title }}" class="rounded border" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td class="fw-bold text-dark">{{ $template->title }}</td>
                            <td><span class="badge bg-secondary">{{ $template->category }}</span></td>
                            <td>
                                <span class="d-inline-block rounded-circle border me-1" style="width: 16px; height: 16px; background-color: {{ $template->default_color }};"></span>
                                {{ $template->default_color }}
                            </td>
                            <td>
                                @if($template->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Disabled</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.templates.edit', $template->id) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                                <form action="{{ route('admin.templates.destroy', $template->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this template?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No templates found in database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">
            {{ $templates->links() }}
        </div>
    </div>
</div>
@endsection