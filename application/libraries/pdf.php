<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 10/8/2022
 * Time: 1:13 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/dompdf/autoload.inc.php');

class Pdf
{
    function createEmpRegPDF($html, $filename = '', $download = TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf\DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download)
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }


    function testPDF($html, $filename = '', $download = TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf\DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download)
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));


    }
}

?>