<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated URLs</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-12">
        <h2>Generated URLs</h2>
        @if (!in_array(session('userInfo.role_id'), [1]))
        <a href="{{ route(session('user_role') . '.companies') }}" class="btn btn-primary mb-3">Generate URL</a>
        @endif
        <a href="{{ route(session('user_role') . '.dashboard') }}" class="btn btn-secondary mb-3 float-right">Go to Dashboard</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>User Name</th>
                    <th>Company</th>
                    <th>Original URL</th>
                    <th>Short URL</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($generated_urls) && count($generated_urls) > 0)
                    @foreach ($generated_urls as $value)
                        <tr>
                            <!-- <td>{{ $value->id }}</td> -->
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->company->name }}</td>
                            <td>{{ $value->original_url }}</td>
                            <td>{{ $value->short_url }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No URLs Found</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    {{ $generated_urls->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <!-- Link to Bootstrap JS (optional, but good practice for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>