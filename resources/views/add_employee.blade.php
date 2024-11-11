@extends('layouts.admin')

@section('body')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Add Employee</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('add_employee') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input id="name" class="form-control" type="text" placeholder="Enter username" name="name"
                                value="{{ old('name') }}" autofocus autocomplete="name" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" class="form-control" type="email" placeholder="Enter email" name="email"
                                value="{{ old('email') }}" autocomplete="username" />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="role">Role</label>
                            <select id="role" name="role">
                                <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee
                                </option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sick_leave">Sick Leave</label>
                            <x-text-input id="sick_leave" class="form-control" type="number"
                                placeholder="Number of days for Sick Leave" name="sick_leave"
                                value="{{ old('sick_leave') }}" />
                            @error('sick_leave')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="casual_leave">Casual Leave</label>
                            <x-text-input id="casual_leave" class="form-control" type="number"
                                placeholder="Number of days for Casual Leave" name="casual_leave"
                                value="{{ old('casual_leave') }}" autocomplete="new-password" />
                            @error('casual_leave')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <x-text-input id="password" class="form-control" type="password"
                                placeholder="Enter password" name="password" autocomplete="new-password" />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <x-text-input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" placeholder="Confirm password"
                                autocomplete="new-password" />
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Register</button>
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