<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Course/Country Interest:</strong> {{ $data['course_country_interest'] }}</p>
    <p><strong>Enquiry:</strong> {{ $data['enquiry'] }}</p>
</body>
</html>
