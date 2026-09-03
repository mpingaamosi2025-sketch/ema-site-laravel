<x-layouts.admin title="Change Password">
    <div class="panel p-4" style="max-width: 650px;">
        <h3 class="h5 mb-4">Change Password</h3>
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <div class="mb-3"><label class="form-label">Current Password</label><input type="password" class="form-control" name="current_password" required /></div>
            <div class="mb-3"><label class="form-label">New Password</label><input type="password" class="form-control" name="password" required /></div>
            <div class="mb-3"><label class="form-label">Confirm New Password</label><input type="password" class="form-control" name="password_confirmation" required /></div>
            <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">Update password</button></div>
        </form>
    </div>
</x-layouts.admin>
