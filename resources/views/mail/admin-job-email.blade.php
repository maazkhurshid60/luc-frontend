<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;700&display=swap" rel="stylesheet">
    <title>Email Template</title>
</head>

<body style="margin: 0; padding: 0 20px; font-family: Arial, sans-serif; background-color: #f5f5f5;">

    <!-- Main Wrapper -->
    <div
        style="padding: 48px 75px; max-width: 1080px; background-color: #ffffff; margin: 40px auto; border-radius: 20px; box-shadow: 0px 0px 20px rgba(0,0,0,0.1);">

        <!-- Logo Section -->
        <div style="background-color: #ffffff; border-radius: 20px 20px 0 0; text-align: center;">
            <img src="{{ asset('assets/frontend/icons/email-temp-logo.svg') }}" alt="Company Logo" width="120"
                style="display: inline-block; margin: auto;">
        </div>

        <!-- Title Section -->
        <div style="padding: 30px 0px 0px;">
            <h1 style="font-family: 'Teko', sans-serif; font-size: 24px; color: #333333; font-weight: bold; margin: 0;">
                New Job Application Received
            </h1>
        </div>

        <!-- Body Content -->
        <div style="padding: 20px 0;">
            <p
                style="font-size: 18px; color: #626161; line-height: 1.5; font-family: 'Barlow', sans-serif; font-weight: 500;">
                Hello Admin,
            </p>
            <p
                style="font-size: 18px; color: #626161; line-height: 1.5; font-family: 'Barlow', sans-serif; font-weight: 500;">
                A new application for the job position <strong>{{ $job_title }}</strong> has been submitted. Below
                are the details:
            </p>

            <ul style="font-size: 18px; color: #626161; line-height: 1.5; font-family: 'Barlow', sans-serif;">
                <li><strong>Name:</strong> {{ $name }}</li>
                <li><strong>Email:</strong> {{ $email }}</li>
                <li><strong>Phone Number:</strong> {{ $contact_no }}</li>
                <li><strong>Cover Letter:</strong> {{ $description }}</li>
                <li><strong>Attached CV:</strong> <a href="{{ asset('storage/applications/cvs/' . $file) }}"
                        target="_blank">Download CV</a></li>
            </ul>
        </div>

        <!-- Social Icons -->
        <div style="text-align: center; padding: 30px 0;">
            <a href="https://facebook.com" style="margin: 0 10px; text-decoration: none;">
                <img src="{{ asset('assets/frontend/icons/e_temp-fb.svg') }}" alt="Facebook" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://linkedin.com" style="margin: 0 10px; text-decoration: none;">
                <img src="{{ asset('assets/frontend/icons/e_temp-ln.svg') }}" alt="LinkedIn" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://twitter.com" style="margin: 0 10px; text-decoration: none;">
                <img src="{{ asset('assets/frontend/icons/e_temp-X.svg') }}" alt="Twitter" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://instagram.com" style="margin: 0 10px; text-decoration: none;">
                <img src="{{ asset('assets/frontend/icons/e_temp-in.svg') }}" alt="Instagram" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://youtube.com" style="margin: 0 10px; text-decoration: none;">
                <img src="{{ asset('assets/frontend/icons/e_temp-yt.svg') }}" alt="YouTube" width="32"
                    style="display: inline-block;">
            </a>
        </div>

        <!-- Footer Links -->
        <div style="text-align: center; padding: 30px 0px 0px; border-top: 1px solid #cdcdcd;">
            <a href="#"
                style="font-size: 18px; color: #666666; text-decoration: none; margin: 0 15px;font-family: 'Barlow', sans-serif;">
                Contact Us
            </a>
            <a href="#"
                style="font-size: 18px; color: #666666; text-decoration: none; margin: 0 15px;font-family: 'Barlow', sans-serif;">
                Privacy Policy
            </a>
            <a href="#"
                style="font-size: 18px; color: #666666; text-decoration: none; margin: 0 15px;font-family: 'Barlow', sans-serif;">
                Terms of Use
            </a>
        </div>

    </div>
    <div style="text-align: center; padding: 0px 0px 30px;">
        <p
            style="font-family: 'Barlow';font-style: normal;font-weight: 500;font-size: 18px;line-height: 28px; color: #616161;">
            Copyright © 2024 Afcon Group. All rights reserved.
        </p>
    </div>

</body>

</html>
