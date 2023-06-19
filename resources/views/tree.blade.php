<?php 
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
        '50' => 50,
        '60' => [
            'Alpha' => 'Option Alpha',
            '3'=> 'option 3',
            'Zeta' => 'option Zeta'
            ],
        '70' => 'Option 70'

            ]
        ];
function tree(){
    
    $select ='<label for="color">Tree Option:</label>
    <select name="color" id="color">';

    $select .='
        <option value="">--- Choose a color ---</option>
        <option value="red"> A </option>
        <option value="green"> B </option>
        <option value="blue"> C </option>
    </select>';
    return $select;
}
function generateSelectBoxes($array, $level = 0) {
    $select = '<select class="select-box" data-level='.$level.'>
            <option value="">Select Option</option>';
        // possilbe if statment could bring me far.
    foreach ($array as $key => $value) {
        echo '<pre>'; var_dump($value); echo '</pre>';
        // print_r($value);
        // print_r($key);
        $select .= '<option value='.$key.'>';
        $select .= $key;
        $select .='</option>';
       
    }

   $select .= "</select>";

   return $select;
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
