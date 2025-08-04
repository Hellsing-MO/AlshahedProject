

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Privacy Policy - Alshahed Honey</title>
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
    <div class="privacy-policy-card" style="max-width: 800px; margin: 0 auto; background: linear-gradient(135deg, #fffbe6 0%, #fff8dc 100%); border-radius: 20px; box-shadow: 0 8px 32px rgba(255,184,0,0.15); padding: 3rem 2.5rem; border: 1px solid rgba(255,159,13,0.1);">
        <div class="text-center mb-5">
            <span class="privacy-icon" style="display: inline-block; background: linear-gradient(135deg, #ff9f0d 0%, #ffb800 100%); border-radius: 50%; padding: 20px; margin-bottom: 15px; box-shadow: 0 4px 20px rgba(255,159,13,0.25);">
                <i class='bx bx-shield-quarter' style="font-size: 2.8rem; color: #fff;"></i>
            </span>
            <h1 style="color: #b8860b; font-weight: 700; font-size: 2.5rem; margin-bottom: 0.5rem; text-shadow: 0 2px 4px rgba(184,134,11,0.1);">Privacy Policy</h1>
            <p style="color: #666; font-size: 1.1rem; margin-bottom: 0;">Last updated: {{ date('F d, Y') }}</p>
        </div>
        
        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <p style="font-size: 1.2rem; color: #333; margin-bottom: 1.5rem; line-height: 1.6; text-align: justify;">
                This Privacy Policy describes how <strong>Alshahed Honey</strong> ("we", "us", or "our") collects, uses, and protects your personal information when you use our website and services. We are committed to protecting your privacy and ensuring the security of your personal data.
            </p>
        </div>

        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <h3 style="color: #ff9f0d; font-size: 1.4rem; margin-bottom: 1rem; display: flex; align-items: center;">
                <i class='bx bx-collection' style="margin-right: 10px; font-size: 1.5rem;"></i>
                Information We Collect
            </h3>
            <ul style="margin-bottom: 1.5rem; color: #444; line-height: 1.8;">
                <li><strong>Personal Information:</strong> Name, email address, phone number, shipping address, and billing information</li>
                <li><strong>Order Information:</strong> Purchase history, order details, and payment information</li>
                <li><strong>Technical Information:</strong> IP address, browser type, device information, and cookies</li>
                <li><strong>Communication Data:</strong> Messages, inquiries, and feedback you send to us</li>
            </ul>
        </div>

        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <h3 style="color: #ff9f0d; font-size: 1.4rem; margin-bottom: 1rem; display: flex; align-items: center;">
                <i class='bx bx-cog' style="margin-right: 10px; font-size: 1.5rem;"></i>
                How We Use Your Information
            </h3>
            <ul style="margin-bottom: 1.5rem; color: #444; line-height: 1.8;">
                <li>To process and fulfill your orders and deliver products to you</li>
                <li>To communicate with you about your orders, inquiries, and customer support</li>
                <li>To improve our website, products, and customer experience</li>
                <li>To send you promotional offers and updates (with your consent)</li>
                <li>To comply with legal obligations and protect our rights</li>
            </ul>
        </div>

        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <h3 style="color: #ff9f0d; font-size: 1.4rem; margin-bottom: 1rem; display: flex; align-items: center;">
                <i class='bx bx-shield-check' style="margin-right: 10px; font-size: 1.5rem;"></i>
                How We Protect Your Information
            </h3>
            <p style="color: #444; line-height: 1.6; margin-bottom: 1rem;">We implement industry-standard security measures to protect your personal information, including:</p>
            <ul style="color: #444; line-height: 1.8;">
                <li>SSL encryption for all data transmission</li>
                <li>Secure payment processing through trusted providers</li>
                <li>Regular security audits and updates</li>
                <li>Limited access to personal information on a need-to-know basis</li>
            </ul>
        </div>

        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <h3 style="color: #ff9f0d; font-size: 1.4rem; margin-bottom: 1rem; display: flex; align-items: center;">
                <i class='bx bx-share-alt' style="margin-right: 10px; font-size: 1.5rem;"></i>
                Sharing Your Information
            </h3>
            <p style="color: #444; line-height: 1.6;">We may share your information with:</p>
            <ul style="color: #444; line-height: 1.8;">
                <li><strong>Service Providers:</strong> Payment processors, shipping companies, and IT service providers</li>
                <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                <li><strong>Business Partners:</strong> Only with your explicit consent</li>
            </ul>
            <p style="color: #444; line-height: 1.6; margin-top: 1rem; font-weight: 600;">We do not sell, trade, or rent your personal information to third parties.</p>
        </div>

        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <h3 style="color: #ff9f0d; font-size: 1.4rem; margin-bottom: 1rem; display: flex; align-items: center;">
                <i class='bx bx-user-check' style="margin-right: 10px; font-size: 1.5rem;"></i>
                Your Rights
            </h3>
            <p style="color: #444; line-height: 1.6; margin-bottom: 1rem;">You have the right to:</p>
            <ul style="color: #444; line-height: 1.8;">
                <li>Access and review your personal information</li>
                <li>Request correction of inaccurate data</li>
                <li>Request deletion of your personal information</li>
                <li>Opt-out of marketing communications</li>
                <li>Withdraw consent for data processing</li>
            </ul>
            <p style="color: #444; line-height: 1.6; margin-top: 1rem;">To exercise these rights, please contact us at 
                <a href="mailto:alshahedhoney@gmail.com" target="_blank" rel="noopener" title="Send email to alshahedhoney@gmail.com" style="color: #b8860b; text-decoration: underline; font-weight: 600;">alshahedhoney@gmail.com</a>.
            </p>
        </div>

        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <h3 style="color: #ff9f0d; font-size: 1.4rem; margin-bottom: 1rem; display: flex; align-items: center;">
                <i class='bx bx-calendar-edit' style="margin-right: 10px; font-size: 1.5rem;"></i>
                Changes to This Policy
            </h3>
            <p style="color: #444; line-height: 1.6;">We may update this Privacy Policy from time to time to reflect changes in our practices or for legal reasons. We will notify you of any material changes by:</p>
            <ul style="color: #444; line-height: 1.8;">
                <li>Posting the updated policy on this page</li>
                <li>Sending you an email notification</li>
                <li>Displaying a notice on our website</li>
            </ul>
            <p style="color: #444; line-height: 1.6; margin-top: 1rem;">The "Last updated" date at the top of this policy indicates when it was last revised.</p>
        </div>

        <div style="background: rgba(255,255,255,0.7); border-radius: 15px; padding: 2rem; border: 1px solid rgba(255,159,13,0.1);">
            <h3 style="color: #ff9f0d; font-size: 1.4rem; margin-bottom: 1rem; display: flex; align-items: center;">
                <i class='bx bx-envelope' style="margin-right: 10px; font-size: 1.5rem;"></i>
                Contact Us
            </h3>
            <p style="color: #444; line-height: 1.6; margin-bottom: 1rem;">If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:</p>
            <div style="background: rgba(255,159,13,0.1); border-radius: 10px; padding: 1.5rem; border-left: 4px solid #ff9f0d;">
                <p style="color: #444; line-height: 1.6; margin-bottom: 0.5rem;"><strong>Email:</strong> 
                    <a href="mailto:alshahedhoney@gmail.com" target="_blank" rel="noopener" title="Send email to alshahedhoney@gmail.com" style="color: #b8860b; text-decoration: underline; font-weight: 600;">alshahedhoney@gmail.com</a>
                </p>
                <p style="color: #444; line-height: 1.6; margin-bottom: 0.5rem;"><strong>Phone:</strong> 
                    <a href="tel:+14379951819" title="Call +1 (437) 995-1819" style="color: #b8860b; text-decoration: underline; font-weight: 600;">+1 (437) 995-1819</a>
                </p>
                <p style="color: #444; line-height: 1.6; margin-bottom: 0;"><strong>Address:</strong> North York, Canada</p>
            </div>
        </div>
    </div>
</div>
@extends('home.footer')
</body>
</html>