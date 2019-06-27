<?php

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Trang Chủ', route('admin.home'));
});

//Product
Breadcrumbs::for('admin.product', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Sản phẩm', route('admin.product.index'));
});

//Product Crate
Breadcrumbs::for('admin.product.create', function ($trail) {
    $trail->parent('admin.product');
    $trail->push('Tạo mới sản phẩm');
});

//Product Crate
Breadcrumbs::for('admin.product.edit', function ($trail, $productName) {
    $trail->parent('admin.product');
    $trail->push($productName);
});

//Equipment
Breadcrumbs::for('admin.equipment', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Thiết Bị', route('admin.equipment.index'));
});

//Equipment Crate
Breadcrumbs::for('admin.equipment.create', function ($trail) {
    $trail->parent('admin.equipment');
    $trail->push('Tạo mới thiết bị');
});

//Equipment Update
Breadcrumbs::for('admin.equipment.edit', function ($trail, $equipmentName) {
    $trail->parent('admin.equipment');
    $trail->push($equipmentName);
});

//Design
Breadcrumbs::for('admin.design', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Thiết Kế', route('admin.design.index'));
});

//Design Crate
Breadcrumbs::for('admin.design.create', function ($trail) {
    $trail->parent('admin.design');
    $trail->push('Tạo mới thiết kế');
});

//Design Update
Breadcrumbs::for('admin.design.edit', function ($trail, $designName) {
    $trail->parent('admin.design');
    $trail->push($designName);
});

//Product Type
Breadcrumbs::for('admin.productType', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Danh mục sản phẩm', route('admin.product_type.index'));
});

//Product Type Create
Breadcrumbs::for('admin.productType.create', function ($trail) {
    $trail->parent('admin.productType');
    $trail->push('Tạo danh mục sản phẩm');
});

//Product Type Create
Breadcrumbs::for('admin.productType.edit', function ($trail, $productTypeName) {
    $trail->parent('admin.productType');
    $trail->push($productTypeName);
});

//Equipment Type
Breadcrumbs::for('admin.equipmentType', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Danh sách loại thiết bị', route('admin.equipment_type.index'));
});

//Equipment Type Create
Breadcrumbs::for('admin.equipmentType.create', function ($trail) {
    $trail->parent('admin.equipmentType');
    $trail->push('Tạo loại thiết bị');
});

//Equipment Type Update
Breadcrumbs::for('admin.equipmentType.edit', function ($trail, $equipmentTypeName) {
    $trail->parent('admin.equipmentType');
    $trail->push($equipmentTypeName);
});

//Design Type
Breadcrumbs::for('admin.designType', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Danh sách loại thiết kế', route('admin.design_type.index'));
});

//Design Type Create
Breadcrumbs::for('admin.designType.create', function ($trail) {
    $trail->parent('admin.designType');
    $trail->push('Tạo loại thiết kế');
});

//Design Type Update
Breadcrumbs::for('admin.designType.edit', function ($trail, $designTypeName) {
    $trail->parent('admin.designType');
    $trail->push($designTypeName);
});

//Vendor
Breadcrumbs::for('admin.vendor', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Danh sách thương hiệu', route('admin.vendor.index'));
});

//Vendor Create
Breadcrumbs::for('admin.vendor.create', function ($trail) {
    $trail->parent('admin.vendor');
    $trail->push('Tạo mới thương hiệu');
});

//Vendor Create
Breadcrumbs::for('admin.vendor.edit', function ($trail, $vendorName) {
    $trail->parent('admin.vendor');
    $trail->push($vendorName);
});

//Blog
Breadcrumbs::for('admin.blog', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Danh sách tin tức', route('admin.blog.index'));
});

//Blog Create
Breadcrumbs::for('admin.blog.create', function ($trail) {
    $trail->parent('admin.blog');
    $trail->push('Tạo mới tin tức');
});

//Blog Create
Breadcrumbs::for('admin.blog.edit', function ($trail, $blogTitle) {
    $trail->parent('admin.blog');
    $trail->push($blogTitle);
});

//Contact
Breadcrumbs::for('admin.contact', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Danh sách liên hệ', route('admin.contact.index'));
});

//Contact Show
Breadcrumbs::for('admin.contact.show', function ($trail) {
    $trail->parent('admin.contact');
    $trail->push('Nội dung liên hệ');
});

//Order
Breadcrumbs::for('admin.order', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Danh sách đơn hàng', route('admin.order.index'));
});

//Order Show
Breadcrumbs::for('admin.order.show', function ($trail) {
    $trail->parent('admin.order');
    $trail->push('Chi tiết đơn hàng');
});
