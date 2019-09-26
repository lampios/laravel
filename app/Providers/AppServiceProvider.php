<?php
declare(strict_types=1);

namespace App\Providers;

use App\Services\Request;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->when(Request::class)
                  ->needs('$url')
                  ->give(config('exerciseRequest.url'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Queue::failing(static function (JobFailed $event) {
            $job = $event->job;
            Log::error("Job '{$job->resolveName()}' failed for queue '{$job->getQueue()}' after {$job->attempts()} attempts");
        });
    }
}
