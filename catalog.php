<?php require __DIR__ . '/.header.php'; ?>

<!--SECTION CATALOG PAGE CONTENT START-->
<section class="catalog_page_content_wrapper">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a href="#" class="active">Каталог товаров</a></li>
        </ul>
        <h2>ВЕНКИ</h2>
        <div class="catalog_page_content">
            <select name="sort">
                <option value="">Сортировать по ...</option>
                <option value="price">Цена, от меньшего к большему</option>
                <option value="-price">Цена, от большему к меньшего</option>
                <option value="name">По алфавиту, от А до Я</option>
                <option value="-name">По алфавиту, от Я до А</option>
            </select>

            <ul id="product-list"></ul>
        </div>
    </div>
</section>
<!--SECTION CATALOG PAGE CONTENT END-->

<?php require __DIR__ . '/.footer.php'; ?>
