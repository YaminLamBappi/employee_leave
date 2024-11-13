@extends('layouts.admin')

@section('body')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Update Employee Information</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input id="name" class="form-control" type="text" name="name"
                                value="{{ old('name', $user->name) }}" autofocus autocomplete="name" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" class="form-control" type="email" name="email"
                                value="{{ old('email', $user->email) }}" autocomplete="username" />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="role">Role</label>
                            <select id="role" class="form-control" name="role">
                                <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>
                                    Employee</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sick_leave">Sick Leave</label>
                            <x-text-input id="sick_leave" class="form-control" type="number" name="sick_leave"
                                value="{{ old('sick_leave', $user->sick_leave) }}" />
                            @error('sick_leave')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="casual_leave">Casual Leave</label>
                            <x-text-input id="casual_leave" class="form-control" type="number" name="casual_leave"
                                value="{{ old('casual_leave', $user->casual_leave) }}" autocomplete="new-password" />
                            @error('casual_leave')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <x-text-input id="password" class="form-control" type="password" name="password"
                                autocomplete="new-password" />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <x-text-input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" autocomplete="new-password" />
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>@endsection