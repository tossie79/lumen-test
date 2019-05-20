<?php
namespace Tests;
use Storage;
use Illuminate\Filesystem\Filesystem;
trait CreatesFakeStorage
{
	/**
	 * Replace the given disk with a local testing disk. We use a unique
	 * base path for every test to prevent issues with the filesystem
	 * when running tests in a multi process environment.
	 *
	 * @param  string|null  $disk
	 * @return void
	 */
	protected function fakeStorage($disk = null)
	{
		$disk = $disk ?: $this->$app['config']->get('filesystems.default');
		$time = (int) (microtime(true) * 1000);
		$base = storage_path('framework/testing/' . $time);
		$root = $base . '/disks/' . $disk;
		$this->beforeApplicationDestroyed(function() use ($base) {
			(new Filesystem)->deleteDirectory($base);
		});
		Storage::set($disk, Storage::createLocalDriver(['root' => $root]));
	}
}