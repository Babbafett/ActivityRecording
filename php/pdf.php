<?php
if (isset($_POST['calc'])) {
	include 'dao.php';
	$entry = new EntryDAO();
	$entry -> connect();
	echo $data[] = $_POST['month'];
	echo $data[] = $_POST['year'];
	echo $data[] = $_POST['p_id'];
	$result = $entry -> getMonth($data);
	try {
		$p = new PDFlib();

		/* öffnet eine neue PDF-Datei; fügen Sie einen Dateinamen ein,
		 um das PDF auf der Platte zu speichern */
		if ($p -> begin_document("", "") == 0) {
			die("Error: " . $p -> get_errmsg());
		}

		$p -> set_info("Creator", "ActivityRecording");
		$p -> set_info("Author", "Rainer Schaaf");
		$p -> set_info("Title", "Hallo Welt (PHP)!");

		$p -> begin_page_ext(595, 842, "");

		$font = $p -> load_font("Helvetica-Bold", "winansi", "");

		$p -> setfont($font, 24.0);
		$p -> set_text_pos(50, 700);
		$p -> show("Abrechnung " . $_POST['month'] . ' ' . $_POST['year']);
		foreach ($result as $row) {

			$p -> continue_text($row['dates'].' '.$row['cost_type']. ' '.$row['job'].' '.$row['hours']);
		}
		$p -> end_page_ext("");

		$p -> end_document("");

		$buf = $p -> get_buffer();
		$len = strlen($buf);

		header("Content-type: application/pdf");
		header("Content-Length: $len");
		header("Content-Disposition: inline; filename=Abrechnung.pdf");
		print $buf;
	} catch (PDFlibException $e) {
		die("Eine PDFlib-Exception ist aufgetreten im hallo-Schnipsel:\n" . "[" . $e -> get_errnum() . "] " . $e -> get_apiname() . ": " . $e -> get_errmsg() . "\n");
	} catch (Exception $e) {
		die($e);
	}
	$p = 0;
}
?>