<?php

require \dirname(__DIR__) . '/vendor/autoload.php';

use Medoo\Medoo;

$file = \dirname(__DIR__) . '/data.db';
$database = new Medoo([
    'database_type' => 'sqlite',
    'database_file' => $file,
]);

$database->drop('products');
$database->create('products', [
    'id' => [
        'INT',
        'NOT NULL',
        'PRIMARY KEY',
    ],
    'name' => [
        'VARCHAR(255)',
        'NOT NULL',
    ],
    'description' => [
        'TEXT',
        'NULL',
    ],
    'price' => [
        'REAL',
        'NOT NULL',
    ],
    'picture' => [
        'VARCHAR(255)',
        'NULL',
    ],
    'sizes' => [
        'VARCHAR(255)',
        'NULL',
    ],
]);

/**
 * @param int[]|string[] $array
 *
 * @return int|string
 */
function getRandomElement($array)
{
    $index = \mt_rand(0, \count($array) - 1);

    return $array[$index];
}

function generateName()
{
    $firstNames = [
        'Букет',
        'Цветы',
        'Букетик',
        'Цветочки',
        'Набор цветов',
        'Набор цветочков',
        'Букет цветов',
        'Букет цветочков',
    ];

    $lastNames = [
        'Весна',
        'Лето',
        'Осень',
        'Зима',
        'Для любимой',
        '1 сентября',
        'На свадьбу',
        'Сестре',
        'Маме',
        'Бабушке',
    ];

    return \sprintf(
        '%s «%s»',
        \getRandomElement($firstNames),
        \getRandomElement($lastNames)
    );
}

function generateDescription($name)
{
    return 'Комбинированный с живыми цветами "Стандарт"';
}

function generatePrice()
{
    return \mt_rand(250, 2000) * 10;
}

function generatePicture()
{
    return \getRandomElement([
        '/img/products/01.png',
        '/img/products/02.jpg',
        '/img/products/03.jpg',
        '/img/products/04.png',
        '/img/products/05.png',
        '/img/products/06.jpg',
    ]);
}

function generateSizes()
{
    $sizeRanges = \range(100, 170, 10);

    $sizes = [
        (string) \getRandomElement($sizeRanges),
        (string) \getRandomElement($sizeRanges),
        (string) \getRandomElement($sizeRanges),
        (string) \getRandomElement($sizeRanges),
    ];

    \sort($sizes);

    return \array_values(\array_unique($sizes));
}

for ($id = 1; $id <= 50; ++$id) {
    $name = \generateName();

    $database->insert('products', [
        'id' => $id,
        'name' => $name,
        'description' => \generateDescription($name),
        'price' => \generatePrice(),
        'picture' => \generatePicture(),
        'sizes' => \json_encode(\generateSizes()),
    ]);
}

\chmod($file, 0664);
