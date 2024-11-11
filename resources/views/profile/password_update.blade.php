@extends($layout)



@section('body')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Profile</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('password_update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation">
                            @error('new_password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection