<!DOCTYPE html>
<html lang="en">
<head>
    <title>Message Notification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #fff;
            background-image: none;
            font-size: 12px;
            font-family: sans-serif;
        }
        h2 {
            font-size:22px;
            line-height:40px;
            color:#5a5a5a;
        }
        .align-center{
            text-align: center;
        }
        .table th {
            vertical-align: bottom;
            font-weight: bold;
            padding: 8px;
            line-height: 20px;
            text-align: left;
        }
        .table td {
            padding: 8px;
            line-height: 20px;
            text-align: left;
            vertical-align: top;
            border-top: 1px solid #dddddd;
        }
        .font-style{
            font-size:14px;
            line-height:22px;
            color:#5a5a5a;
        }
        .btn-authorize{
            padding:15px 25px;
            background-color: #6958ff;
            color:#ffffff;
            border-radius:3px;
            text-decoration:none;
            margin-top:20px;
        }
    </style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <table align="center" width="798" border="0" cellspacing="0" cellpadding="0">
                <tr><td height="20"></td></tr>
                <tr>
                    <td align="left">
                        <div>
                            <h2>{{ $contactMessage->first_name }} {{ $contactMessage->last_name }} Sent A Message.</h2>
                            <hr>

                            <p class="font-style">
                                <strong>Email: </strong> {{ $contactMessage->email }} <br>
                                <strong>Subject: </strong> {{ $contactMessage->subject }} <br>
                                <strong>Message: </strong> {{ $contactMessage->message }}
                            </p>

                            <div style="padding: 20px 0;">
                                <a href="{{ url('/messages') }}" class="btn-authorize" target="_blank">
                                    See Details
                                </a>
                            </div>

                            <p>
                                <a href="{{ url('/messages/') }}" target="_blank">{{ url('/messages') }}</a>
                            </p>
                            <p>
                                Or copy and paste the link above into your browser.
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
