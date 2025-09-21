<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-12">
        <h2>Users List</h2>
        <a href="{{ route(session('user_role') . '.user.create') }}" class="btn btn-primary mb-3">Add User</a>
        <a href="{{ route(session('user_role') . '.dashboard') }}" class="btn btn-secondary mb-3 float-right">Go to Dashboard</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($users) && count($users) > 0)
                    @foreach ($users as $value)
                        <tr>
                            <!-- <td>{{ $value->id }}</td> -->
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->userRole->role_name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">No Users Found</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    {{ $users->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <!-- Link to Bootstrap JS (optional, but good practice for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>