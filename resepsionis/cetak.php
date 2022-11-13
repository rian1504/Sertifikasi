<?php
    include "../DB/koneksi.php";
    require_once "../tcpdf/tcpdf.php";

    $nama_pemesan = $_POST["nama_pemesan"];
    $email = $_POST["email"];
    $no_handphone = $_POST["no_handphone"];
    $nama_tamu = $_POST["nama_tamu"];
    $tgl_check_in = $_POST["tgl_check_in"];
    $tgl_check_out = $_POST["tgl_check_out"];
    $tipe_kamar = $_POST["tipe_kamar"];
    $jumlah_kamar = $_POST["jumlah_kamar"];
    $kode_reservasi = $_POST["kode_reservasi"];

    class MYPDF extends TCPDF {

        //Page header
        public function Header() {
            // Logo
            $image_file = '../image/navbar/hotel1.jpg';
            $this->Image($image_file, 10, 10, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'B', 20);
            // Title
            $this->Cell(120, 15, 'Hotel Hebat', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        }
    }

    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator('Rian Abdullah');
    $pdf->SetAuthor('Rian Abdullah');
    $pdf->SetTitle('Data Booking Hotel');
    $pdf->SetSubject('Data Booking Hotel');
    $pdf->SetKeywords('Data Booking Hotel');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set font
    $pdf->SetFont('times', 'B', 16);

    // add a page
    $pdf->AddPage();

    // set some text to print
    $txt = <<<EOD
    Data Booking Hotel

    Berikut ini merupakan data anda yang harus anda berikan kepada resepsionis sebelum anda melakukan check in!
    EOD;

    // print a block of text using Write()
    $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

    $html = '
    <br><br><br>
    <table>
            <br>
            <tr>
                <td>Nama Pemesan</td>
                <td>: '.$nama_pemesan.'</td>
            </tr>
                <br>
            <tr>
                <td>Email</td>
                <td>: '.$email.'</td>
            </tr>
                <br>
            <tr>
                <td>No Handphone</td>
                <td>: '.$no_handphone.'</td>
            </tr>
                <br>
            <tr>
                <td>Nama Tamu</td>
                <td>: '.$nama_tamu.'</td>
            </tr>
                <br>
            <tr>
                <td>Tanggal Check In</td>
                <td>: '.$tgl_check_in.'</td>
            </tr>
                <br>
            <tr>
                <td>Tanggal Check Out</td>
                <td>: '.$tgl_check_out.'</td>
            </tr>
                <br>
            <tr>
                <td>Tipe Kamar</td>
                <td>: '.$tipe_kamar.'</td>
            </tr>
                <br>
            <tr>
                <td>Jumlah Kamar</td>
                <td>: '.$jumlah_kamar.'</td>
            </tr>
                <br>
        </table>
        <br><br>
    <h1 style="text-align: center; color: red;">'.$kode_reservasi.'</h1>
    ';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    // ---------------------------------------------------------

    // new style
    $style = array(
        'border' => 2,
        'padding' => 'auto',
        'fgcolor' => false,//array(0,0,255),
        'bgcolor' => false//array(255,255,64)
    );

    // QRCODE,H : QR-CODE Best error correction
    $pdf->write2DBarcode($kode_reservasi, 'QRCODE,H', 80, 210, 50, 50, $style, 'N');

    //Close and output PDF document
    $pdf->Output('data_booking.pdf', 'D');
?>