/* Title: Distance Between Two Cities
Difficulty: 7
Description: Ask the user for latitude/longitude coordinates for two given cities and calculate the
distance between those two cities in either miles or kilometers.
Tips: The world is not flat! To make things simpler, use formulae that doesn’t take into account
ellipsoidal effects. So the recommendation below is based on a spherical Earth to make things
easier. First stop to help solve this problem is the Haversine formula on Wikipedia. This formula
can be used to calculate the distance between two points. Simply plug in the latitude and
longitude and the radius of the Earth (around 6,371 km). Be sure to test with points you know
the distance between and can easily look up. This will let you know if you are in the right ball
park with your results.
Added Difficulty: Implement the Spherical Law of Cosines to get distances much more accurate
and possibly down to around 1 meter.
*/
<?php
    $R = 6371000; //Earth radius in meters
    $Rome = ["lat" => 41.893056, "lon" => 12.482778];
    $Oslo = ["lat" => 59.911111, "lon" => 10.752778];

    function degrees_to_radians($phi1, $lambda1, $phi2, $lambda2) { //[phi = latitude, lambda = longitude] (in degrees)
        $degrees = [$phi1, $lambda1, $phi2, $lambda2];
        $radians = [];
        for ($i = 0; $i < count($degrees); $i++) {
            $radians[$i] = $degrees[$i] * (pi() / 180);
        }
        return $radians;
    }

    function haversine($radians) { //haversine formula
        global $R;
        $a = pow(sin((max($radians[0], $radians[2]) - min($radians[0], $radians[2])) / 2), 2) + cos($radians[0]) * cos($radians[2]) * pow(sin((max($radians[1], $radians[3]) - min($radians[1], $radians[3])) / 2), 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $R * $c;
        echo $distance / 1000;
    }

    function sph_law_cos($radians) { //spherical law of cosines
        global $R;
        $distance = acos(sin($radians[0]) * sin($radians[2]) + cos($radians[0]) * cos($radians[2]) * cos((max($radians[0], $radians[2]) - min($radians[0], $radians[2])))) * $R;
        echo $distance / 1000;
    }

    echo "<h1>Distance between two locations (in km)</h1>";
    echo "Method - haversine formula: ";
    haversine(degrees_to_radians($Rome["lat"], $Rome["lon"], $Oslo["lat"], $Oslo["lon"]));
    echo "<br>";
    echo "Method - spherical law of cosines: ";
    sph_law_cos(degrees_to_radians($Rome["lat"], $Rome["lon"], $Oslo["lat"], $Oslo["lon"]));
?>
