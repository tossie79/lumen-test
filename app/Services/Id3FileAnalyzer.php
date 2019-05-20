<?php
declare(strict_types=1);
namespace App\Services;

use App\Services\Contracts\FileAnalyzerInterface;
use \getID3;

class Id3FileAnalyzer implements FileAnalyzerInterface
{
    /*
    |--------------------------------------------------------------------------
    | FileAnalyzer 
    |--------------------------------------------------------------------------
    |This uses the ID3Anlayser and returns the file analysis
    | 
    | 
    |
    */
    private $getId3Instance;
    /**
    * constructor 
    * 
    *
    **/
   
    public function __construct()
    {
        $this->setInstance();
              
    }

    /**
    * returns the id3analysis of the uploaded file
    * @param string
    * @return array
    *
    *
    **/
    public function analyzeFile(string $filepath):array
    {
        if(!empty($filepath))
        {
            $analyzedFile =  $this->getId3Instance->analyze($filepath);
            $cleanedFile = $this->utf8ize($analyzedFile);
            return $cleanedFile;
        }
            return ["Error: File could not be analyzed"];
        
    }
    
   /**
    *
    *Initialize getID3 engine
    * @return void
    **/ 
    public function setInstance()
    {
       
         $this->getId3Instance = new getID3;
    }
    /**
    * This method cleans the array - fixes encoding issue
    *
    **/
    public function utf8ize($mixed) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = $this->utf8ize($value);
            }
        } elseif (is_string($mixed)) {
            return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
        }
        return $mixed;
}
    
}
