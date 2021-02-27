<?php

session_start();
include_once "koneksi.php";
$type		=		$_REQUEST['type'];

switch ($type)
		{
			case 1 :
			$txtnis		    	=		$_REQUEST['txtnis'];
			$txtname			=		$_REQUEST['txtname'];
			$txtgender			=		$_REQUEST['txtgender'];
			$txtmajors			=		$_REQUEST['txtmajors'];
			$txtcontact			=		$_REQUEST['txtcontact'];
			$txtemail			=		$_REQUEST['txtemail'];
			$txtaddress			=		$_REQUEST['txtaddress'];

			if (empty($txtnis)) {
			$mySql = "SELECT * FROM students WHERE txtnis ='".$txtnis."'";
			} else {
			$mySql = "SELECT * FROM students WHERE txtcontact ='".$txtcontact."' AND NOT (txtnis='".$txtnis."')";
			}

				$massageError = array();
				if (empty($txtnis)){
					$massageError[] = "Sorry, <b>NIS </b> can not be empty!";
				}	
				if (empty($txtname)){
					$massageError[] = "Sorry, <b>Name </b> can not be empty!";
				}
				if (empty($txtgender)){
					$massageError[] = "Sorry, <b>Gender </b> can not be empty!";
				}
				if (empty($txtmajors)){
					$massageError[] = "Sorry, <b>Majors </b> can not be empty!";
				}
				if (empty($txtcontact)){
					$massageError[] = "Sorry, <b>Contact </b> can not be empty!";
				}
				if (empty($txtemail)){
					$massageError[] = "Sorry, <b>EMAIL </b> can not be empty!";
				}
				if (empty($txtaddress)){
					$massageError[] = "Sorry, <b>Address </b> can not be empty!";
				}
				if (count($massageError)>=1){
					$massage="";
					foreach ($massageError as $massage_appear) {
						$massage .= "$massage_appear<br>";
					}
					$data['msg'][0] = "error";
					$data['msg'][1] = $massage;
				}else{
					$mysql = "SELECT * FROM students where txtnis ='$txtnis'";
                    $myQry = mysqli_query($koneksi,$mysql);
                    $search = mysqli_num_rows($myQry);
					if ($search == 0){ 
					$mySql = "INSERT INTO students (txtnis, txtname, txtgender, txtmajors, txtcontact, txtemail, txtaddress)
					    		VALUES ('$txtnis','$txtname','$txtgender','$txtmajors','$txtcontact','$txtemail','$txtaddress')";
					$data['msg'][0] = "ok";
					$data['msg'][1] = "Data successfully added . . . . . . . .";
					$myQry = mysqli_query($koneksi, $mySql);
					} else {
					$mySql = "UPDATE students SET 
									  txtnis='$txtnis',
									  txtname='$txtname',
									  txtgender='$txtgender',
									  txtmajors='$txtmajors',
									  txtcontact='$txtcontact',
									  txtemail='$txtemail',
									  txtaddress='$txtaddress'
								WHERE txtnis='$txtnis'";
				    $data['msg'][0] = "ok";
				    $data['msg'][1] = "Data successfully changed . . . . . . .";
				    
					}
				    $myQry = mysqli_query($koneksi, $mySql);
				}
			echo json_encode($data);
		break;

		case 2:
				$txtnis			=	$_REQUEST['txtnis'];
				$mysql = "DELETE FROM students WHERE txtnis='".$txtnis."'";
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
				$mySql = "SELECT * FROM students";
				$myQry = mysqli_query($koneksi, $mySql);
				$i=0;
				$data="";
				while ($myData = mysqli_fetch_array($myQry)) {
					$akses="";
						$akses ="<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href='#' class='tooltip-error' data-rel='tooltip' title='hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center> ";
					$data.= sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
								$i+1,$myData['txtnis'],$myData['txtname'],$myData['txtgender'],$myData['txtmajors'],$myData['txtcontact'],$myData['txtemail'],$myData['txtaddress'],$akses);
					$i++;
				}
				echo '{"data":['.substr($data,0,-1).']}';
		break;
		default:

	}

?>