<x-layouts.admin title="Profile">
    <div class="panel p-4" style="max-width: 700px;">
        <h3 class="h5 mb-4">Profile</h3>
        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            <div class="mb-3"><label class="form-label">Name</label><input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required /></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required /></div>
            <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">Save profile</button></div>
        </form>
    </div>
</x-layouts.admin>
