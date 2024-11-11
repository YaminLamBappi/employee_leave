@extends('layouts.employee')

@section('body')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Apply for Leave</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('apply_leave') }}" method="post">
                        @csrf <!-- Add CSRF token for form security -->

                        <div class="form-group">
                            <label for="leave_type">Leave Type</label>
                            <select name="leave_type" class="form-control">
                                <option value="sick">Sick</option>
                                <option value="casual">Casual</option>
                            </select>
                            @error('leave_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="leave_from">Leave From</label>
                            <input type="date" name="leave_from" class="form-control">
                            @error('leave_from')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="leave_to">Leave To</label>
                            <input type="date" name="leave_to" class="form-control">
                            @error('leave_to')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea name="reason" class="form-control" rows="3"></textarea>
                            @error('reason')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Leave Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection