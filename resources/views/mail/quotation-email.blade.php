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
        style="padding: 48px 75px;  max-width: 1080px; background-color: #ffffff; margin: 40px auto; border-radius: 20px; box-shadow: 0px 0px 20px rgba(0,0,0,0.1);">

        <!-- Logo Section -->
        <div style=" background-color: #ffffff; border-radius: 20px 20px 0 0; text-align: center;">
            <img src="{{ asset('assets/frontend/icons/email-temp-logo.svg') }}" alt="Company Logo" width="120"
                style="display: inline-block; margin: auto; ">
        </div>

        <!-- Title Section -->
        <div style="padding: 30px 0px 0px;">
            <h1 style="font-family: 'Teko', sans-serif; font-size: 24px; color: #333333; font-weight: bold; margin: 0;">
                Confirmation of Your Query
            </h1>
        </div>

        <!-- Body Content -->
        <div style="padding: 0px;">
            <p
                style="font-size: 18px; color: #626161; line-height: 1.5; font-family: 'Barlow', sans-serif; font-weight: 500;">
                Dear [Recipient's Name],<br><br>
                Thank you for reaching out to us! We have received your query and appreciate your interest in [Company
                Name].<br><br>
                Our team is currently reviewing your message and will contact you shortly to provide assistance. If you
                have any urgent questions, please feel free to reply to this email.<br><br>
                Thank you for your patience.<br><br>
                Best regards,<br><br>
                [Your Name]<br>
                [Your Job Title]<br>
                [Company Name]<br>
                [Contact Information]<br>
            </p>
        </div>

        <!-- Social Icons -->
        <div style="text-align: center; padding: 30px 0;">
            <a href="https://facebook.com" style="margin: 0 10px; text-decoration: none;">
                <img src=".{{ asset('assets/frontend/icons/e_temp-fb.svg') }}" alt="Facebook" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://linkedin.com" style="margin: 0 10px; text-decoration: none;">
                <img src=".{{ asset('assets/frontend/icons/e_temp-ln.svg') }}" alt="LinkedIn" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://twitter.com" style="margin: 0 10px; text-decoration: none;">
                <img src=".{{ asset('assets/frontend/icons/e_temp-X.svg') }}" alt="Twitter" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://instagram.com" style="margin: 0 10px; text-decoration: none;">
                <img src=".{{ asset('assets/frontend/icons/e_temp-in.svg') }}" alt="Instagram" width="32"
                    style="display: inline-block;">
            </a>
            <a href="https://youtube.com" style="margin: 0 10px; text-decoration: none;">
                <img src=".{{ asset('assets/frontend/icons/e_temp-yt.svg') }}" alt="YouTube" width="32"
                    style="display: inline-block;">
            </a>
        </div>

        <!-- Footer Links -->
        <div style="text-align: center; padding: 30px 0px 0px; border-top: 1px solid #cdcdcd; ">
            <a href="https://example.com/contact"
                style="font-size: 18px; color: #666666; text-decoration: none; margin: 0 15px;font-family: 'Barlow', sans-serif;">
                Contact Us
            </a>
            <a href="https://example.com/privacy"
                style="font-size: 18px; color: #666666; text-decoration: none; margin: 0 15px;font-family: 'Barlow', sans-serif;">
                Privacy Policy
            </a>
            <a href="https://example.com/terms"
                style="font-size: 18px; color: #666666; text-decoration: none; margin: 0 15px;font-family: 'Barlow', sans-serif;">
                Terms of Use
            </a>
        </div>

    </div>
    <div style="text-align: center; padding: 0px 0px 30px; ">
        <p
            style=" font-family: 'Barlow';font-style: normal;font-weight: 500;font-size: 18px;line-height: 28px; color: #616161;">
            Copyright © 2024 Afcon Group. All rights reserved.
        </p>
    </div>

</body>

</html>
