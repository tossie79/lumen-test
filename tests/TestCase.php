<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{

	// public function setUp()
 //    {
 //        parent::setUp();
 //        // Create The fake Disk
 //        Storage::fake('videos');
 //    }
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    protected function mockStorageDisk($disk = 'mock')
    {
        Storage::extend('mock', function () {
            return \Mockery::mock(\Illuminate\Contracts\Filesystem\Filesystem::class);
        });
        Config::set('filesystems.disks.' . $disk, ['driver' => 'mock']);
        Config::set('filesystems.default', $disk);
        return Storage::disk($disk);
    }

    /*******************************************/

}
