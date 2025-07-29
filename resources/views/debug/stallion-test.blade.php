<!DOCTYPE html>
<html>
<head>
    <title>StallionExpress API Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .config { background: #f5f5f5; padding: 20px; margin: 20px 0; border-radius: 5px; }
        .error { color: red; }
        .success { color: green; }
        pre { background: #f8f8f8; padding: 15px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>StallionExpress Configuration Test</h1>
    
    <div class="config">
        <h3>Current Configuration:</h3>
        <p><strong>API Key:</strong> {{ config('services.stallion.key') ? '✓ Set' : '✗ Missing' }}</p>
        <p><strong>Base URL:</strong> {{ config('services.stallion.base') ?: '✗ Missing' }}</p>
        <p><strong>Origin Postal Code:</strong> {{ config('services.stallion.origin_postal_code') ?: '✗ Missing' }}</p>
    </div>

    @if(config('services.stallion.key') && config('services.stallion.base'))
        <div class="success">
            <h3>✓ Configuration appears complete</h3>
            <p>Your StallionExpress API should work. If you're still getting errors, check:</p>
            <ul>
                <li>API key is valid and active</li>
                <li>Base URL is correct (should end with /)</li>
                <li>Your server can reach the StallionExpress API</li>
            </ul>
        </div>
    @else
        <div class="error">
            <h3>✗ Configuration incomplete</h3>
            <p>Please add these to your .env file:</p>
            <pre>STALLION_API_KEY_VALUE=your_api_key_here
STALLION_API_BASE_VALUE=https://api.stallionexpress.ca/v1/
STALLION_ORIGIN_POSTAL_CODE=your_postal_code</pre>
        </div>
    @endif

    <div class="config">
        <h3>Recent Log Entries:</h3>
        <p>Check your Laravel logs at <code>storage/logs/laravel.log</code> for StallionExpress API errors.</p>
    </div>
</body>
</html>
