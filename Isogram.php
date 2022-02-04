<?php
    function isIsogram($word){
        $word = strtolower($word);

        if(!ctype_alpha($word)){ //check whether word contains non-alphabetic chars
            $alphabetic = preg_replace("/[^a-zA-Z0-9]+/", "", $word); //only keep alphabetic chars
        }
        $counter = 0;
        for($i = 0; $i < strlen($word); $i++){
            if(substr_count($word, $word[$i]) > 1){
                $counter += 1;
            }
            else{
                continue;
            }
        }
        if($counter > 1){
            echo 0;
        }
        else echo 1;
    }

    isIsogram("protoplasm");
?>
