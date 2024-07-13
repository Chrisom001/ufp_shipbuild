<?php
if (isset($_POST['value'])) {
    $value = $_POST['value'];

    $options = [
        1 => [
            '1-1' => 'Option 1-1',
            '1-2' => 'Option 1-2',
            '1-3' => 'Option 1-3'
        ],
        2 => [
            '2-1' => 'Option 2-1',
            '2-2' => 'Option 2-2',
            '2-3' => 'Option 2-3'
        ],
        3 => [
            '3-1' => 'Option 3-1',
            '3-2' => 'Option 3-2',
            '3-3' => 'Option 3-3'
        ]
    ];

    if (array_key_exists($value, $options)) {
        foreach ($options[$value] as $key => $text) {
            echo "<option value=\"$key\">$text</option>";
        }
    } else {
        echo "<option value=\"\">No options available</option>";
    }
}
?>