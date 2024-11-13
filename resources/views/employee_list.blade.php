<!-- resources/views/employee/partials/employee_list.blade.php -->
@foreach ($employees as $employee)
    <tr class="employee-item">
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->role }}</td>
        <td>{{ $employee->total_leave - ($employee->sick_leave + $employee->casual_leave) }}</td>
        <td>
            <a href="{{ route('employee_update', ['id' => $employee->id]) }}" class="btn btn-success">
                <i class="fas fa-edit"></i> <!-- Update Icon -->
            </a>
            <a href="#" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
            </a>
        </td>
    </tr>
@endforeach