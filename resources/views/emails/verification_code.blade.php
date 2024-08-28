<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #333;
            margin: 0;
        }
        .body-content {
            padding: 20px;
            line-height: 1.6;
            color: #666;
        }
        .verification-code {
            display: inline-block;
            font-size: 24px;
            padding: 10px 20px;
            background-color: #f0f0f0;
            color: #333;
            border-radius: 4px;
            margin: 20px 0;
            user-select: none;
        }
        .copy-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            border: none;
            outline: none;
            font-size: 16px;
        }
        .copy-button:hover {
            background-color: #218838;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #aaa;
            padding-top: 20px;
        }
    </style>
</head>
<body>

<div class="email-container">
    <div class="header">
        <h1>Email Verification</h1>
    </div>

    <div class="body-content">
        <p>Hello,</p>
        <p>Thank you for registering! Please use the following verification code to verify your email address:</p>

        <div>
            <span id="verificationCode" class="verification-code">{{ $verificationCode }}</span>
            <button class="copy-button" onclick="copyToClipboard()">Copy</button>
        </div>

        <p>If you didn't request this, please ignore this email.</p>
        <p>Best regards,<br>Your Company Name</p>
    </div>

    <div class="footer">
        &copy; 2024 Your Company Name. All rights reserved.
    </div>
</div>

<script>
    function copyToClipboard() {
        var codeText = document.getElementById("verificationCode").textContent;
        var textarea = document.createElement("textarea");
        textarea.value = codeText;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);

        alert("Verification code copied to clipboard!");
    }
</script>

</body>
</html>
