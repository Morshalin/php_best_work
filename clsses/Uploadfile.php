<?php
$filepath = realpath(__DIR__);
include_once($filepath."/../database/Database.php");

?>

<?php
/**
*
*/
class Uploadfile  {
	public $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function fileupload($files){
		$filename = $files['upload']['name'];
		$filesize = $files['upload']['size'];
		$filetmp = $files['upload']['tmp_name'];
		$exe = pathinfo($filename, PATHINFO_EXTENSION);
		echo $exe;
		$basename = pathinfo($filename, PATHINFO_BASENAME);
		$uploadfile ="upload/".$filename;
		if (empty($filename)) {
			echo "<p style='color:green'>File Must Not be empty</p>";
		}elseif ($exe != "pdf" and $exe != "jpg" and $exe != "png") {
			echo "<p style='color:green'>File extension error</p>";
		}elseif (file_exists($uploadfile)) {
			echo "<p style='color:green'>File allready  </p>";
		 }else{
			move_uploaded_file($filetmp, $uploadfile);
			$query = "INSERT into tbl_file(name) values('$uploadfile')";
			$result = $this->db->insert($query);
			if ($result) {
				echo "<p style='color:green'>File Upload Successfuly</p>";
			}
		}

	}



	public function filedownload(){
		$query = "SELECT * from tbl_file order by id asc";
		$result = $this->db->select($query);
		if ($result ) {
			return $result ;
		}else{
			return false;
		}
	}

	public function convertpdf(){
		$query = "SELECT * from tbl_order";
		$result = $this->db->select($query);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}

	public function createpdf($pFilename = 'doc.pdf'){
		$filepath = realpath(__DIR__);
		require_once($filepath.'/../tcpdf/tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(true, 10);
      $obj_pdf->SetFont('helvetica', '', 10);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />
      <table border="2" cellpadding="5px">
           <tr>
                <th width="5%">ID</th>
                <th width="30%">Name</th>
                <th width="30%">Number</th>
                <th width="35%">Email</th>
           </tr>
      ';
      $content .= $this->findvalue();

      $content .= '</table>';
      $obj_pdf->writeHTML($content);
      ob_end_clean();
      $obj_pdf->Output($pFilename, 'I');
	}

	public function findvalue(){
		$query = "SELECT * from tbl_order";
		$result = $this->db->select($query);
		if ($result) {
			$output = '';
			while ($value = $result->fetch_assoc()) {
				$output .= '<tr>
                          <td>'.$value["id"].'</td>
                          <td>'.$value["name"].'</td>
                          <td>'.$value["number"].'</td>
                          <td>'.$value["email"].'</td>
                     </tr>
                          ';
			}
			return $output;
		}
	}


}
?>
