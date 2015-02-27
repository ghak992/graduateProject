<?php

function encrypt_pass($input, $rounds = 10) {

    $salt = "";
    $saltChars = array_merge(range('Z', 'A'), range(23, 68, 4), range('a', 'z'));

    for ($index = 0; $index < 25; $index++) {
        $salt .= $saltChars[array_rand($saltChars)];
    }

    return crypt($input, sprintf('$2y$%02d$', $rounds) . $salt);
}


function decrypt_pass($inpass, $hashpass){
    
    if(crypt($inpass, $hashpass) == $hashpass){
        return TRUE;
    }
    else{
        return FALSE;
    }
}