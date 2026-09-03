<x-layouts.admin title="Public Pages">
    <div class="panel p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div><h3 class="h5 mb-1">Public Pages</h3><p class="text-muted mb-0">Edit content and images for each public page.</p></div>
            <a href="{{ route('index') }}" class="btn btn-outline-secondary">View website</a>
        </div>
        <div class="list-group list-group-flush">
            @foreach($pages as $page)
                <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                    <div><strong>{{ $page->name }}</strong><div class="small text-muted">/{{ $page->slug }}</div></div>
                    <div class="d-flex align-items-center gap-2"><span class="badge {{ $page->is_published ? 'bg-success' : 'bg-secondary' }}">{{ $page->is_published ? 'Published' : 'Hidden' }}</span><a href="{{ route('admin.pages.visual', $page) }}" class="btn btn-sm btn-primary">Edit visually</a></div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.admin>
