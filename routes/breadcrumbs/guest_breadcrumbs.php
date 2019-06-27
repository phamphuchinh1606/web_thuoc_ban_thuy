<?php

Breadcrumbs::for('guest.home', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
});

// Home
Breadcrumbs::register('guest.collection', function ($trail, $productType) {
    $trail->parent('guest.home');
    $trail->push("Sản phẩm");
    $trail->push($productType->product_type_name);

});

Breadcrumbs::register('guest.projects', function ($trail, $productType) {
    $trail->parent('guest.home');
    $trail->push("Dự án");
    $trail->push($productType->product_type_name);

});

// Search Product
Breadcrumbs::register('guest.search', function ($trail, $textSearch) {
    $trail->parent('guest.home');
    $trail->push($textSearch);

});

// Product Detail
Breadcrumbs::register('guest.product_detail', function ($trail, $product) {
    $trail->parent('guest.home');
    if($product->project_type_service == '1'){
        $trail->push("Dự án", route('projects'));
    }else{
        $trail->push("Sản phẩm", route('collection_all'));
    }
    $trail->push($product->product_name);

});

// Product Detail
Breadcrumbs::register('guest.project_detail', function ($trail, $product) {
    $trail->parent('guest.home');
    $trail->push("Dự án");
    $trail->push($product->product_name);

});

// Product Detail
Breadcrumbs::register('guest.blog', function ($trail) {
    $trail->parent('guest.home');
    $trail->push('Blog - Tin tức',route('blog'));

});

// Product Detail
Breadcrumbs::register('guest.blog_detail', function ($trail, $blog) {
    $trail->parent('guest.blog');
    $trail->push($blog->blog_title);
});

// Contact
Breadcrumbs::register('guest.contact', function ($trail) {
    $trail->parent('guest.home');
    $trail->push('Liên hệ');

});

//About
Breadcrumbs::register('guest.about', function ($trail) {
    $trail->parent('guest.home');
    $trail->push('Giới thiệu');
});

//Album
Breadcrumbs::register('guest.album', function ($trail) {
    $trail->parent('guest.home');
    $trail->push('Album - Hình Ảnh');
});