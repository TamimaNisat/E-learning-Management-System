<?php
    $myfile = fopen("text_file/user_email.txt", "w") or die("Unable to open file!");    
    fclose($myfile);

    header( 'Location: index.html');
?>