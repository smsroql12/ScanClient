<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
mysqli_query("set session character_set_connection=utf8;");
mysqli_query("set session character_set_results=utf8;");
mysqli_query("set session character_set_client=utf8;");
date_default_timezone_set("Asia/Seoul");
	if(!isset($_SESSION['userid'])) {
		echo "접근 불가 페이지. 로그인 부탁드립니다.<br/>㈜오렌지아이티";
	}
	else {
?>
<html>
<head>
<style>
	span {
		display: block;
		margin-bottom: 15px;
	}
	input[type=submit] {
		width: 100px;
		height: 50px;
	}
	.btn {
		margin: 10px auto;
		text-align: center;
	}
</style>
<script type="text/javascript">
	function formSubmit(f) {
		if(document.getElementById("upfile").value == "" && document.getElementById("upfile2").value == "" && document.getElementById("upfile3").value == "" && document.getElementById("upfile4").value == "") {
			alert("하나 이상의 파일을 업로드 해 주세요.");
			return false;
		}


		if(document.getElementById("upfile").value != "")	checkData("upfile");
		if(document.getElementById("upfile2").value != "")	checkData("upfile2");
		if(document.getElementById("upfile3").value != "")	checkData("upfile3");
		if(document.getElementById("upfile4").value != "")	checkData("upfile4");
	}

	function checkData(n) {
		var extArray = new Array('hwp','xls','doc','xlsx','docx','pdf','txt','ppt','pptx','csv');
		var path = document.getElementById(n).value;
		if(path == "") {
			alert("파일을 선택해 주세요.");
			return false;
		}

		var pos = path.indexOf(".");
		if(pos < 0) {
			alert("확장자가 없는파일 입니다.");
			return false;
		}

		var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
		var checkExt = false;

		for(var i = 0; i < extArray.length; i++) {
			if(ext == extArray[i]) {
				checkExt = true;
				break;
			}
		}

		if(checkExt == false) {
			alert("업로드 할 수 없는 파일 확장자 입니다.");
			return false;
		}
		return true;
	}
</script>
</head>

<body>
<form name="uploadForm" id="uploadForm" method="post" action="uploadFile.php" 
      enctype="multipart/form-data" onsubmit="return formSubmit(this);">
    <div>
	<span>
        <label for="upfile">근태처리원 양식 업로드</label>
        <input type="file" name='myfile' id="upfile" />
	</span>
	<span>
        <label for="upfile">지출결의서 양식 업로드</label>
        <input type="file" name='myfile2' id="upfile2" />
	</span>
	<span>
        <label for="upfile">사내 연락처 양식 업로드</label>
        <input type="file" name='myfile3' id="upfile3" />
	</span>
	<span>
        <label for="upfile">첨부파일</label>
        <input type="file" name='myfile4' id="upfile4" />
	</span>
    </div>

    <div class="btn"><input type="submit" value="업로드"/></div>
</form>
</body>
</html>
<?php
}
?>