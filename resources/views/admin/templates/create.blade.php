@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold" style="color: #1B2A4A;">Add New Template</h4>
                    <a href="{{ route('admin.templates.index') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
                </div>
                <hr>

                <form action="{{ route('admin.templates.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Template Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g., Golden Garden" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="e.g., Floral, Luxury, Minimalist" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preview Image Upload</label>
                        <input type="file" name="preview_image" class="form-control" accept="image/*" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Default Font</label>
                            <select name="default_font" class="form-select">
                                <option value="'Cinzel Decorative', serif">Cinzel Decorative</option>
                                <option value="'Playfair Display', serif">Playfair Display</option>
                                <option value="'Poppins', sans-serif">Poppins Minimal</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Default Accent Color</label>
                            <input type="color" name="default_color" class="form-control form-control-color w-100" value="#C5A880">
                        </div>
                        <div class="col">
                            <label class="form-label">Default Background</label>
                            <input type="color" name="background_color" class="form-control form-control-color w-100" value="#FAF9F6">
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">
                            Set Template Active (Visible to users)
                        </label>
                    </div>

                    <button type="submit" class="btn btn-gold w-100 py-2">Save Template</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection