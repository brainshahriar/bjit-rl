<?php 

return [
    'paginate' => 10,
    'filesystem_disk' => env('FILESYSTEM_DISK', 'local'),
    'table' => [
        'users' => 'users',
        'permissions' => 'permissions',
        'roles' => 'roles',
        'categories' => 'categories',
        'posts' => 'posts',
        'comments' => 'comments',
        'product_categories' => 'product_categories',
        'products' => 'products'
    ],
    'path' => [
        'storage' => 'storage',
        'storage_app' => 'app',
        'storage_local' => 'private',
        'storage_public' => 'public',
        'storage_app_local' => 'app/private', 
        'storage_app_public' => 'app/public', 
        'posts' => [
            'normals' => 'files/posts/normals',
            'thumbnails' => 'files/posts/thumbnails'
        ],
        'profile' => 'images/profile',
        'product_categories' => 'files/product_categories',
        'products' => [
            'normals' => 'files/products/normals',
            'thumbnails' => 'files/products/thumbnails'
        ],
    ],
    'sizes' => [
        'XS', 'S', 'M', 'L', 'XL'
    ]
];