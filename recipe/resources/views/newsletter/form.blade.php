<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/newsletter.css') }}">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('newsletter.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Newsletter Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Newsletter Message:</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Newsletter</button>
    </form>
</body>

</html>
