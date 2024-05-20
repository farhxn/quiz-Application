<!-- resources/views/error.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
</head>
<body>
    <div class="error-container">
        <h1>No Questions Available</h1>
        <p>Sorry, but we couldn't find any questions to display.</p>
        <a href="{{ route('UserLogin') }}">Go back to Home</a>
    </div>
</body>
</html>
