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
       // Storage::fake('local');
       
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



    public function testPostJson() {
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
    /*************************************************************************************/

    // public function testVideoUpload()
    // {
    //     $fileName='1558371769.mp4';
    //     Storage::fake('local');

    //     $response = $this->json('POST', '/api/v1/post-video', [
    //         'File' => UploadedFile::fake()->create($fileName)
    //     ]);

    //     // Assert the file was stored...
    //     Storage::disk('local')->assertExists('videos/' . $fileName);
    //     // Assert a file does not exist...
    //    // Storage::disk('videos')->assertMissing('missing.mp4');
    // }

/**    public function testUploadVideo()
    {
            $response = $this->json('POST', '/api/v1/post-video', [
                'File' => UploadedFile::fake()->create('image.mp4')
            ]);
             $this->assertResponseOk();  
             // $this->assertEquals(201, $this->response->status());
            // $response->assertStatus(201);
            // $this->assertNotNull($response->getData());
    }
    **/
    //storage_path($this->storagePath)'/app/public/videos'

    //public function testFileUpload()  
     // {  
     //     $path = Storage::fake('videos');  
     //     $original_name = 'pikachu.mp4';  
     //     $mime_type = 'video/mp4';  
     //     $size = 2476;  
     //     $error = null;  
     //     $test = true;

     //     $file = new UploadedFile($path, $original_name, $mime_type, $size, $error, $test);

     //     $this->call('POST', '/api/v1/post-video', [], [], ['File' => $file], []);

     //     $this->assertResponseOk();  
     // }  

    // public function test_upload_avatar()
    // {
    //     Storage::fake('local');
    //     $fileName =time().'.mp4';
    //     $this->post('/api/v1/post-video', [
    //         'File' => UploadedFile::fake()->create($fileName),
    //     ]);
    //     Storage::disk('local')->get("videos/{$fileName}");
    //     //Storage::disk('local')->assertExists("videos/{$fileName}");
    // }
}
