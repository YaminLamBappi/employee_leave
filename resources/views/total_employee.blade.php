@extends('layouts.admin')

@section('body')

<div class="container mt-5 mr-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="margin-right: auto; margin-left: auto;">
                <div class="card-header text-center">
                    <h2>All Employee List</h2>
                </div>
                <div class="card-body">
                    <!-- Search Input -->
                    <div class="form-group">
                        <input type="text" id="employee-search" class="form-control"
                            placeholder="Search for Employee by Name">
                    </div>

                    <!-- Responsive table wrapper -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Remain Leave</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="employee-list">
                                @foreach ($total_employee as $employee)
                                    <tr class="employee-item">
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->role }}</td>
                                        <td>{{ $employee->total_leave - ($employee->sick_leave + $employee->casual_leave) }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success">
                                                <i class="fas fa-edit"></i> <!-- Update Icon -->
                                            </a>
                                            <a href="#" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <div class="pagination pagination-sm">
                                {{ $total_employee->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#employee-search').on('keyup', function () {
            var searchTerm = $(this).val(); // Get the search term

            // Make AJAX request to the server to fetch the filtered employee list
            $.ajax({
                url: '{{ route("employee.search") }}',  // Define the route for the search
                method: 'GET',
                data: { search: searchTerm },
                success: function (data) {
                    $('#employee-list').html(data); // Update the employee list with the filtered data
                }
            });
        });
    });
</script>

@endsection