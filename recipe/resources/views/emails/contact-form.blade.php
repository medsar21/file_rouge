<!DOCTYPE html>
<html>

<head>
    <title>Contact Form Submission</title>
</head>

<body>
    <h2>New Contact Form Submission</h2>
    <p>Name: {{ $formData['name'] }}</p>
    <p>Email: {{ $formData['email'] }}</p>
    <p>Message: {{ $formData['message'] }}</p>
</body>

</html>
