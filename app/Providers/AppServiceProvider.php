<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\ProcessFileInterface;
use App\Services\Contracts\ FileAnalyzerInterface;
use App\Services\ProcessVideoFile;
use App\Services\Id3FileAnalyzer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProcessFileInterface::class, ProcessVideoFile::class);
        $this->app->bind(FileAnalyzerInterface::class, Id3FileAnalyzer::class);
    }
}
