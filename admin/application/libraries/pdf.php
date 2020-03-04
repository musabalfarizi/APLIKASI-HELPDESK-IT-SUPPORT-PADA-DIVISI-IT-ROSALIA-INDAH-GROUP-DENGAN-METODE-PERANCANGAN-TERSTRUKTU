<?php if ( !defined('BASEPATH')) exit();
class Pdf extends FPDF
{
    function __construct()
    {
		define('FPDF_FONTPATH',APPPATH .'fpdf/font/');
        require('fpdf/fpdf.php');
    }
}