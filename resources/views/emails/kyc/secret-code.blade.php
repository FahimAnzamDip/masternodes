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
                            <h2>Hey {{ $customer->user->username }}</h2>
                            <hr>

                            <h2>Your Secret Code: {{ $customer->admin_verify_code }}</h2>

                            <p class="font-style">
                                Now go to KYC verification page. Then click on 3rd step and then submit this code along with a recent selfie of yours. Thank You!
                            </p>

                            <div style="padding: 20px 0;">
                                <a href="{{ url('/user/kyc') }}" class="btn-authorize" target="_blank">
                                    Go to KYC Page
                                </a>
                            </div>

                            <p>
                                <a href="{{ url('/user/kyc') }}" target="_blank">{{ url('/user/kyc') }}</a>
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
