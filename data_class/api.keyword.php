<?php

session_start();
include_once "koneksi.php";
$type		=		$_REQUEST['type'];

switch ($type)
		{
			case 1 :
			$txt_id		    	=		$_REQUEST['txt_id'];
			$txt_name_class		=		$_REQUEST['txt_name_class'];
			$txt_name_subjects	=		$_REQUEST['txt_name_subjects'];
			$txtnip_teachers	=		$_REQUEST['txtnip_teachers'];
			$txtdays			=		$_REQUEST['txtdays'];
			$txt_startclass		=		$_REQUEST['txt_startclass'];
			$txt_endclass		=		$_REQUEST['txt_endclass'];

			if (empty($txtid)) {
			$mySql = "SELECT * FROM data_class_school WHERE txt_id ='".$txt_id."'";
			} else {
			$mySql = "SELECT * FROM data_class_school WHERE txtbrdt ='".$txt_startclass."' AND NOT (txt_id='".$txt_id."')";
			}

				$massageError = array();
				if (empty($txt_id)){
					$massageError[] = "Sorry, <b>ID_Class </b> can not be empty!";
				}	
				if (empty($txt_name_class)){
					$massageError[] = "Sorry, <b>Name_Class </b> can not be empty!";
				}
				if (empty($txt_name_subjects)){
					$massageError[] = "Sorry, <b>Name_Subjects </b> can not be empty!";
				}
				if (empty($txtnip_teachers)){
					$massageError[] = "Sorry, <b>Name_Teachers </b> can not be empty!";
				}
				if (empty($txtdays)){
					$massageError[] = "Sorry, <b>Days </b> can not be empty!";
				}
				if (empty($txt_startclass)){
					$massageError[] = "Sorry, <b>Start_Class </b> can not be empty!";
				}
				if (empty($txt_endclass)){
					$massageError[] = "Sorry, <b>End_Class </b> can not be empty!";
				}
				if (count($massageError)>=1){
					$massage="";
					foreach ($massageError as $massage_appear) {
						$massage .= "$massage_appear<br>";
					}
					$data['msg'][0] = "error";
					$data['msg'][1] = $massage;
				}else{
					$mysql = "SELECT * FROM data_class_school where txt_id ='$txt_id'";
                    $myQry = mysqli_query($koneksi,$mysql);
                    $search = mysqli_num_rows($myQry);
					if ($search == 0){ 
					$mySql = "INSERT INTO data_class_school (txt_id, txt_name_class, txt_name_subjects, txtnip_teachers, txtdays, txt_startclass, txt_endclass)
					    		VALUES ('$txt_id','$txt_name_class','$txt_name_subjects','$txtnip_teachers','$txtdays','$txt_startclass','$txt_endclass')";
					$data['msg'][0] = "ok";
					$data['msg'][1] = "Data successfully added . . . . . . . .";
					$myQry = mysqli_query($koneksi, $mySql);
					}
				    $myQry = mysqli_query($koneksi, $mySql);
				}
			echo json_encode($data);
		break;

		case 2:
				$txt_id =	$_REQUEST['txt_id'];
				$mysql = "DELETE FROM data_class_school	 WHERE txt_id='".$txt_id."'";
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
				$mySql = "SELECT a.*, b.txtname from data_class_school a left join teachers b on a.txtnip_teachers=b.txtnip";
				$myQry = mysqli_query($koneksi, $mySql);
				$i=0;
				$data="";
				while ($myData = mysqli_fetch_array($myQry)) {
					$akses="";
						$akses ="<center> <a href='#' class='tooltip-error' data-rel='tooltip' title='hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center> ";
					$data.= sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
								$i+1,$myData['txt_id'],$myData['txt_name_class'],$myData['txt_name_subjects'],$myData['txtname'],$myData['txtdays'],$myData['txt_startclass'],$myData['txt_endclass'],$akses);
					$i++;
				}
				echo '{"data":['.substr($data,0,-1).']}';
		break;
		default:

	}

?>