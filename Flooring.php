<?php
    /*
    Title: Find Cost of Tile to Cover W x L Floor
    Difficulty: 1
    Description: Ask the user to enter in a width, length and the cost per 1 unit of flooring. Have the
    program calculate how much it would cost to cover the area specified with the flooring.
    Tips: This is a relatively simple program. Be sure to first find out how much area the floor is and
    then multiply that by the cost per unit of flooring. Start with some simple numbers that you can
    quickly calculate in your head. Try a 10 x 10 ft room with each unit of flooring costing $1.00.
    Added Difficulty: Calculate how much flooring would be needed for non-rectangular rooms.
    */
    $rectangle = [10, 5];
    $quadrilateral = [10, 5, 3, 8];
    $angles = [25, 37];
    $costPerUnit = 15;
    $areaPerUnit = 1.624;

    function degrees_to_radians($phi, $lambda) {
        $degrees = [$phi, $lambda];
        $radians = [];
        for ($i = 0; $i < count($degrees); $i++) {
            $radians[$i] = $degrees[$i] * (3.1415926536 / 180);
        }
        return $radians;
    }

    function check_sides($shape) {
        $moreSides1 = $shape[0];
        $moreSides2 = $shape[1];
        global $anglesRad;
        global $anglesRadRectangle;
        $arrayAndAngles = [$shape, $anglesRad];
        $arrayAndAnglesRectangle = [$shape, $anglesRadRectangle];
        if (count($shape) > 2) {
            return $arrayAndAngles;
        }
        else {
            array_push($arrayAndAnglesRectangle[0], $moreSides1);
            array_push($arrayAndAnglesRectangle[0], $moreSides2);
            return $arrayAndAnglesRectangle;
        }
    }

    $anglesRad = degrees_to_radians($angles[0], $angles[1]);
    $anglesRadRectangle = [(3.1415926536 / 2), (3.1415926536 / 2)];

    function bretschneider($array) { //Bretschneider's formula
        $a = $array[0][0]; //length of sides
        $b = $array[0][1];
        $c = $array[0][2];
        $d = $array[0][3];
        $s = 0;
        $s += (($a + $b + $c + $d) / 2); //semiperimeter
        $alpha = $array[1][0];
        $gamma = $array[1][1];
        $sumOfAngles = $array[1][0] + $array[1][1];

        if ($sumOfAngles != 3.1415926536) {
            return sqrt(((($s - $a) * ($s - $b) * ($s - $c) * ($s - $d)) - (($a * $b * $c * $d) * pow(cos(($alpha + $gamma) / 2), 2))));
        }
        elseif (count($array[1]) == 2) {
            return sqrt(($s - $a) * ($s - $b) * ($s - $c) * ($s - $d));
        }
    }

    $areaTotal = bretschneider(check_sides($quadrilateral));

    function calculate_cost_total($areaTotal, $areaPerUnit, $costPerUnit) {
        $costTotal = $areaTotal / $areaPerUnit * $costPerUnit;
        echo $costTotal;
    }

    echo "Cost to cover an area of $areaTotal m^2 if the cost per unit of flooring is $$costPerUnit: $";
    calculate_cost_total($areaTotal, $areaPerUnit, $costPerUnit);
?>