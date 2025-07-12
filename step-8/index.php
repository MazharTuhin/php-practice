<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alternative Syntax</title>
    <style>
        table, tr, td {
            border: 1px solid gray;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    
    <table>
        <?php for ($i = 1; $i <= 8; $i++): ?>
        <tr>
            <?php for ($j = 1; $j <= 10; $j++): ?>
                <td><?php echo $i * $j ?></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>

    <?php
        $fruits = [
            'A' => 'Apple',
            'B' => 'Banana',
            'C' => 'Cherry',
            'D' => 'Date',
            'E' => 'Elderberry',
            'F' => 'Fig',
            'G' => 'Grape',
            'H' => 'Honeydew Melon',
            'J' => 'Jackfruit',
            'K' => 'Kiwi',
            'L' => 'Lemon',
            'M' => 'Mango',
            'N' => 'Nectarine',
            'O' => 'Orange',
            'P' => 'Papaya', 
            'R' => 'Raspberry',
            'S' => 'Strawberry',
            'T' => 'Tamarillo',
            'U' => 'Ugni',
            'W' => 'Watermelon',
            'X' => 'Xigua',
            'Y' => 'Yuzu',
            'Z' => 'Zalacca'
        ];
    ?>

    <h2>A list of fruits (A-Z)</h2>
    <ul>
        <?php foreach ($fruits as $key => $value): ?>
            <li>
                <?php echo "{$key} for {$value}"; ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>