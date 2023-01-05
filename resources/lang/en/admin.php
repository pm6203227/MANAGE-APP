<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'requisition' => [
        'title' => 'Requisitions',

        'actions' => [
            'index' => 'Requisitions',
            'create' => 'New Requisition',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'approved_by' => 'Approved by',
            'article' => 'Article',
            'delivery_terms' => 'Delivery terms',
            'order' => 'Order',
            'order_date' => 'Order date',
            'payment_date' => 'Payment date',
            'produced_by' => 'Produced by',
            'provider' => 'Provider',
            'quantity' => 'Quantity',
            'received_by' => 'Received by',
            'total' => 'Total',
            'unit_price' => 'Unit price',
            'user_id' => 'User',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];