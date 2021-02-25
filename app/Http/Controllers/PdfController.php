<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

class PdfController extends Controller
{
    public function pdf(){
      
        $text = (new Pdf('c:/Program Files/Git/mingw64/bin/pdftotext'))
        ->setPdf('last.pdf')->setOptions(['layout', 'enc UTF-8'])
        ->text();

       // return $text;
        
$string="تکلیف یہ کیو نکہ ‪ ،‬دو تکلیف کو آپ پنے";

if(str_contains($text,$string) === false){
echo "not ";
}
else{
    echo "yes";
}

    }
}
