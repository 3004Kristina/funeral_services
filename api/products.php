<?php

require \dirname(__DIR__) . '/vendor/autoload.php';

use Medoo\Medoo;

$file = \dirname(__DIR__) . '/data.db';
$database = new Medoo([
    'database_type' => 'sqlite',
    'database_file' => $file,
]);

$sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'id';
$sortOrder = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

$where = [
    'ORDER' => [$sortBy => $sortOrder],
    'LIMIT' => [$offset, $limit],
];

if (isset($_GET['filter']['price_from']) && is_numeric($_GET['filter']['price_from'])) {
    $where['AND']['price[>=]'] = (int) $_GET['filter']['price_from'];
}

if (isset($_GET['filter']['price_to']) && is_numeric($_GET['filter']['price_to'])) {
    $where['AND']['price[<=]'] = (int) $_GET['filter']['price_to'];
}

if (isset($_GET['filter']['sizes']) && \is_array($_GET['filter']['sizes'])) {
    foreach ($_GET['filter']['sizes'] as $size) {
        if (\is_numeric($size)) {
            $where['AND']["sizes[~] #size {$size}"] = "\"{$size}\"";
        }
    }
}

$products = $database->select('products', [
    'id',
    'name',
    'description',
    'price',
    'picture',
    'sizes',
], $where);

\header('Content-Type: application/json; charset=UTF-8');

echo \json_encode(\array_map(static function ($product) {
    return [
        'id' => (int) $product['id'],
        'name' => $product['name'],
        'description' => $product['description'],
        'price' => (float) $product['price'],
        'picture' => $product['picture'],
        'sizes' => \json_decode($product['sizes']),
    ];
}, $products));
