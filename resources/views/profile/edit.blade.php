@extends($layout)

@section('body')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Profile Information</h3>
                </div>
                <div class="card-body">
                    <h5>Name: {{ Auth::user()->name }}</h5>
                    <h5>Email: {{ Auth::user()->email }}</h5>
                    <a href="{{ route("password_update") }}" class="btn btn-success">Update Password</a>

                    <a href="{{ route("profile_update") }}" class="btn btn-success">Update Profile</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection