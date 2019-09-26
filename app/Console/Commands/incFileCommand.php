<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\DoRequest;
use Illuminate\Console\Command;

/**
 * Class incFileCommand
 * @package App\Console\Commands
 */
class incFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description;

    private function initializeCommandInfo(): void
    {
        $this->signature = 'incFileCommand:send';
        $this->description = 'Dispatch a job to submit a POST request';
    }

    public function __construct()
    {
        $this->initializeCommandInfo();
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        DoRequest::dispatch();
    }
}
