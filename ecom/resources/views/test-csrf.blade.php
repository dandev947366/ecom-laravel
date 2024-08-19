<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form action="/test-csrf" method="POST">
        {{-- @csrf --}}
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <button type="submit">Test CSRF</button>
    </form>
</body>
</html>
