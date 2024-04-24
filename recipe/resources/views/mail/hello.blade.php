<!DOCTYPE html>
<html>

<head>
    <title>Succesfully subscribed to GDNetwork</title>
</head>

<body>
    <h1>Thank you so much for subscribing to our newsletter!</h1>
    <p>If you wish to unsubscribe, <a
            href="{{ route('unsubscribe', ['email' => $subscriber->email, 'token' => $subscriber->unsubscribe_token]) }}">click
            here!</a></p>
    <p>Email: {{ $subscriber->email }}</p>
    <p>Thank you for subscribing!</p>
</body>

</html>
