<?php 
    //https://www.w3resource.com/php-exercises/php-array-exercises.php
  
    /*1.
    $color = array('white', 'green', 'red', 'blue', 'black');
    Write a script which will display the following string - Go to the editor
    "The memory of that scene for me is like a frame of film forever frozen at that moment: the red carpet, the green lawn, the white house, the leaden sky. The new president and his first lady. - Richard M. Nixon"
    and the words 'red', 'green' and 'white' will come from $color.  
    */
    $color = array('white', 'green', 'red', 'blue', 'black');
    echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the $color[2] carpet, the $color[1] lawn, the $color[0] house, the leaden sky. The new president and his first lady. - Richard M. Nixon";
 
    /*2. 
    $color = array('white', 'green', 'red'') Go to the editor
    Write a PHP script which will display the colors in the following way :
    Output :
    white, green, red,

    <li>green</li>
    <li>red</li>
    <li>white</li>
    */
    $color = array('white', 'green', 'red');
    for($i = 0; $i < count($color); $i++){
        echo "$color[$i], ";
    }
    sort($color);
    echo "<ul>";
    for($i = 0; $i < count($color); $i++){
        echo "<li>$color[$i]</li>";
    }
    echo "</ul>";

    /* 
    3. $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");

    Create a PHP script which displays the capital and country name from the above array $ceu. Sort the list by the capital of the country. Go to the editor

    Sample Output :
    The capital of Netherlands is Amsterdam 
    The capital of Greece is Athens 
    The capital of Germany is Berlin
    */
    $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");
    $capitals = [];
    foreach($ceu as $key=>$value){
        array_push($capitals, $ceu[$key]);
    }
    array_multisort($ceu, SORT_ASC, $capitals);
    foreach($ceu as $key=>$value){
        echo "The capital of " .$key. " is $value<br>";
    }

    /*
    18. Write a PHP function to floor decimal numbers with precision. Go to the editor
    Note: Accept three parameters number, precision, and $separator
    Sample Data :
    1.155, 2, "."
    100.25781, 4, "."
    -2.9636, 3, "."

    Expected Output :
    1.15
    100.2578
    -2.964
    */
    $sample1 = 1.155;
    $sample2 = 100.25781;
    $sample3 = -2.9636;

    function floorNum($num, $precision, $separator){
        $precision = $precision;
        $numToString = strval($num);
        $stringToArray = explode(".", $numToString);
        $temp = $stringToArray[1];
        $stringToArray[1] = substr($stringToArray[1], 0, $precision);
        if((substr($stringToArray[1], 0, strlen($temp) - strlen($stringToArray[1])) > 5) && (strlen($temp % 2 != 0))){
            $aug = (substr($stringToArray[1], -1) + 1);
            $stringToArray[1] = rtrim($stringToArray[1], substr($stringToArray[1], -1));
            $stringToArray[1] .= $aug;
        } 
        elseif((substr($stringToArray[1], 0, strlen($temp) - strlen($stringToArray[1])+1) > 5) && (strlen($temp % 2 == 0))){ //fix this
        	$aug = (substr($stringToArray[1], -1));
            $stringToArray[1] = rtrim($stringToArray[1], substr($stringToArray[1], -1));
            $stringToArray[1] .= $aug;
        }
        $result = implode($separator, $stringToArray);
        if($precision == 0){
            echo $result[0];
        }
        else
            echo $result;
    }

    floorNum($sample1, 2, ",");
    echo "<br>";
    floorNum($sample2, 4, ".");
    echo "<br>";
    floorNum($sample3, 3, ".");
?>
