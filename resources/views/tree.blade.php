<?php 
// created the data structure to hold the tree.
// representing each lower part as next selection
 $array = [
    'A' => [
        '2' => '2',
        '4' => '4',
        '6' => '6'
        ],
    'B' => [
        '1' => 'Option 1',
        '3' => 'Option 3',
        '10' => [
            '70' => 'Option 70',
            'PI' => [
                'Test' => 'Option Test',
                'Foo' => 'Option Foo',
                'Bar' => 'Option Bar'
            ],
            'Segma' => 'Option Segma'
        ]
    ],
    "C" => [
        '50' => 'Option 50',
        '60' => [
            'Alpha' => 'Option Alpha',
            '3'=> 'option 3',
            'Zeta' => 'option Zeta'
            ],
        '70' => 'Option 70'

            ]
        ];

// // first rough idea.
// function tree(){
    
//     $select ='<label for="color">Tree Option:</label>
//     <select name="color" id="color">';

//     $select .='
//         <option value="">--- Choose a color ---</option>
//         <option value="red"> A </option>
//         <option value="green"> B </option>
//         <option value="blue"> C </option>
//     </select>';
//     return $select;
// }
function generateSelectBoxes($array, $level = 0) {
    $select = '<select class="select-box" data-level='.$level.'>
            <option value="">Select Option</option>';
        // possilbe if statment could bring me far.
        $select2 = '<select class="select-box" data-level=1>
            <option value="">Select Option</option>';
            $select3 = '<select class="select-box" data-level=2>
            <option value="">Select Option</option>';
                $select4 = '<select class="select-box" data-level=2>
                <option value="">Select Option</option>';
    foreach ($array as $key => $value) {
        // echo '<pre>'; var_dump($value); echo '</pre>';
        // print_r($value);
        // print_r($key);
        // trouble understanding wy it can't be formed in 1 line.
        // $select .= '<option value="' . $key . '" ' . $select . '>' . $key . '</option>';
        $select .= '<option value='.$key.'>';
        $select .= $key;
        $select .='</option>';
        // print_r($key);
    
        foreach ($array[$key] as $lvl1 => $lvl1_val) {
            // echo '<pre>'; var_dump($array[$key]); echo '</pre>';
            $select2 .= '<option value='.$lvl1.'>';
            $select2 .= $lvl1;
            $select2 .='</option>';


            if(is_array($array[$key][$lvl1])){
                foreach ($array[$key][$lvl1] as $lvl2 => $lvl2_val) {
                    // echo '<pre>'; var_dump($array[$key]); echo '</pre>';
                    $select3 .= '<option value='.$lvl2.'>';
                    $select3 .= $lvl2;
                    $select3 .='</option>';

                    if(is_array($array[$key][$lvl1][$lvl2])){
                        foreach ($array[$key][$lvl1][$lvl2] as $lvl3 => $lvl3_val) {
                            // echo '<pre>'; var_dump($array[$key]); echo '</pre>';
                            $select4 .= '<option value='.$lvl3.'>';
                            $select4 .= $lvl3;
                            $select4 .='</option>';
                            
                        }
                    }
                }
            }
             

        }

    
    }
    
    // print_r($array["B"][10]);
    $select .= "</select>";
    $select2 .= "</select>";
    $select3 .= "</select>";
    $select4 .= "</select>";
    echo $select;
    echo $select2;
    echo $select3;
    echo $select4;
    
//    return $select;
}

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Matrixian</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    </head>
    <body class="antialiased">
    <div><a href="/">Home</a> 
        <hr/>
   
         
        <h1> assingment</h1>
        <p> 
        <?php
        // echo '<pre>'; var_dump($array); echo '</pre>';
        echo generateSelectBoxes($array);
        ?>
        </p>
        
       

    </body>
</html>
