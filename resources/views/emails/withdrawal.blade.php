<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background:#eee;">
    <div style="max-width:700px; margin:auto; background:#fff; display:block; width:100%;">
        <div style="background-color:#000; padding:30px 0; text-align:center;">
            <img src="https://aelince.com/images/logo.png">
        </div>
        <div style="padding:30px;">
            <p>Withdrawal Successful</p>
            <p>You’ve successfully withdrawn {{$amount}} {{$symbol}} from your account.</p>
            <p><b>Withdrawal Address :</b> {{$address}}</p>
            <p><b>Transaction ID :</b> {{$txId}}</p>
            <p>Kindly note: Please be aware of phishing sites and always make sure you are visiting the official Aelince.com website when entering sensitive data.</p>
            <p>&copy; 2023 Aelince.com, All Rights Reserved.</p>
        </div>
    </div>
</body>

</html>