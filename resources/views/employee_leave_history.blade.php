@extends('layouts.employee')

@section('body')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Your Leave History</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
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
                                    <td>{{ $application->leave_from }}</td>
                                    <td>{{ $application->leave_to }}</td>
                                    <td>{{ $application->reason }}</td>
                                    <td>
                                        <span class="
                                                        @if ($application->status === 'approved') text-success
                                                        @elseif ($application->status === 'rejected') text-danger
                                                        @elseif ($application->status === 'pending') text-warning
                                                        @endif
                                                    ">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
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