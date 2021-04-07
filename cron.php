<?php
$paths = scandir(__DIR__ . "/files");
$path_print = 'C:/2Printer/2Printer.exe';
$path_print = __DIR__ . '/PDFtoPrinter.exe';
foreach ($paths as $k => $v) {
	if ($k < 2) {
		continue;
	}
	$path = __DIR__ . "/files/" . $v;
	// $command = $path_print . ' -src "'. $path .'" -prn "PRINTER_HP_USB" -options report:no';
	$command = $path_print . ' "'. $path .'" "PRINTER_HP_USB"';
	echo "Print run : # " . $command;
	exec($command);
	echo "Print finish...";
}