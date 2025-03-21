<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome Mail</title>
</head>

<body style="font-family: Verdana, Geneva, Tahoma, sans-serif; padding: 20px; background-color: #f4f4f4;">
    <div
        style="max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center;"> Greetings,
            <span style="color: #a31621;">
                {{ $user->name }}
            </span>
        </h1>
        <p style="color: #333; font-size: 16px;">Welcome to our application. We're glad to have you on board!</p>
        <p style="color: #333; font-size: 10px; margin-top: 20px;">Feel free to explore and contact us if you have any
            questions.</p>

        <a href="http://127.0.0.1:8000/login">Click here to login</a>
        <p style="font-weight: bold;">Best regards,</p>
        <p style="color: #a31621; font-size: 14px; font-weight: bold;">Admin</p>
    </div>
</body>

</html>
