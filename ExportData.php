<?php

require_once('scheme/core.php');

//session user validation // authorized user can access this file
if (empty($_SESSION['username'])) {
    redirect('login');
}



/**
 * use PHP Spreadsheet
 */
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
error_reporting(E_ALL);
require 'plugins/PHP-Spreadsheet-Library/phpoffice/phpspreadsheet/src/Bootstrap.php';
$helper = new Sample();
// Return to the caller script when runs by CLI
if ($helper->isCli()) {
    return;
}

/**
 * ExportData Class
 */
Class ExportData 
{
    private $db;
    
    function __construct()
    {
        //create object of database/Model class
        $this->db = new Model();
    }

    function export_owners()
    {
        $owners = $this->db->view_owners();

		$template = 'templates/sample.xlsx';
		$excel = IOFactory::createReader('Xlsx');
		$excel = $excel->load($template); // Empty Sheet

        $countRow = 18; // row start
        foreach($owners as $owner)
        {
			$excel->getActiveSheet()->setCellValue('B' . $countRow, $owner['full_name']); //('B18', 'Juan Dela Crus');
            $countRow++; // increment row
        }
			
		$filename = 'owners-'.time().'.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($excel, 'Xlsx');
		ob_end_clean();
		$writer->save('php://output');
		//exit;
    }

}


?>