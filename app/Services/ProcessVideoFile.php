<?php
declare(strict_types=1);
namespace App\Services;

use App\Services\Contracts\ProcessFileInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProcessVideoFile implements ProcessFileInterface
{
/*
|--------------------------------------------------------------------------
| ProcessVideo
|--------------------------------------------------------------------------
|The Video file is uploaded and stored
|
|
|
*/

    private $storagePath;
    /**
    * Constructor - storage path is set
    *
    **/
    public function __construct()
    {
        $this->setStoragePath('/app/public/videos');
    }
    /**
    * This method sets the storage path for the uploaded file
    * @param string
    * @return void
    *
    **/
    public function setStoragePath(string $storagePath)
    {
        $this->storagePath = $storagePath;
    }

   /**
    * file is uploaded to the storage location
    * @param UploadedFile
    * @return string
    *
    **/
    public function getFileDetails(UploadedFile $uploadedFile):string
    {
        $file_name = time().'.'.$uploadedFile->getClientOriginalExtension();
        $uploadedFile->move($this->getStorageDestinationPath(), $file_name);
        $uploadedFile_withPath= $this->getUploadedFilePath($file_name);
        return $uploadedFile_withPath;
    }
    /**
    * returns the storage file path
    *
    * @return string
    *
    **/
    public function getStorageDestinationPath():string
    {
        return storage_path($this->storagePath);
    }
    /**
    * returns the storage file path
    *
    * @return string
    *
    **/
    public function getPublicDestinationPath():string
    {
        return rtrim(app()->basePath('public/' . $this->storagePath), '/');
    }
    /**
    * returns the uploaded file path
    * @param string
    * @return string
    *
    **/
    public function getUploadedFilePath(string $file_name):string
    {
        $uploadedFile_withPath = $this->getStorageDestinationPath().DIRECTORY_SEPARATOR .$file_name;
        return $uploadedFile_withPath;
    }
}
