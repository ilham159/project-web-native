<?php

session_start();
include_once "koneksi.php";
$type		=		$_REQUEST['type'];

switch ($type)
		{
			case 1 :
			$txtid		    =		$_REQUEST['txtid'];
			$txtname_books	=		$_REQUEST['txtname_books'];
			$txt_author		=		$_REQUEST['txt_author'];
			$txtyears		=		$_REQUEST['txtyears'];
			$txt_stock		=		$_REQUEST['txt_stock'];

			if (empty($txtid)) {
			$mySql = "SELECT * FROM books_library WHERE txtid ='".$txtid."'";
			} else {
			$mySql = "SELECT * FROM books_library WHERE txtbrdt ='".$txtyears."' AND NOT (txtid='".$txtid."')";
			}

				$massageError = array();
				if (empty($txtid)){
					$massageError[] = "Sorry, <b>ID </b> can not be empty!";
				}	
				if (empty($txtname_books)){
					$massageError[] = "Sorry, <b>Books </b> can not be empty!";
				}
				if (empty($txt_author)){
					$massageError[] = "Sorry, <b>Author </b> can not be empty!";
				}
				if (empty($txtyears)){
					$massageError[] = "Sorry, <b>Years </b> can not be empty!";
				}
				if (empty($txt_stock)){
					$massageError[] = "Sorry, <b>Stock </b> can not be empty!";
				}
				if (count($massageError)>=1){
					$massage="";
					foreach ($massageError as $massage_appear) {
						$massage .= "$massage_appear<br>";
					}
					$data['msg'][0] = "error";
					$data['msg'][1] = $massage;
				}else{
					$mysql = "SELECT * FROM books_library where txtid ='$txtid'";
                    $myQry = mysqli_query($koneksi,$mysql);
                    $search = mysqli_num_rows($myQry);
					if ($search == 0){ 
					$mySql = "INSERT INTO books_library (txtid, txtname_books , txt_author, txtyears, txt_stock)
					    		VALUES ('$txtid','$txtname_books','$txt_author','$txtyears','$txt_stock')";
					$data['msg'][0] = "ok";
					$data['msg'][1] = "Data successfully added . . . . . . . .";
					$myQry = mysqli_query($koneksi, $mySql);
					} else {
					$mySql = "UPDATE books_library SET 
									  txtid='$txtid',
									  txtname_books='$txtname_books',
									  txt_author='$txt_author',
									  txtyears='$txtyears',
									  txt_stock='$txt_stock'
								WHERE txtid='$txtid'";
				    $data['msg'][0] = "ok";
				    $data['msg'][1] = "Data successfully changed . . . . . . .";
				    
					}
				    $myQry = mysqli_query($koneksi, $mySql);
				}
			echo json_encode($data);
		break;

		case 2:
				$txtid			=	$_REQUEST['txtid'];
				$mysql = "DELETE FROM books_library WHERE txtid='".$txtid."'";
				$myQry = mysqli_query($koneksi, $mysql);
				if (!$myQry){
					$data['msg'][0]	= "delete";
					$data['msg'][1] = "<b>Error:<\b> ".mysqli_error($koneksi);
				} else {
					 $data['msg'][0] = "delete";
					 $data['msg'][1] = "Data successfully deleted . . . . . . .";
				}
				echo json_encode($data);
				break;

		case 97:
				$mySql = "SELECT * FROM books_library";
				$myQry = mysqli_query($koneksi, $mySql);
				$i=0;
				$data="";
				while ($myData = mysqli_fetch_array($myQry)) {
					$akses="";
						$akses ="<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href='#' class='tooltip-error' data-rel='tooltip' title='hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center> ";
					$data.= sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
								$i+1,$myData['txtid'],$myData['txtname_books'],$myData['txt_author'],$myData['txtyears'],$myData['txt_stock'],$akses);
					$i++;
				}
				echo '{"data":['.substr($data,0,-1).']}';
		break;
		default:

	}

?>