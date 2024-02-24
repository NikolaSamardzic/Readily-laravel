<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Activate Your Account</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif !important;
            font-size: 14px !important;
            line-height: 1.5 !important;
            color: #333 !important;
        }
        h1 {
            font-size: 20px !important;
            font-weight: bold !important;
            margin-top: 0 !important;
            margin-bottom: 20px !important;
        }
        p {
            margin-bottom: 20px !important;
        }
        a {
            color: #fff !important;
            text-decoration: none !important;
        }
        a:hover {
            text-decoration: underline !important;
        }
        .button {
            display: inline-block !important;
            padding: 8px 16px !important;
            background-color: #0066cc !important;
            color: #fff !important;
            border-radius: 4px !important;
            text-decoration: none !important;
        }
        .button:hover {
            background-color: #0052a3 !important;
        }
    </style>
</head>
<body>
<h1>Activate Your Account</h1>
<p>Hi,</p>
<p>Thanks for creating an account with us! Please activate your account by clicking on the following link:</p>
<p><a href="{{route('users.activate',['token'=>$token])}}" class="button">Activate Your Account</a></p>
<p>If you have any questions or concerns, don't hesitate to contact us.</p>
<p>Best regards,<br>Readily</p>
</body>
</html>


