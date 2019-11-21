<?php
    session_start();
    include "dbconfig.php";

    //입력 받은 id와 password
    $id=$_POST['username'];
    $pw=$_POST['pass'];

    //아이디가 있는지 검사
    $query = "SELECT * fROM users WHERE userid='$id'";
    $result = $db->query($query);

    //아이디가 있다면 비밀번호 검사
    if(mysqli_num_rows($result)==1) {
        $row=mysqli_fetch_assoc($result);

        //비밀번호가 맞다면 세션 생성
        if($row['userpass']==$pw){
                $_SESSION['userid'] = $id;
                if(isset($_SESSION['userid'])){
                ?>      
                <script>
                    window.opener.location.reload();
                    window.close();
                </script>
            <?php
                }
                else{
                    ?>
                    <script>
                        alert("세션 생성에 실패 하였습니다.");
                        history.back();
                    </script>
                    <?php
                }
        }
            else {
        ?>          
            <script>
                alert("아이디 혹은 비밀번호가 틀립니다.");
                history.back();
            </script>
        <?php
                }
        }
        else{
?>              
    <script>
        alert("아이디 혹은 비밀번호가 틀립니다.");
        history.back();
    </script>
<?php
        }
?>