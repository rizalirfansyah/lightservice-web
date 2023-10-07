<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendEmailTagihan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendEmailTagihanJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $send_mail;
    protected $biaya;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($send_mail, $biaya)
    {
        $this->send_mail = $send_mail;
        $this->biaya = $biaya;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::to($this->send_mail)->send(new SendEmailTagihan($this->biaya));
    }
}
