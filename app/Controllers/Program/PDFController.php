<?php


namespace App\Controllers\Program;

// reference the Dompdf namespace
use \Dompdf\Dompdf;

use App\Controllers\BaseController;
use App\Models\EstimasiModel;

class PDFController extends BaseController
{
    protected $estimasiModel;
    protected $detailEstimasiModel;
    public function __construct()
    {
        $this->estimasiModel = new EstimasiModel();

    }
    public function index()
    {
     
        
    }

    
    
}