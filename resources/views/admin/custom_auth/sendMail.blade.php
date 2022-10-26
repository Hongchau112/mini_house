
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('dashlite/./images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Email Templates | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('dashlite/./assets/css/dashlite.css?ver=2.5.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('dashlite/./assets/css/theme.css?ver=2.5.0')}}">
    <link rel="stylesheet" href="{{asset('dashlite/./assets/css/style-email.css')}}">
</head>
<body>
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <h4 class="title text-soft mb-4 overline-title">Thông báo - Đổi mật khẩu</h4>
            <table class="email-wraper">
                <tr>
                    <td class="py-5">
                        <table class="email-header">
                            <tbody>
                            <tr>
                                <td class="text-center pb-4">
                                    <a href="#"><img class="email-logo" src="./images/logo-dark2x.png" alt="logo"></a>
                                    <p class="email-title">Conceptual Base Modern Dashboard Theme</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="email-body">
                            <tbody>
                            <tr>
                                <td class="p-3 p-sm-5">
                                    <p><strong>Hello User</strong>,</p>
                                    <p>Let's face it, sometimes you have a simple message that doesn’t need much design—but still needs flexibility and reliability. Select a basic email template. Write your message. Then send with confidence.</p>
                                    <p>Its clean, minimal and pre-designed email template that is suitable for multiple purposes email template.</p>
                                    <p>Hope you'll enjoy the experience, we're here if you have any questions, drop us a line at info@yourwebsite.com anytime. </p>
                                    <p class="mt-4">---- <br> Regards<br>Abu Bin Ishtiyak</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="email-footer">
                            <tbody>
                            <tr>
                                <td class="text-center pt-4">
                                    <p class="email-copyright-text">Copyright © 2020 DashLite. All rights reserved. <br> Template Made By <a href="https://themeforest.net/user/softnio/portfolio">Softnio</a>.</p>
                                    <ul class="email-social">
                                        <li><a href="#"><img src="{{asset('dashlite/./images/socials/facebook.png')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('dashlite/./images/socials/instagram.png')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('dashlite/./images/socials/google.png')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('dashlite/./images/socials/medium.png')}}" alt=""></a></li>
                                    </ul>
                                    <p class="fs-12px pt-4">Để đặt lại mật khẩu của bạn, vui lòng nhấp vào <a href="{{ route('admins.show_resetPassword', $token) }}">Đổi mật khẩu</a></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div><!-- .nk-block -->
<script src="{{asset('dashlite/./assets/js/bundle.js?ver=2.5.0')}}"></script>
<script src="{{asset('dashlite/./assets/js/scripts.js?ver=2.5.0')}}"></script>
</body>
