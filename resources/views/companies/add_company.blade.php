<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap List Example</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h2>Add Company</h2>

        {{-- Show validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Add Company Form --}}
        <form action="{{ route(session('user_role').'.companies.add') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Company Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name"
                    class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" name="url" id="url"
                    class="form-control" value="{{ old('url') }}">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('superadmin.companies') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <!-- Link to Bootstrap JS (optional, but good practice for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>