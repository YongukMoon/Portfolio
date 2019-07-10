<?php

return [
    'ArticlesController'=>[
        'store'=>'Article store success',
        'store_fail'=>'Article store fail',
        'update'=>'Article update success',
        'destroy'=>'Article delete success',
    ],

    'PasswordsController'=>[
        'postRemind'=>'Please check your email !!!',
        'postReset'=>'Password reset success',
        'postReset_fail'=>'Url incorrect',
    ],

    'SessionsController'=>[
        'store_fail'=>'Login fail',
        'store_confirm'=>'Please email confirm !!!',
        'store_success'=>'Welcome',
        'destroy'=>'See you later',
    ],

    'UsersController'=>[
        'createNativeAccount'=>'Please check your email !!!',
        'confirm'=>'Register success',
        'getPassword'=>'Social users do not have a password',
        'postPassword_fail'=>'The original password is incorrect',
        'postPassword_success'=>'Password change success',
    ],

    'ProductsController'=>[
        'store_success'=>'Product add success',
        'store_fail'=>'Product add fail',
        'update_success'=>'Product update success',
    ],
];