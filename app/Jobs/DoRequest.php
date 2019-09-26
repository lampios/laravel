<?php
declare(strict_types=1);

namespace App\Jobs;

use App\Services\Request;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

/**
 * Class DoRequest
 * @package App\Jobs
 */
class DoRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected const CONFIG_KEY = 'doRequestJob';

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $retryAfter;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->tries = config(self::CONFIG_KEY . '.tries');
        $this->retryAfter = config(self::CONFIG_KEY . '.retryAfter');
    }

    /**
     * Execute the job.
     *
     * @param Request $request
     *
     * @throws Exception
     */
    public function handle(Request $request): void
    {
        Log::info("Dispatched job, will retry {$this->tries} time(s) after {$this->retryAfter} second(s)");

        $request->post();
    }
}
