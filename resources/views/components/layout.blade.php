<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/dist/output.css" />
    <title>{{$title ?? 'Paygo - Signup'}}</title>
</head>
<body>
{{--<form method="POST" action="/logout">
    @csrf
    <a href="logout">
        <button class="text-blue-500">LOGOUT</button>
    </a>

</form>--}}
{{$slot}}
<x-flash-message />
</body>
</html>
