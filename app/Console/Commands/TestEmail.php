<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email configuration by sending a test email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        $this->info("Sending test email to: {$email}");
        
        try {
            Mail::raw('This is a test email from Alshahed Honey Store. If you receive this, your email configuration is working correctly!', function($message) use ($email) {
                $message->to($email)
                        ->subject('Test Email - Alshahed Honey Store')
                        ->from(config('mail.from.address'), config('mail.from.name'));
            });
            
            $this->info('✅ Test email sent successfully!');
            $this->info('Check your inbox (and spam folder) for the test email.');
            
        } catch (\Exception $e) {
            $this->error('❌ Failed to send test email:');
            $this->error($e->getMessage());
            $this->info('Please check your email configuration in .env file.');
        }
    }
}
