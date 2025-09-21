<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies List</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h2>Companies List</h2>
        <?php //echo '<pre>';print_r(session()->all());die; ?>
        @if (!in_array(session('userInfo.role_id'), [2,3]))
        <a href="{{ route(session('user_role') . '.companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
        @endif
        <a href="{{ route(session('user_role') . '.dashboard') }}" class="btn btn-secondary mb-3 float-right">Go to
            Dashboard</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <!-- <th>URL</th> -->
                    <th>Status</th>
                    @if (session('userInfo.role_id') !== 1)
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if (isset($companies) && count($companies) > 0)
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <!-- <td>{{ $company->url }}</td> -->
                            <td>{{ ucfirst($company->status) }}</td>
                            @if (session('userInfo.role_id') !== 1)
                            <td><a href="{{ url(session('user_role') . '/generate-url/' . $company->id) }}">Generate URL</a></td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No Companies Found</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    {{ $companies->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <!-- Link to Bootstrap JS (optional, but good practice for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>