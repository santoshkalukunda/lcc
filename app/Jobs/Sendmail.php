<?php

namespace App\Jobs;

use App\Mail\CustomMail;
use App\Mail\NameChangeMail;
use App\Shareholder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class Sendmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $shareholder = Shareholder::get();
        // foreach($shareholder as $item){
        //     Mail::to($item->shareholder_email)
        //     ->send(new NameChangeMail($item->shareholder_name));
        // }
        

        $shareholders = Shareholder::get(['shareholder_name', 'shareholder_email']);
        foreach ($shareholders as $shareholder) {
            Mail::to($shareholder->shareholder_email)
                ->send(new NameChangeMail($shareholder->shareholder_name));
        }
    }
}
