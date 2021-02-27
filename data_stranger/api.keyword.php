<?php

session_start();
include_once "koneksi.php";
$type		=		$_REQUEST['type'];

switch ($type)
		{
			case 1 :
			$txt_identity		    =		$_REQUEST['txt_identity'];
			$txtname		=		$_REQUEST['txtname'];
			$txtgender		=		$_REQUEST['txtgender'];
			$txtaddress		=		$_REQUEST['txtaddress'];
			$txtcontact		=		$_REQUEST['txtcontact'];
			$txt_student		=		$_REQUEST['txt_student'];
			$txt_info	=		$_REQUEST['txt_info'];

			if (empty($txt_identity)) {
			$mySql = "SELECT * FROM strangers WHERE txt_identity ='".$txt_identity."'";
			} else {
			$mySql = "SELECT * FROM strangers WHERE txtcontact ='".$txtcontact."' AND NOT (txt_identity='".$txt_identity."')";
			}

				$massageError = array();
				if (empty($txt_identity)){
					$massageError[] = "Sorry, <b>No_identity </b> can not be empty!";
				}	
				if (empty($txtname)){
					$massageError[] = "Sorry, <b>Name </b> can not be empty!";
				}
				if (empty($txtgender)){
					$massageError[] = "Sorry, <b>Gender </b> can not be empty!";
				}
				if (empty($txtaddress)){
					$massageError[] = "Sorry, <b>Address </b> can not be empty!";
				}
				if (empty($txtcontact)){
					$massageError[] = "Sorry, <b>Contact </b> can not be empty!";
				}
				if (empty($txt_student)){
					$massageError[] = "Sorry, <b>School_Origin </b> can not be empty!";
				}
				if (empty($txt_info)){
					$massageError[] = "Sorry, <b>Information </b> can not be empty!";
				}
				if (count($massageError)>=1){
					$massage="";
					foreach ($massageError as $massage_appear) {
						$massage .= "$massage_appear<br>";
					}
					$data['msg'][0] = "error";
					$data['msg'][1] = $massage;
				}else{
					$mysql = "SELECT * FROM strangers where txt_identity ='$txt_identity'";
                    $myQry = mysqli_query($koneksi,$mysql);
                    $search = mysqli_num_rows($myQry);
					if ($search == 0){ 
					$mySql = "INSERT INTO strangers (txt_identity, txtname, txtgender, txtaddress, txtcontact, txt_student, txt_info)
					    		VALUES ('$txt_identity','$txtname','$txtgender','$txtaddress','$txtcontact','$txt_student','$txt_info')";
					$data['msg'][0] = "ok";
					$data['msg'][1] = "Data successfully added . . . . . . . .";
					$myQry = mysqli_query($koneksi, $mySql);
					} else {
					$mySql = "UPDATE strangers SET 
									  txt_identity='$txt_identity',
									  txtname='$txtname',
									  txtgender='$txtgender',
									  txtaddress='$txtaddress',
									  txtcontact='$txtcontact',
									  txt_student='$txt_student',
									  txt_info='$txt_info'
								WHERE txt_identity='$txt_identity'";
				    $data['msg'][0] = "ok";
				    $data['msg'][1] = "Data successfully changed . . . . . . .";
				    
					}
				    $myQry = mysqli_query($koneksi, $mySql);
				}
			echo json_encode($data);
		break;

		case 2:
				$txt_identity			=	$_REQUEST['txt_identity'];
				$mysql = "DELETE FROM strangers WHERE txt_identity='".$txt_identity."'";
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
				$mySql = "SELECT * FROM strangers";
				$myQry = mysqli_query($koneksi, $mySql);
				$i=0;
				$data="";
				while ($myData = mysqli_fetch_array($myQry)) {
					$akses="";
						$akses ="<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href='#' class='tooltip-error' data-rel='tooltip' title='hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center> ";
					$data.= sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
								$i+1,$myData['txt_identity'],$myData['txtname'],$myData['txtgender'],$myData['txtaddress'],$myData['txtcontact'],$myData['txt_student'],$myData['txt_info'],$akses);
					$i++;
				}
				echo '{"data":['.substr($data,0,-1).']}';
		break;
		default:

	}

?>