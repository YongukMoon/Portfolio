<?php

return [
    'ArticlesController'=>[
        'store'=>'글이 저장되었습니다.',
        'store_fail'=>'글이 저장되지 않았습니다.',
        'update'=>'글이 수정되었습니다.',
        'destroy'=>'글이 삭제되었습니다.',
    ],

    'PasswordsController'=>[
        'postRemind'=>'이메일을 확인해 주시기 바랍니다 !!!',
        'postReset'=>'비밀번호가 변경되었습니다.',
        'postReset_fail'=>'Url이 잘못되었습니다.',
    ],

    'SessionsController'=>[
        'store_fail'=>'로그인 실패',
        'store_confirm'=>'이메일은 확인해 주세요 !!!',
        'store_success'=>'환영합니다.',
        'destroy'=>'다음에 또 방문해 주세요.',
    ],

    'UsersController'=>[
        'createNativeAccount'=>'이메일을 확인해 주세요 !!!',
        'confirm'=>'가입완료',
        'getPassword'=>'소셜 유저는 비밀번호가 없습니다.',
        'postPassword_fail'=>'비밀번호를 확인해 주세요.',
        'postPassword_success'=>'비밀번호가 변경되었습니다.',
    ],

    'ProductsController'=>[
        'store_success'=>'상품등록이 완료 됐습니다.',
        'store_fail'=>'상품등록에 실패했습니다.',
        'update_success'=>'상품수정이 완료 됐습니다.',
    ],
];