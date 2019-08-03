<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
*  ======================================= 
*  Author     : TechArise Team 
*  License    : Protected 
*  Email      : info@techarise.com 
*   
*  Dilarang merubah, mengganti dan mendistribusikan 
*  ulang tanpa sepengetahuan Author 
*  ======================================= 
*/
require_once APPPATH . "/third_party/tcpdf/tcpdf.php";
class Pdf extends tcpdf
{
    public function __construct()
    {
        parent::__construct();
    }
}
