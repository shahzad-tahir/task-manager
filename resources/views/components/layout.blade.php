<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Task manager app">
    <meta name="author" content="Shahzad Tahir">
    <title>{{ $title ?? 'Task Manager' }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/jumbotron/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="theme-color" content="#712cf9">
</head>
<body>
<main>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">Task Manager</span>
            </a>
        </header>

        {{ $slot }}
    </div>
</main>
</body>
</html>

