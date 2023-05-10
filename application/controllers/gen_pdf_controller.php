<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 10/6/2022
 * Time: 11:12 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/dompdf/autoload.inc.php');

class gen_pdf_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createPdf($html, $filename = '', $download = TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf\DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download) {
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        } else {
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
        }

    }

    public function empRegPdfView()
    {
        $this->load->library('pdf');
        $data['confid'] = 1;
        $data['val'] = 1;

        $html = $this->load->view('employee_management/reg_employee_pdf',$data,true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

}