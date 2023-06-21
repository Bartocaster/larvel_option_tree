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

function generateSelectBoxes($array, $input='', $level = 0) {
    print_r($input);
    echo '<pre>'; var_dump($input); echo '</pre>';
    $select = '<select class="select-box" data-level='.$level.'>
            <option value="">Select Option</option>';
        // possilbe if statment could bring me far.
        $select2 = '<select class="select-box" data-level=1>
            <option value="">Select Option</option>';
            $select3 = '<select class="select-box" data-level=2>
            <option value="">Select Option</option>';
                $select4 = '<select class="select-box" data-level=3>
                <option value="">Select Option</option>';
    
             
    foreach ($array as $key => $value) {
        // echo '<pre>'; var_dump($value); echo '</pre>';
  
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
    // might not have paid enaf attention how they are going to be return.
    // print_r($array["B"][10]);
    $select .= "</select>";
    $select2 .= "</select>";
    $select3 .= "</select>";
    $select4 .= "</select>";
    // was it smart to make this a whole string? no but could figure out in this small time window to make 
    // i got to resue this function to make the parts that habe bin re selected work
    $result = $select.$select2.$select3.$select4;
 
    
   return $result;
}

// so what need to happend next is if option value A got selected it needs to tricle down

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
   <div>
        <a href="/">Home</a>
        <hr/>
        <h1>Assignment</h1>
        <p>
            <?php echo generateSelectBoxes($array); ?>
        </p>
    </div>
    <!-- I haven't done alot of JAVA. can i make this connected in a short time span? 
    OK so if A get selected only 2, 4, 6 should be present.
    -->
    <script>
    const selectBoxes = document.querySelectorAll('.select-box');
    console.log(selectBoxes);
    selectBoxes.forEach((selectBox) => {
        // oke so with this i should have added a eventlister there i should be able te use generateSelectBoxes function to recreated the tree.
        selectBox.addEventListener('change', function() {
            const level = parseInt(this.dataset.level);
            const selectedValue = this.value;
           
            // console.log(level); // this is all the select-boxes
            // console.log(selectedValue); // this is wich one you clicked.
            // console.log(selectBox);// this registrade what you have selected.
            // how am i gonne make a ajax cal here?
            // not sure if i have Jquerry installed.
            if(selectedValue == "A"|| "B" || "C"){
                console.log(selectedValue);
               
            }
            // Disable lower select boxes if no compatible options
            // const lowerSelectBoxes = document.querySelectorAll(`.select-box[data-level > "${level}"]`);
            // lowerSelectBoxes.forEach((select) => {
            //     select.disabled = true;
            //     select.value = '';
            // });

            // // Enable lower select boxes if a compatible option is selected
            // if (selectedValue !== '') {
            //     const nextLevel = level + 1;
            //     const nextSelectBox = document.querySelector(`.select-box[data-level="${nextLevel}"]`);

            //     if (nextSelectBox) {
            //         nextSelectBox.disabled = false;
            //     }
            // }
        });
    });

    </script>
    </body>
</html>
