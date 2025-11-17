<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $details['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 20px;
            font-weight: bold;
            color: #0C4CA3; /* Dark blue color for the title */
        }

        p {
            margin: 10px 0;
            font-size: 14px;
        }

        strong {
            font-weight: bold;
        }

        .italic {
            font-style: italic;
        }
        .highlight {
            background-color: #FFEB3B; /* Highlight background color (yellow) */
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #d01d23; /* Button background color (red) */
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
        }

        .footer {
            font-size: 12px;
            color: #999;
        }

        .email-container {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        .email-container .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-container .highlight-email {
            font-weight: bold;
            color: #0C4CA3; /* Same as title color */
        }

        .underline {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="email-container">
        <h1 style="margin-bottom: 0px;">E-Proposal – Permintaan Pengaturan Ulang Kata Sandi</h1>
        <small class="italic">E-Proposal – Request to Reset Password</small>
        <br>
        <p style="margin-bottom: 0px;">Halo <strong>{{ $details['name'] }}</strong>,</p>
        <small class="italic">Hello <strong>{{ $details['name'] }}</strong>,</small>
        <p style="margin-bottom: 0px;">Kami menerima permintaan pengaturan ulang kata sandi yang dikirimkan ke email berikut:</p>
        <small class="italic">We received a password reset request that is sent to this following email:</small>
        
        <p>
            Email: <strong class="highlight-email">{{ $details['email'] }}</strong>
        </p>
    
        <p style="margin-bottom: 0px;">Untuk mengatur ulang kata sandi, tekan tombol di bawah.</p>
        <small class="italic">Click the button below to reset your password.</small>
        <br>

        <a href="{{ $details['actionUrl'] }}" class="button">
            <span style="color: #ffffff">Atur Ulang Kata Sandi</span>
            <br> 
            <small style="color: #ececec; font-style: italic">Reset Password</small>
        </a>
    
        <p class="footer" style="margin-bottom: 0px;">Jika Anda tidak membuat permintaan ini, silakan hubungi kami di <a href="mailto:timkerpenelitianrspiss@gmail.com">timkerpenelitianrspiss@gmail.com</a>.</p>
        <small class="footer italic">if you did not make this request, please reach us at <a href="mailto:timkerpenelitianrspiss@gmail.com">timkerpenelitianrspiss@gmail.com</a>.</small>
    </div>
    
</body>
</html>
