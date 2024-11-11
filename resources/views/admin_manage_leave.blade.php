@extends('layouts.admin')

@section('body')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-header text-center">
                <h2>Leave Application</h2>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Leave From</th>
                        <th>Leave To</th>
                        <th>Leave Type</th>
                        <th>Request Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leaveApplications as $application)
                        <tr>
                            <td>{{ $application->user->name }}</td>
                            <td>{{ $application->leave_from }}</td>
                            <td>{{ $application->leave_to }}</td>
                            <td>{{ $application->leave_type }}</td>
                            <td>{{ $application->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('approve_leave', ['id' => $application->id]) }}"
                                    class="btn btn-success">Approve</a>
                                <a href="{{ route('reject_leave', ['id' => $application->id]) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this leave application?')">Reject</a>



                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <h4>No Leave Applications</h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection