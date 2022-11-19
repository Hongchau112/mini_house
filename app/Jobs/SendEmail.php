<?php

namespace App\Jobs;
use App\Mail\MailNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $booking;
    protected $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->$booking = $booking;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            Mail::to($this->booking->email)->send(new MailNotify($this->booking));
    }
}
