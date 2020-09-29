<?php

    date_default_timezone_set('Europe/Moscow');
    $currentTime = date("H:i:s");
    $start = microtime(true);
    session_start();


    if (!isset($_SESSION["results"])) {
        $_SESSION["results"] = array();
    }
    
    

    if (isset($_GET["x"])) {
        $x = $_GET["x"];
        $y = $_GET["y"];
        $r = $_GET["r"];

        if ($x >= -5 && $x <= 3 && $y > -3 && $y < 5 && $r >= 1 && $r <= 3 && is_numeric($x) && is_numeric($y) && is_numeric($r)) {
            if(triangle($r, $x, $y, $currentTime, $start)){
                // echo "Yes";
                $popadanie = "Пробил";
                $scriptTime = round(microtime(true) - $start, 4).' сек.';
                array_push($_SESSION["results"], array( $x, $y, $r, $popadanie, $currentTime, $scriptTime));
                // echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
                // echo 'Время: '.$currentTime.' сек.';
                
                // echo '<script>window.location.href = "index.php";</script>';
    
            }
            else {
                // echo "nooo";
                if (rectangle($r, $x, $y, $currentTime, $start)){
                    // echo "Yes";
                    $popadanie = "Пробил";
                    $scriptTime = round(microtime(true) - $start, 4).' сек.';
                    array_push($_SESSION["results"], array( $x, $y, $r, $popadanie, $currentTime, $scriptTime));
    
                    // echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
                    // echo 'Время: '.$currentTime.' сек.';
    
    
                    // echo '<script>window.location.href = "index.php?x=$x&y=$y&r=$r";</script>';
    
                }
                else {
                    // echo "nonononon";
                    if (sector($r, $x, $y, $currentTime, $start)) {
                        // echo "Yeeeeeaaaass";
                        $popadanie = "Пробил";
                        $scriptTime = round(microtime(true) - $start, 4).' сек.';
                        array_push($_SESSION["results"], array( $x, $y, $r, $popadanie, $currentTime, $scriptTime));
    
                        // echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
                        // echo 'Время: '.$currentTime.' сек.';
    
    
                        // echo '<script>window.location.href = "index.php?x=$x&y=$y&r=$r";</script>';
                    }
                    else {
                        // echo "NOOOOOOOOO";
                        $popadanie = "Не пробил";
                $scriptTime = round(microtime(true) - $start, 4).' сек.';
                array_push($_SESSION["results"], array( $x, $y, $r, $popadanie, $currentTime, $scriptTime));
    
                        // echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
                    // echo 'Время: '.$currentTime.' сек.';
    
                        // echo '<script>window.location.href = "index.php?x=$x&y=$y&r=$r";</script>';
                    }
                }
            }
            echo "
                    <tr>
            <th>
                <h4>X</h4>
            </th>
            <th>
                <h4>Y</h4>
            </th>

            <th>
                <h4>R</h4>
            </th>

            <th>
                <h4>Есть пробитие?</h4>
            </th>
            <th>
                <h4>Время (МСК)</h4>
            </th>

            <th>
                <h4>Время работы скрипта PHP</h4>
            </th>


            </tr>";

                           
            foreach ($_SESSION["results"] as $results) {
                echo "
                <tr>
                <td>
                <span>$results[0]</span>
                </td>
                <td>
                <span>$results[1]</span>
                </td>
                <td>
                <span>$results[2]</span>
                </td>
                <td>
                <span>$results[3]</span>
                </td>
                <td>
                <span>$results[4]</span>
                </td>
                <td>
                <span>$results[5]</span>
                </td>
                </tr>";
            }
        
        }
        else {
            
                echo "
                ВЫ ВВЕЛИ НЕКОРРЕКТНЫЕ ДАННЫЕ!
        
                ";
                
                                

            
            
            
           
        }   
    }
    
       

        
        
        
    
    



    function sector($r, $x, $y, $currentTime, $start) {
        $x0 = 0;
        $y0 = 0;

        $a = pow(($x - $x0), 2) + pow(($y - $y0), 2);
        $b = pow($r, 2);

        if ($a <= $b && $x >= 0 && $y <= 0){
            return true;
        }
        else{
            return false;
        }
    }


    function rectangle($r, $x, $y, $currentTime, $start) {
        //A
        $x0 = 0;
        $y0 = 0;
        //B
        $x1 = 0;
        $y1 = $r/2;
        //C
        $x2 = $r;
        $y2 = $r/2;
        //D
        $x3 = $r;
        $y3 = 0;

        if ($x >= $x0 && $y >= $y0 && $x <= $x2 && $y <= $y2) {
            return true;
        }
        else {
            return false;
        }
    }
    
    
    

    function triangle($r, $x, $y, $currentTime, $start) {
        //A
        $x1 = -$r;
        $y1 = 0;
        //B
        $x2 = 0;
        $y2 = -$r;
        //C
        $x0 = 0;
        $y0 = 0; 

        
        
        $a = ($x1 - $x) * ($y2 - $y1) - ($x2 - $x1) * ($y1 - $y);
        $b = ($x2 - $x) * ($y3 - $y2) - ($x3 - $x2) * ($y2 - $y);
        $c = ($x0 - $x) * ($y1 - $y0) - ($x1 - $x0) * ($y0 - $y);
        
        if (($a >= 0 && $b >= 0 && $c >= 0) || ($a <= 0 && $b <= 0 && $c <= 0)) {
            return true;
            // echo "Yes";
        }
        else{
            return false;
            // echo "Noo";
        }

        // echo pow($_GET["r"], 2) * 2;
    }
    
?>
                            

