<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Contracts\ProcessFileInterface;
use App\Services\Contracts\FileAnalyzerInterface;

class PostVideoController extends Controller
{
/*
|--------------------------------------------------------------------------
| PostVideoController
|--------------------------------------------------------------------------
|PostVideoController; Uploading of File, Local storage of File and ID3 Analysis of the uploaded file
|
|
*/
    protected $videoProcessor;
    protected $analyzer;
    /**
    * Create a new controller instance with the video processor and File analyser
    *
    * @return void
    */
    public function __construct(ProcessFileInterface $videoProcessor, FileAnalyzerInterface $analyzer)
    {
        $this->videoProcessor=$videoProcessor;
        $this->analyzer = $analyzer;
    }
    /**
    * File is uploaded and the if usccessfully uploaded, the id3analysis is done and returned as a json *response
    * @param Request
    * @return Response
    *
    **/
    public function postVideo(Request $request):Response
    {
        if ($request->hasFile('File')) {
            $videoFile = $request->file('File');
            $this->validate(
                $request,
                ['File' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/P2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/mpeg'
                ]
            );
            
            if ($videoFile->isValid()) {
                $processedFile=$this->videoProcessor->getFileDetails($videoFile);
                $analyzed = $this->analyzer->analyzeFile($processedFile);
                return response()->json(['data'=>$analyzed]);
            }
        } else {
                return response()->json(['data'=>"There is an error with your file, please check file size and type "]);
        }
    }
}
