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
                    <form method="post" action="{{ route('profile_update') }}">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', auth()->user()->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection