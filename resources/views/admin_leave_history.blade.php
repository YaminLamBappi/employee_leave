@extends('layouts.admin')

@section('body')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Leave History</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Leave From</th>
                                <th>Leave To</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Request Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaveApplications as $application)
                                <tr>
                                    <td>{{ $application->user->name }}</td>
                                    <td>{{ $application->leave_from }}</td>
                                    <td>{{ $application->leave_to }}</td>
                                    <td>{{ $application->reason }}</td>
                                    <td>{{ $application->status }}</td>
                                    <td>{{ $application->created_at->format('Y-m-d') }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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