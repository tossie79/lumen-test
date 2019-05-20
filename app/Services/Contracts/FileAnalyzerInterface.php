<?php
declare(strict_types=1);
namespace App\Services\Contracts;

interface FileAnalyzerInterface
{
	/*
    |--------------------------------------------------------------------------
    | AnalyzeFile Interface
    |--------------------------------------------------------------------------
    |
    | 
    | 
    |
    */
    
    public function setInstance();
    public function analyzeFile(string $file):array;
    public function utf8ize($mixed);
	

}
