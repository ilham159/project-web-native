<?php

session_start();
include_once "koneksi.php";
$type		=		$_REQUEST['type'];

switch ($type)
		{
			case 1 :
			$txtnip		    	=		$_REQUEST['txtnip'];
			$txtname			=		$_REQUEST['txtname'];
			$txtgender			=		$_REQUEST['txtgender'];
			$txtcontact			=		$_REQUEST['txtcontact'];
			$txtemail			=		$_REQUEST['txtemail'];
			$txtaddress			=		$_REQUEST['txtaddress'];

			if (empty($txtnip)) {
			$mySql = "SELECT * FROM teachers WHERE txtnip ='".$txtnip."'";
			} else {
			$mySql = "SELECT * FROM teachers WHERE txtcontact ='".$txtcontact."' AND NOT (txtnip='".$txtnip."')";
			}

				$massageError = array();
				if (empty($txtnip)){
					$massageError[] = "Sorry, <b>Nip </b> can not be empty!";
				}	
				if (empty($txtname)){
					$massageError[] = "Sorry, <b>Name </b> can not be empty!";
				}
				if (empty($txtgender)){
					$massageError[] = "Sorry, <b>Gender </b> can not be empty!";
				}
				if (empty($txtcontact)){
					$massageError[] = "Sorry, <b>Contact </b> can not be empty!";
				}
				if (empty($txtemail)){
					$massageError[] = "Sorry, <b>Email </b> can not be empty!";
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
					$mysql = "SELECT * FROM teachers where txtnip ='$txtnip'";
                    $myQry = mysqli_query($koneksi,$mysql);
                    $search = mysqli_num_rows($myQry);
					if ($search == 0){ 
					$mySql = "INSERT INTO teachers (txtnip, txtname, txtgender, txtcontact, txtemail, txtaddress)
					    		VALUES ('$txtnip','$txtname','$txtgender','$txtcontact','$txtemail','$txtaddress')";
					$data['msg'][0] = "ok";
					$data['msg'][1] = "Data successfully added . . . . . . . .";
					$myQry = mysqli_query($koneksi, $mySql);
					} else {
					$mySql = "UPDATE teachers SET 
									  txtnip='$txtnip',
									  txtname='$txtname',
									  txtgender='$txtgender',
									  txtcontact='$txtcontact',
									  txtemail='$txtemail',
									  txtaddress='$txtaddress'
								WHERE txtnip='$txtnip'";
				    $data['msg'][0] = "ok";
				    $data['msg'][1] = "Data successfully changed . . . . . . .";
				    
					}
				    $myQry = mysqli_query($koneksi, $mySql);
				}
			echo json_encode($data);
		break;

		case 2:
				$txtnip			=	$_REQUEST['txtnip'];
				$mysql = "DELETE FROM teachers WHERE txtnip='".$txtnip."'";
				$myQry = mysqli_query($koneksi, $mysql);
				if (!$myQry){
					$data['msg'][0]	= "delete";
					$data['msg'][1] = "<b>Error:<\b> ".mysql_error($koneksi);
				} else {
					 $data['msg'][0] = "delete";
					 $data['msg'][1] = "Data successfully deleted . . . . . . .";
				}
				echo json_encode($data);
				break;

		case 97:
				$mySql = "SELECT * FROM teachers";
				$myQry = mysqli_query($koneksi, $mySql);
				$i=0;
				$data="";
				while ($myData = mysqli_fetch_array($myQry)) {
					$akses="";
						$akses ="<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href='#' class='tooltip-error' data-rel='tooltip' title='hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center> ";
					$data.= sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
								$i+1,$myData['txtnip'],$myData['txtname'],$myData['txtgender'],$myData['txtcontact'],$myData['txtemail'],$myData['txtaddress'],$akses);
					$i++;
				}
				echo '{"data":['.substr($data,0,-1).']}';
		break;
		default:

	}

?>