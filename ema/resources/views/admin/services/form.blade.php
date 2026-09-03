<x-layouts.admin :title="$service->exists ? 'Edit Service' : 'Add Service'">
        <div class="panel p-4" style="max-width: 700px;">
                <h3 class="mb-4">{{ $service->exists ? 'Edit Service' : 'Add Service' }}</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
                    @csrf
                    @if($service->exists)
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $service->title) }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4">{{ old('description', $service->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon Class</label>
                        <input type="text" class="form-control" name="icon" value="{{ old('icon', $service->icon ?: 'bi-briefcase') }}" required />
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Display Order</label>
                            <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="is_active">
                                <option value="1" {{ old('is_active', $service->is_active) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !old('is_active', $service->is_active) ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">{{ $service->exists ? 'Update Service' : 'Create Service' }}</button>
                    </div>
                </form>
        </div>
</x-layouts.admin>
