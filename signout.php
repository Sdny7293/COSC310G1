<?php
foreach($_COOKIE as $key=>$val){
    setcookie($key,"",time()-3600);
}
exit("<script>
        alert('Sign Out Successfully');
        location.href='login.html';
        </script>");
?>