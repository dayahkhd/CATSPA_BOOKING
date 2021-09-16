<?php

/*
        ========================================================
        CREATED BY:
                    NUR HIDAYAH BT KHAIRUDDIN
                    SCHOOL OF COMPUTING
                    FACULTY OF ENGINEERING
                    UNIVERSITY OF TECHNOLOGY MALAYSIA, UTM
                    2021
        ========================================================
*/

/**
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - bookingsummary
 * @author Nur Hidayah bt Khairuddin
 * @since 2021-07-12
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
include('config.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'../assets/img/logo.png';
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'Mylovelycat Houz', 0, false, 'C', 0, '', 0, false, 'M', 'M');

        // Set font
        $this->SetFont('helvetica', '', 10);

        // new line
        $this->Ln(8);

        // First line of 3x "sometext"
        $this->MultiCell(0, 10, 'Jalan Pulai Perdana 11/2,', 0, 'C', 0, 0, '', '', true, 0, false, true, 'M', 'M');
        
        // new line
        $this->Ln(4);
        $this->MultiCell(0, 10, 'Taman Sri Pulai Perdana,', 0, 'C', 0, 0, '', '', true, 0, false, true, 'M', 'M');

        // new line
        $this->Ln(4);
        $this->MultiCell(0, 10, '81110, Johor Bahru, Johor', 0, 'C', 0, 0, '', '', true, 0, false, true, 'M', 'M');


    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    // Page body
    public function Body() {
        

        $custid = $_GET['id'];

        //table appointment
        $query = "SELECT * FROM appointment WHERE id='$custid'";
        $result = mysql_query($query) or die(mysql_error());
        $data = mysql_fetch_array($result);

        $appid = $data['id_cust'];
        $appdate = $data['adate'];
        $apptime = $data['atime'];
        $apppackge = $data['apackage'];
        $appcname = $data['cname'];
        $appcsex = $data['csex'];
        $appccoat = $data['ccoat'];
        $appcage = $data['cage'];
        $appst = $data['aptstatus'];
        $apgmr = $data['groomer'];

        $cquery = "SELECT * FROM customer WHERE id='$appid'";
        $cresult = mysql_query($cquery) or die(mysql_error());
        $cdata = mysql_fetch_array($cresult);

        $cnamedb = $cdata['fname'];
        $cnamedb2 = $cdata['lname'];
        $cpnum = $cdata['pnum'];
        $caddr = $cdata['addr'];

        $tquery = "SELECT * FROM gtime WHERE id='$apptime'";
        $tresult = mysql_query($tquery) or die(mysql_error());
        $tdata = mysql_fetch_array($tresult);

        $tnamedb = $tdata['tname'];

        $pquery = "SELECT * FROM package WHERE id='$apppackge'";
        $presult = mysql_query($pquery) or die(mysql_error());
        $pdata = mysql_fetch_array($presult);

        $pnamedb = $pdata['pname'];

        $squery = "SELECT * FROM sex WHERE id='$appcsex'";
        $sresult = mysql_query($squery) or die(mysql_error());
        $sdata = mysql_fetch_array($sresult);

        $snamedb = $sdata['sname'];

        $ccquery = "SELECT * FROM coat WHERE id='$appccoat'";
        $ccresult = mysql_query($ccquery) or die(mysql_error());
        $ccdata = mysql_fetch_array($ccresult);

        $ccnamedb = $ccdata['ccname'];

        $aquery = "SELECT * FROM age WHERE id='$appcage'";
        $aresult = mysql_query($aquery) or die(mysql_error());
        $adata = mysql_fetch_array($aresult);

        $anamedb = $adata['caname'];

        $ssquery = "SELECT * FROM aptstatus WHERE id='$appst'";
        $ssresult = mysql_query($ssquery) or die(mysql_error());
        $ssdata = mysql_fetch_array($ssresult);

        $ssnamedb = $ssdata['aptstname'];

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $today      = date('d-m-Y');

        $this->SetFont('times', '', 10, '', true);

        //references
            $this->Ln(5);
            $this->Cell(130);
            $this->Cell(1,1,'Reference No.',0,0,'L');
            $this->Cell(25);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(1,1,"BOOK00$appid",0,0,'L');
            $this->Cell(2);

        //date
            $this->Ln(4);
            $this->Cell(130);
            $this->Cell(1,1,'Date',0,0,'L');
            $this->Cell(25);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(1,1,"$today",0,0,'L');
            $this->Cell(2);

        $this->SetFont('times', 'B', 12, '', true);
        
        //title
            $this->Ln(10);
            $this->Cell(10);
            $this->Cell(1,1,'BOOKING SUMMARY',0,0,'L');
            $this->Ln(5);

        $this->SetFont('times', '', 11, '', true);  

            $this->Ln(7);
            $this->Cell(10);
            $this->Cell(1,1,'A. Cat Owner Detail',0,0,'L');
            $this->Ln(2);

        $this->SetFont('times', '', 10, '', true);  

        //owner details
            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Name',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$cnamedb $cnamedb2",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Phone No',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$cpnum",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Address',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$caddr",0,0,'L');
            $this->Ln(2);

        $this->SetFont('times', '', 11, '', true);  

            $this->Ln(7);
            $this->Cell(10);
            $this->Cell(1,1,'B. Cat Detail',0,0,'L');
            $this->Ln(2);

        $this->SetFont('times', '', 10, '', true);  

        //cat detail
            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Name',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$appcname",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Sex',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$snamedb",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Coat',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$ccnamedb",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Age',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$anamedb",0,0,'L');
            $this->Ln(2);

        $this->SetFont('times', '', 11, '', true);  

            $this->Ln(7);
            $this->Cell(10);
            $this->Cell(1,1,'C. Appointment Detail',0,0,'L');
            $this->Ln(2);

        $this->SetFont('times', '', 10, '', true);  

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Date',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$appdate",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Time',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$tnamedb",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Status',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$ssnamedb",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Pet Groomer',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$apgmr",0,0,'L');
            $this->Ln(2);

            $this->Ln(4);
            $this->Cell(10);
            $this->Cell(1,1,'Package Chosen',0,0,'L');
            $this->Cell(70);
            $this->Cell(1,1,':',0,0,'L');
            $this->Cell(2);
            $this->Cell(1,1,"$pnamedb",0,0,'L');
            $this->Ln(2);

    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nur Hidayah bt Khairuddin');
$pdf->SetTitle('bookingsummary');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Please bring this summary along with your cat to prove your booking, Thank You.
EOD;

// add body
$pdf->body();

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('bookingsummary.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+