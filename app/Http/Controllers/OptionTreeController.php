<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionTreeController extends Controller
{
    public function showOptionTree()
    {
        $options =  $options = [
            'A' => [
                '2' => 'Option 2',
                '4' => 'Option 4',
                '6' => 'Option 6'
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
            'C' => [
                '50' => 'Option 50',
                '60' => [
                    'Alpha' => 'Option Alpha',
                    '3' => 'Option 3',
                    'Zeta' => 'Option Zeta'
                ],
                '70' => 'Option 70'
            ]
        ];
        return view('option-tree', compact('options'));
    }

    private function generateSelectBox($options, $level)
    {
        $selectBoxOptions = $options[$level];

        return View::make('select-box', compact('selectBoxOptions', 'level'));
    }

    private function generateJavaScript($options, $level)
    {
        $nextLevel = $level + 1;
        $nextSelectBox = 'select[data-level="' . $nextLevel . '"]';
        $currentSelectBox = 'select[data-level="' . $level . '"]';

        $script = "
            <script>
                $(document).ready(function() {
                    $($currentSelectBox).change(function() {
                        var selectedOption = $(this).val();
                        $($nextSelectBox).prop('disabled', true).val('');

                        if (selectedOption !== '') {
                            $($nextSelectBox + ' option').each(function() {
                                var optionValue = $(this).val();
                                var compatibleOptions = " . json_encode($options[$nextLevel]) . ";

                                if (compatibleOptions.hasOwnProperty(optionValue)) {
                                    $(this).prop('disabled', false);
                                }
                            });
                        }
                    });
                });
            </script>
        ";

        return $script;
    }
}