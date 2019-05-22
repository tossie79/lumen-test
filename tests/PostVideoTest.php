<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use League\Flysystem\Filesystem;

class PostVideoTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }
    /**
    * Test Route.
    *
    * @return void
    */
    public function testRoute()
    {
        $response = $this->get('/');
        $this->assertEquals(200, $this->response->status());
    }
    

    /**
    * Test File Upload
    * @method testUploadingVideoFile
    */
    public function testUploadingVideoFile()
    {
        $this->send_json    = '{"FILE": "Sample_Video.mp4"}';
        $this->send_headers = [ 'CONTENT_TYPE' => 'application/json' ];
        $this->call(
            'POST',
            '/api/v1/post-video',
            [],
            [],
            [],
            $this->send_headers,
            $this->send_json
        );
        $this->receive_json = json_decode($this->response->getContent());
        $this->assertEquals(200, $this->response->status());
    }
}
