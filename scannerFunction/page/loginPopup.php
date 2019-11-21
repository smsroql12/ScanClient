<?php
    include "dbconfig.php";
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <script src="assets/js/jquery-2.1.3.min.js"></script>
        <style>
            h3 {
                text-align: center;
            }
            label {
                display: block;
            }
            span {
                display: inline-block;
            }
            input[type=text], input[type=password] {
                width: 230px;
            }
            .btn {
                margin: 10px auto;
                text-align: center;
            }
            input[type=submit] {
                width: 100px;
                height: 50px;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#userid").focus(); 
            });
            
        </script>
</head>
<body>
    <h3>관리자 로그인</h3>
    <form action="loginCheck.php" method="post">
        <fieldset>
        <label><span style="margin-right: 22px;">ID</span><input type="text" id="userid" name="username" placeholder="ID" style="margin-bottom: 15px;"/><label>
        <label><span style="margin-right: 14px;">PW</span><input type="password" id="pwd" name="pass" placeholder="Password"/></label>
        </fieldset>

        <div class="btn"><input type="submit" value="로그인"/></div>
    </form>
</body>
</html>