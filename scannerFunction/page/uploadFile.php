<?php
header('Content-Type: text/html; charset=UTF-8');
mysqli_query("set session character_set_connection=utf8;");
mysqli_query("set session character_set_results=utf8;");
mysqli_query("set session character_set_client=utf8;");
date_default_timezone_set("Asia/Seoul");

if(file_exists($_FILES['myfile']['tmp_name']) || is_uploaded_file($_FILES['myfile']['tmp_name']) || file_exists($_FILES['myfile2']['tmp_name']) || is_uploaded_file($_FILES['myfile2']['tmp_name']) || file_exists($_FILES['myfile3']['tmp_name']) || is_uploaded_file($_FILES['myfile3']['tmp_name']) || file_exists($_FILES['myfile4']['tmp_name']) || is_uploaded_file($_FILES['myfile4']['tmp_name'])) {
	// 설정
	$uploads_dir = './uploads';
	$allowed_ext = array('hwp','xls','doc','xlsx','docx','pdf','txt','ppt','pptx','csv');
	
	// 변수 정리
	$error = $_FILES['myfile']['error'];
	$name = $_FILES['myfile']['name'];
	$ext = array_pop(explode('.', $name));
	
	$error2 = $_FILES['myfile2']['error'];
	$name2 = $_FILES['myfile2']['name'];
	$ext2 = array_pop(explode('.', $name2));

	$error3 = $_FILES['myfile3']['error'];
	$name3 = $_FILES['myfile3']['name'];
	$ext3 = array_pop(explode('.', $name3));
	
	$error4 = $_FILES['myfile4']['error'];
	$name4 = $_FILES['myfile4']['name'];
	$ext4 = array_pop(explode('.', $name4));

	$check = true;

	// 오류 확인
	/*
	if( $error != UPLOAD_ERR_OK || $error2 != UPLOAD_ERR_OK || $error3 != UPLOAD_ERR_OK || $error4 != UPLOAD_ERR_OK) {
		$imgMsg = "Part1 : ";
		switch( $error ) {
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				$imgMsg .= "파일이 너무 큽니다. ($error)";
				break;
			//case UPLOAD_ERR_NO_FILE:
				//$imgMsg .= "파일이 첨부되지 않았습니다. ($error)";
				//break;
			default:
				$imgMsg .= "파일이 제대로 업로드되지 않았습니다. ($error)";
		}
		$imgMsg .= "\\nPart2 : ";
		switch( $error2 ) {
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				$imgMsg .= "파일이 너무 큽니다. ($error2)";
				break;
			//case UPLOAD_ERR_NO_FILE:
				//$imgMsg .= "파일이 첨부되지 않았습니다. ($error2)";
				//break;
			default:
				$imgMsg .= "파일이 제대로 업로드되지 않았습니다. ($error2)";
		}
		$imgMsg .= "\\nPart3 : ";
		switch( $error3 ) {
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				$imgMsg .= "파일이 너무 큽니다. ($error3)";
				break;
			//case UPLOAD_ERR_NO_FILE:
				//$imgMsg .= "파일이 첨부되지 않았습니다. ($error3)";
				//break;
			default:
				$imgMsg .= "파일이 제대로 업로드되지 않았습니다. ($error3)";
		}
		$imgMsg .= "\\nPart4 : ";
		switch( $error4 ) {
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				$imgMsg .= "파일이 너무 큽니다. ($error3)";
				break;
			//case UPLOAD_ERR_NO_FILE:
				//$imgMsg .= "파일이 첨부되지 않았습니다. ($error3)";
				//break;
			default:
				$imgMsg .= "파일이 제대로 업로드되지 않았습니다. ($error3)";
		}
		//echo "<script>alert('".$msg."');</script>";
		//echo "<script>histroy.go(-1);</script>";
		//exit;
		$imgMsg .= "\\n";
		$check = false;
	}
	*/
	// 확장자 확인
	if( $name != "" && !in_array($ext, $allowed_ext) ) {
		$imgMsg .= "Part1 : 허용되지 않는 확장자 입니다.";
		//echo "<script>alert('Part1 : 허용되지 않는 확장자입니다.');</script>";
		//echo "<script>window.histroy.go(-1);</script>";
		//exit;
		$check = false;
	}

	if( $name2 != "" && !in_array($ext2, $allowed_ext) ) {
		$imgMsg .= "\\nPart2 : 허용되지 않는 확장자 입니다.";
		//echo "<script>alert('Part2 : 허용되지 않는 확장자입니다.'); history.go(-1);</script>";
		//echo "<script>window.histroy.go(-1);</script>";
		//exit;
		$check = false;
	}

	if( $name3 != "" && !in_array($ext3, $allowed_ext) ) {
		$imgMsg .= "\\nPart3 : 허용되지 않는 확장자 입니다.";
		//echo "<script>alert('Part2 : 허용되지 않는 확장자입니다.'); history.go(-1);</script>";
		//echo "<script>window.histroy.go(-1);</script>";
		//exit;
		$check = false;
	}

	if( $name4 != "" && !in_array($ext4, $allowed_ext) ) {
		$imgMsg .= "\\nPart4 : 허용되지 않는 확장자 입니다.";
		//echo "<script>alert('Part2 : 허용되지 않는 확장자입니다.'); history.go(-1);</script>";
		//echo "<script>window.histroy.go(-1);</script>";
		//exit;
		$check = false;
	}

	if($check == false) {
		echo "<script>alert('파일 업로드에 에러가 발생 하였습니다.\\n".$imgMsg."'); window.close();</script>";
		exit;
	}
	
	else {
		$name = "근태처리원_양식.".$ext;
		$name2 = "지출결의서_양식.".$ext2;
		$name3 = "OrangeIT_연락처.".$ext3;
		$name4 = "test.txt";
		// 파일 이동
		move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");
		move_uploaded_file( $_FILES['myfile2']['tmp_name'], "$uploads_dir/$name2");
		move_uploaded_file( $_FILES['myfile3']['tmp_name'], "$uploads_dir/$name3");
		move_uploaded_file( $_FILES['myfile4']['tmp_name'], "$uploads_dir/$name4");
	
		echo "<script>alert('파일 업로드를 완료 하였습니다.\\n".$imgMsg."'); window.close();</script>";
	}
}
?>