# Hostinger Email Configuration Guide

## Step 1: Get Your Hostinger Email Credentials

1. **Login to Hostinger Control Panel**
   - Go to your Hostinger dashboard
   - Navigate to "Email" section

2. **Create or Use Existing Email**
   - Create a new email account (e.g., `noreply@yourdomain.com`)
   - Or use an existing email account

3. **Get SMTP Settings**
   - **SMTP Host**: `smtp.hostinger.com`
   - **SMTP Port**: `587` (TLS) or `465` (SSL)
   - **Encryption**: `tls` (for port 587) or `ssl` (for port 465)
   - **Username**: Your full email address
   - **Password**: Your email password

## Step 2: Update Your .env File

Add these settings to your `.env` file:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="Alshahed Honey Store"
```

## Step 3: Test Email Configuration

Run this command to test your email setup:

```bash
php artisan tinker
```

Then in tinker:
```php
Mail::raw('Test email from Laravel', function($message) {
    $message->to('your-test-email@example.com')
            ->subject('Test Email');
});
```

## Step 4: Alternative Hostinger SMTP Settings

If the above doesn't work, try these alternative settings:

### Option 1: Using SSL
```env
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
```

### Option 2: Using Hostinger's Webmail SMTP
```env
MAIL_HOST=mail.yourdomain.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

## Step 5: Troubleshooting

### Common Issues:

1. **Authentication Failed**
   - Check your email password
   - Make sure 2FA is disabled for the email account
   - Try using an app-specific password

2. **Connection Timeout**
   - Check if port 587 or 465 is blocked by your hosting
   - Try different ports (25, 587, 465)

3. **SSL/TLS Issues**
   - Try switching between `tls` and `ssl`
   - Check if your hosting supports the encryption method

### Test Commands:

```bash
# Test mail configuration
php artisan config:cache
php artisan route:cache

# Check mail logs
tail -f storage/logs/laravel.log
```

## Step 6: Production Settings

For production, make sure to:

1. **Use a dedicated email account** for sending emails
2. **Set up SPF and DKIM records** in your DNS
3. **Monitor email delivery** through Hostinger's email logs
4. **Set up email forwarding** if needed

## Step 7: Email Templates

Your current email template is located at:
`resources/views/emails/orders/confirmed.blade.php`

You can customize it to match your brand colors and style.

## Step 8: Queue Configuration (Optional)

For better performance, set up email queues:

```env
QUEUE_CONNECTION=database
```

Then run:
```bash
php artisan queue:table
php artisan migrate
php artisan queue:work
```

This will send emails in the background instead of blocking the user. 