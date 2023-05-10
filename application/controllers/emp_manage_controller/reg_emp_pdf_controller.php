<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 10/8/2022
 * Time: 1:19 PM
 */

class reg_emp_pdf_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('emp_manage_model/reg_emp_pdf_model');
    }

    public function regEmpPdfView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $empID = $_GET['empId'];

            $result = $this->reg_emp_pdf_model->getPdfData($empID);

            if ($result != false) {

//                $this->load->library('pdf');
                $data['pdfData'] = $result;
                $data['empNum'] = $empID;
                $html = $this->load->view('employee_management/reg_employee_pdf', $data, true);
                $this->pdf->createEmpRegPDF($html, $empID, false);

            } else {
                $this->session->set_flashdata("error", "Error occured while generating pdf");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");
            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }

    }
}