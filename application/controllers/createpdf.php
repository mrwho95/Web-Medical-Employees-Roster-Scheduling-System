<?php 


/**
 * 
 */
class pdf extends AnotherClass
{

public function pdf_download()
{
    $this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ----
        your code here
        ---- ---- ---- ----
    */
    $this->load->view('pdfreport', $data);
}
}


?>