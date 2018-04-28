<?php
function viewtitle(){
    if($_SERVER['REQUEST_URI']==='/'){
        echo 'Custom Blog';
    }
    elseif (strpos($_SERVER['REQUEST_URI'],'about')){
        echo 'Custom Blog - about';
    }
    elseif (strpos($_SERVER['REQUEST_URI'],"post")){
        echo 'Custom Blog - post';
    }
    elseif (strpos($_SERVER['REQUEST_URI'],"contact")){
        echo 'Custom Blog - contact';
    } else{
        echo 'Custom Blog';
    }
}