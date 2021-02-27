<?php

session_start();
include_once "koneksi.php";
$type		=		$_REQUEST['type'];

switch ($type)
		{
			case 1 :
			$txtid		    =		$_REQUEST['txtid'];
			$txtbooks		=		$_REQUEST['txtbooks'];
			$txtnis_students	=		$_REQUEST['txtnis_students'];
			$txtbrdt		=		$_REQUEST['txtbrdt'];
			$txtbrlmt		=		$_REQUEST['txtbrlmt'];
			$amt_borrow		=		$_REQUEST['amt_borrow'];

			if (empty($txtid)) {
			$mySql = "SELECT * FROM librarys WHERE txtid ='".$txtid."'";
			} else {
			$mySql = "SELECT * FROM librarys WHERE txtbrdt ='".$txtbrdt."' AND NOT (txtid='".$txtid."')";
			}

				$massageError = array();
				if (empty($txtid)){
					$massageError[] = "Sorry, <b>ID </b> can not be empty!";
				}	
				if (empty($txtbooks)){
					$massageError[] = "Sorry, <b>Books </b> can not be empty!";
				}
				if (empty($txtnis_students)){
					$massageError[] = "Sorry, <b>Name_Students </b> can not be empty!";
				}
				if (empty($txtbrdt)){
					$massageError[] = "Sorry, <b>Dates </b> can not be empty!";
				}
				if (empty($txtbrlmt)){
					$massageError[] = "Sorry, <b>Limit </b> can not be empty!";
				}
				if (empty($amt_borrow)){
					$massageError[] = "Sorry, <b>Amount_borrowing </b> can not be empty!";
				}
				if (count($massageError)>=1){
					$massage="";
					foreach ($massageError as $massage_appear) {
						$massage .= "$massage_appear<br>";
					}
					$data['msg'][0] = "error";
					$data['msg'][1] = $massage;
				}else{
					$mysql = "SELECT * FROM librarys where txtid ='$txtid'";
                    $myQry = mysqli_query($koneksi,$mysql);
                    $search = mysqli_num_rows($myQry);
					if ($search == 0){ 
					$mySql = "INSERT INTO librarys (txtid, txtbooks , txtnis_students, txtbrdt, txtbrlmt, amt_borrow)
					    		VALUES ('$txtid','$txtbooks','$txtnis_students','$txtbrdt','$txtbrlmt','$amt_borrow')";
					$data['msg'][0] = "ok";
					$data['msg'][1] = "Data successfully added . . . . . . . .";
					$myQry = mysqli_query($koneksi, $mySql);
					}
				    $myQry = mysqli_query($koneksi, $mySql);
				}
			echo json_encode($data);
		break;

		case 2:
				$txtid			=	$_REQUEST['txtid'];
				$mysql = "DELETE FROM librarys WHERE txtid='".$txtid."'";
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
				$mySql = "SELECT a.*, b.txtname_books as name_books, c.txtname as name_students from librarys a left join books_library b on a.txtbooks=b.txtid left join students c on a.txtnis_students=c.txtnis";
				$myQry = mysqli_query($koneksi, $mySql);
				$i=0;
				$data="";
				while ($myData = mysqli_fetch_array($myQry)) {
					$akses="";
						$akses ="<center> <a href='#' class='tooltip-error' data-rel='tooltip' title='hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center> ";
					$data.= sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
								$i+1,$myData['txtid'],$myData['name_books'],$myData['name_students'],$myData['txtbrdt'],$myData['txtbrlmt'],$myData['amt_borrow'],$akses);
					$i++;
				}
				echo '{"data":['.substr($data,0,-1).']}';
		break;
		default:

	}

?>