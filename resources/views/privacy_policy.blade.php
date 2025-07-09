

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <!--box icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    @extends('home.header')
<div class="container my-5">
    <div class="privacy-policy-card" style="max-width: 700px; margin: 0 auto; background: #fffbe6; border-radius: 18px; box-shadow: 0 4px 24px rgba(255,184,0,0.10); padding: 2.5rem 2rem 2rem 2rem;">
        <div class="text-center mb-4">
            <span class="privacy-icon" style="display: inline-block; background: #ff9f0d; border-radius: 50%; padding: 18px; margin-bottom: 10px; box-shadow: 0 2px 12px rgba(255,184,0,0.12);">
                <i class='bx bx-shield-quarter' style="font-size: 2.5rem; color: #fff;"></i>
            </span>
            <h1 style="color: #b8860b; font-weight: 700; font-size: 2.2rem; margin-bottom: 0.5rem;">Privacy Policy</h1>
            <p style="color: #888; font-size: 1rem;">Last updated: {{ date('F d, Y') }}</p>
        </div>
        <p style="font-size: 1.1rem; color: #333; margin-bottom: 1.5rem;">
            This Privacy Policy describes how Alshahed Honey (“we”, “us”, or “our”) collects, uses, and protects your personal information when you use our website.
        </p>
        <h3 style="color: #ff9f0d; font-size: 1.3rem; margin-top: 2rem;">Information We Collect</h3>
        <ul style="margin-bottom: 1.5rem; color: #444;">
            <li>Personal information you provide (name, email, address, phone, etc.)</li>
            <li>Order and payment information</li>
            <li>Information collected automatically (cookies, IP address, browser info)</li>
        </ul>
        <h3 style="color: #ff9f0d; font-size: 1.3rem; margin-top: 2rem;">How We Use Your Information</h3>
        <ul style="margin-bottom: 1.5rem; color: #444;">
            <li>To process and deliver your orders</li>
            <li>To communicate with you about your orders or inquiries</li>
            <li>To improve our website and services</li>
            <li>To comply with legal obligations</li>
        </ul>
        <h3 style="color: #ff9f0d; font-size: 1.3rem; margin-top: 2rem;">How We Protect Your Information</h3>
        <p style="color: #444;">We use industry-standard security measures to protect your data.</p>
        <h3 style="color: #ff9f0d; font-size: 1.3rem; margin-top: 2rem;">Sharing Your Information</h3>
        <p style="color: #444;">We may share your information with payment processors, shipping companies, or as required by law. We do not sell your personal information.</p>
        <h3 style="color: #ff9f0d; font-size: 1.3rem; margin-top: 2rem;">Your Rights</h3>
        <p style="color: #444;">You may request access, correction, or deletion of your personal information by contacting us at <a href="mailto:info@alshahedhoney.com" style="color: #b8860b; text-decoration: underline;">info@alshahedhoney.com</a>.</p>
        <h3 style="color: #ff9f0d; font-size: 1.3rem; margin-top: 2rem;">Changes to This Policy</h3>
        <p style="color: #444;">We may update this policy from time to time. Changes will be posted on this page.</p>
        <h3 style="color: #ff9f0d; font-size: 1.3rem; margin-top: 2rem;">Contact Us</h3>
        <p style="color: #444;">If you have any questions, please contact us at <a href="mailto:info@alshahedhoney.com" style="color: #b8860b; text-decoration: underline;">info@alshahedhoney.com</a>.</p>
    </div>
</div>
@extends('home.footer')
</body>
</html>