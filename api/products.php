<?php

require \dirname(__DIR__) . '/vendor/autoload.php';

use Medoo\Medoo;

$file = \dirname(__DIR__) . '/data.db';
$database = new Medoo([
    'database_type' => 'sqlite',
    'database_file' => $file,
]);

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$sortBy = \trim($sort, '-');
$sortOrder = \strpos($sort, '-') === 0 ? 'DESC' : 'ASC';

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 12;
$offset = $limit * ($page - 1);

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

$items = \array_map(static function ($product) {
    return [
        'id' => (int) $product['id'],
        'name' => $product['name'],
        'description' => $product['description'],
        'price' => (float) $product['price'],
        'picture' => $product['picture'],
        'sizes' => \json_decode($product['sizes']),
    ];
}, $database->select('products', ['id', 'name', 'description', 'price', 'picture', 'sizes'], $where));

$totalWhere = $where;

unset($totalWhere['ORDER'], $totalWhere['LIMIT']);

$total = $database->count('products', $totalWhere);

\header('Content-Type: application/json; charset=UTF-8');

echo \json_encode([
    'items' => $items,
    'total' => $total,
    'page' => $page,
    'page_count' => \ceil($total / $limit),
]);
