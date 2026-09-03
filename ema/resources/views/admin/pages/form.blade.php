<x-layouts.admin :title="'Edit ' . $page->name">
    <div class="panel p-4">
        <div class="d-flex justify-content-between align-items-center mb-4"><div><h3 class="h5 mb-1">{{ $page->name }}</h3><p class="text-muted mb-0">Content changes appear on the existing public page without changing its design.</p></div><a href="{{ $page->slug === 'home' ? route('index') : url('/' . $page->slug) }}" class="btn btn-outline-secondary">Preview</a></div>
        <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Page title</label><input class="form-control" name="title" value="{{ old('title', $page->value('title', $page->name)) }}" required></div>
            <div class="mb-3"><label class="form-label">Intro / description</label><textarea class="form-control" name="intro" rows="4">{{ old('intro', $page->value('intro')) }}</textarea></div>
            <div class="mb-3"><label class="form-label">Main content</label><textarea class="form-control" name="body" rows="8">{{ old('body', $page->value('body')) }}</textarea><div class="form-text">Plain text is preserved safely. Use separate paragraphs with blank lines.</div></div>
            <div class="row g-3"><div class="col-md-6"><label class="form-label">Button text</label><input class="form-control" name="button_text" value="{{ old('button_text', $page->value('button_text')) }}"></div><div class="col-md-6"><label class="form-label">Button link</label><input class="form-control" name="button_url" value="{{ old('button_url', $page->value('button_url')) }}"></div></div>
            <div class="mt-3"><label class="form-label">Page image</label><input class="form-control" type="file" name="image" accept="image/jpeg,image/png,image/webp"><div class="form-text">JPG, PNG, or WebP up to 5 MB.</div>@if($page->image_path)<img src="{{ asset('storage/' . $page->image_path) }}" alt="Current page image" class="img-thumbnail mt-2" style="max-width:240px">@endif</div>
            <div class="form-check mt-3"><input class="form-check-input" type="checkbox" name="is_published" value="1" id="published" {{ old('is_published', $page->is_published) ? 'checked' : '' }}><label class="form-check-label" for="published">Publish this page</label></div>
            <div class="d-flex justify-content-between mt-4"><a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">Back to pages</a><button class="btn btn-primary">Save page</button></div>
        </form>
    </div>
</x-layouts.admin>
