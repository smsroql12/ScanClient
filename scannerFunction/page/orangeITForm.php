<?php 
    include "dbconfig.php"; 
    header('Content-Type: text/html; charset=UTF-8');
    mysqli_query("set session character_set_connection=utf8;");
    mysqli_query("set session character_set_results=utf8;");
    mysqli_query("set session character_set_client=utf8;");
    date_default_timezone_set("Asia/Seoul");
    session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: (주)오렌지아이티 통합문서 자료실 ::</title>
    <style>
    @font-face {
        font-family: 'Nanum Gothic', sans-serif;
        src: url("NanumGothic.woff");
    }

    @font-face{
        font-family:ng;
        src:url("NanumGothic.woff");
        src:local(※), url("NanumGothic.woff") format("woff")
    }

    html 
    { 
        background: url('background.svg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        font-family:NanumGothic, '나눔고딕', ng, sans-serif
    }
    body
    {
        text-align: center;
        margin: 0 auto;
    }
    #top {
        text-align: right;
    }
    #top span {
        margin-right: 150px;
        font-size: 15pt;
    }
    #top a:hover {
        color: rgb(45, 11, 238);
        text-decoration: underline;
        cursor: pointer;
    }
    #modify {
        color: rgb(45, 11, 238);
    }
    #modify:hover {
        color: rgb(45, 11, 238);
        text-decoration: underline;
        cursor: pointer;
    }
    #header {
        width: 700px;
        margin: 0 auto;
        display: table;
    }
    #header img {
        width: 300px;
        display: table-cell;
        vertical-align: middle;
    }
    #header label {
        display: table-cell;
        vertical-align: middle;
        color: #fff;
        text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000;
        font-size: 40pt;
    }
    #box
    {
        position: absolute;
        width: 700px;
        height: 700px;
        left: 50%;
        top: 50%;
        margin-left: -350px;
        margin-top: -350px;
        border: #000 solid 1px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        background: #eee;
        text-align:center;
    }
    .inbox {
        background: green;
        height: 330px;
        width: 330px;
        margin: 10px;
        border-radius: 10px;
        cursor: pointer;
    }
    .inbox label {
        float: left;
        text-align: left;
        font-size: 25pt;
        padding: 10px 10px;
        color: #fff;
        font-weight: bold;
    }
    .docName {
        cursor: pointer;
    }
    .punctuality {
        background: #1ea1e6 url('punctuality.png');
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .expenditure {
        background: #8ec21f url('expenditure.png');
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .memberBook {
        background: #e25200 url('memberBook.png');
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    </style>
    <script src="assets/js/jquery-2.1.3.min.js"></script>
</head>
<body>
    <div id="top">
    <span>
        <?php 
            if(isset($_SESSION['userid'])) {
        ?>
        <label>관리자 로그인중</label>
        <a id="modify" onclick='PopupCenter("modifyFile.php","modifyFile","300","310");' style="margin-left: 10px;">파일 수정</a>
        <a href="logOut.php" style="margin-left: 15px;">로그아웃</a>
        <?php
            }
            else {
        ?>
        <a onclick='PopupCenter("loginPopup.php","login","350","200");'>관리자 로그인</a>
        <?php
            }
        ?>

    </span>
</div>
    <div id="header"><img src="logo.png"/><label>통합문서자료실</label></div>
    <div id="box">
        <div class="inbox punctuality">
            <label class="docName">근태처리원 양식<br/>다운로드</label>
        </div>
        <div class="inbox expenditure">
            <label class="docName">지출결의서 양식<br/>다운로드</label>
        </div>
        <div class="inbox memberBook">
            <label class="docName">사내 연락처<br/>다운로드</label>
        </div>
        <div class="inbox">
            
        </div>
    </div>
    <script>
        var isChromium = window.chrome;
        var winNav = window.navigator;
        var vendorName = winNav.vendor;
        var isOpera = typeof window.opr !== "undefined";
        var isIEedge = winNav.userAgent.indexOf("Edge") > -1;
        var isIOSChrome = winNav.userAgent.match("CriOS");


        document.getElementsByClassName('inbox')[0]
        .addEventListener('click', function (event) {
            window.location.assign('uploads/근태처리원_양식.xlsx');
        });


        document.getElementsByClassName('inbox')[1]
        .addEventListener('click', function (event) {
            window.location.assign('uploads/지출결의서_양식.xlsx');
        });

        
        document.getElementsByClassName('inbox')[2]
        .addEventListener('click', function (event) {
            if (isIOSChrome) {
            // is Google Chrome on IOS
            } else if(
                isChromium !== null &&
                typeof isChromium !== "undefined" &&
                vendorName === "Google Inc." &&
                isOpera === false &&
                isIEedge === false
            ) {
                var con_test = confirm("크롬 브라우저의 경우 .csv 확장자가 .xls 로 변환되어\r다운로드 되는 버그가 존재합니다.\r익스플로러, 엣지 등 다른 브라우저를 사용 해 주세요.\r그래도 내려 받으시겠습니까?");
                if(con_test == true){
                    window.location.assign('uploads/OrangeIT_연락처.csv');
                }
                else if(con_test == false){
                    return;
                }
            } else { 
                window.location.assign('uploads/OrangeIT_연락처.csv');
            }
        });

        function PopupCenter(url, title, w, h) {
            // Fixes dual-screen position                         Most browsers      Firefox
            var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
            var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

            var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            var systemZoom = width / window.screen.availWidth;
            var left = (width - w) / 2 / systemZoom + dualScreenLeft
            var top = (height - h) / 2 / systemZoom + dualScreenTop
            var newWindow = window.open(url, title, 'scrollbars=no, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

            // Puts focus on the newWindow
            if (window.focus) newWindow.focus();
        }

    </script>
</body>
</html>