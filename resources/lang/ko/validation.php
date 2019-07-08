<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute을(를) 수락해야합니다.',
    'active_url'           => ':attribute은(는) 유효한 URL이 아닙니다.',
    'after'                => ':attribute은(는) :date 이후 여야합니다.',
    'after_or_equal'       => ':attribute은(는) :date 이후 여야합니다..',
    'alpha'                => ':attribute은(는) 만 포함 할 수 있습니다.',
    'alpha_dash'           => ':attribute은(는) 문자, 숫자 및 대시 만 포함 할 수 있습니다.',
    'alpha_num'            => ':attribute은(는) 문자와 숫자 만 포함 할 수 있습니다.',
    'array'                => ':attribute은(는) 배열이어야합니다.',
    'before'               => ':attribute은(는) :date 이전 날짜 여야합니다..',
    'before_or_equal'      => ':attribute은(는) :date 이전의 날짜 여야합니다..',
    'between'              => [
        'numeric' => ':attribute은(는) 최소 :min 최대 :max 여야합니다.',
        'file'    => ':attribute은(는) 최소 :min KB 최대 :max KB 여야합니다.',
        'string'  => ':attribute은(는) 최소 :min 최대 :max 글자 여야합니다.',
        'array'   => ':attribute은(는) 최소 :min 최대 :max 개 여야합니다.',
    ],
    'boolean'              => ':attribute은(는) true 또는 false 여야합니다.',
    'confirmed'            => ':attribute은(는) 확인이 일치하지 않습니다..',
    'date'                 => ':attribute은(는) 유효한 날짜가 아닙니다..',
    'date_format'          => ':attribute은(는) :format 형식과 일치하지 않습니다.',
    'different'            => ':attribute 와 :other은(는) 달라야 합니다.',
    'digits'               => ':attribute은(는) :digits 자리 여야 합니다.',
    'digits_between'       => ':attribute은(는) 최소 :min 최대 :max 자리 여야합니다.',
    'dimensions'           => ':attribute은(는) 잘못된 이미지 크기가 있습니다..',
    'distinct'             => ':attribute은(는) 필드에 중복 값이 ​​있습니다..',
    'email'                => ':attribute은(는) 유효하지 않은 Email 주소 입니다.',
    'exists'               => '선택한 :attribute은(는) 유효하지 않습니다.',
    'file'                 => ':attribute은(는) 파일 이여야 합니다.',
    'filled'               => ':attribute 입력란에는 값이 있어야합니다..',
    'image'                => ':attribute은(는) 이미지 여야합니다.',
    'in'                   => '선택한 :attribute 유효하지 않습니다.',
    'in_array'             => ':attribute은(는) :other에 존재하지 않는 값입니다.',
    'integer'              => ':attribute은(는) 숫자여야 합니다.',
    'ip'                   => ':attribute은(는) 유효하지 않은 IP 입니다.',
    'ipv4'                 => ':attribute은(는) 유효하지 않은 IPv4 입니다.',
    'ipv6'                 => ':attribute은(는) 유효하지 않은 IPv6 입니다.',
    'json'                 => ':attribute은(는) 유효하지 않은 JSON string 입니다.',
    'max'                  => [
        'numeric' => ':attribute은(는) :max 보다 크면 안됩니다.',
        'file'    => ':attribute은(는) :max KB 보다 크면 안됩니다.',
        'string'  => ':attribute은(는) :max 글자 보다 크면 안됩니다.',
        'array'   => ':attribute은(는) :max 개 보다 크면 안됩니다.',
    ],
    'mimes'                => ':attribute은(는) type: :values 여야합니다.',
    'mimetypes'            => ':attribute은(는) type: :values 여야합니다.',
    'min'                  => [
        'numeric' => ':attribute 최소 :min 여야합니다.',
        'file'    => ':attribute 최소 :min KB 여야합니다.',
        'string'  => ':attribute 최소 :min 글자 여야합니다.',
        'array'   => ':attribute 최소 :min 개 여야합니다.',
    ],
    'not_in'               => '선택된 :attribute은(는) 유효하지 않습니다.',
    'numeric'              => ':attribute은(는) 숫자 여야합니다.',
    'present'              => ':attribute 필드가 있어야 합니다.',
    'regex'                => ':attribute 포맷은 유효하지 않습니다.',
    'required'             => ':attribute 필드는 필수 입니다.',
    'required_if'          => ':other 가 :value 일때 :attribute 필드는 필수입니다.',
    'required_unless'      => ':other 가 :values 가 아닌한 :attribute 필드는 필수 입니다.',
    'required_with'        => ':values 일때 :attribute 필드는 필수 입니다.',
    'required_with_all'    => ':values 일때 :attribute 필드는 필수 입니다.',
    'required_without'     => ':values 가 아니면 :attribute 필드는 필수 입니다.',
    'required_without_all' => ':values 가 없는경우 :attribute 필드는 필수 입니다.',
    'same'                 => ':attribute 와 :other은(는) 같아야합니다.',
    'size'                 => [
        'numeric' => ':attribute은(는) :size 여야합니다.',
        'file'    => ':attribute은(는) :size KB 여야합니다.',
        'string'  => ':attribute은(는) :size 글자 여야합니다.',
        'array'   => ':attribute은(는) :size 개 여야합니다.',
    ],
    'string'               => ':attribute은(는) 글자 여야합니다.',
    'timezone'             => ':attribute은(는) 유효하지 않습니다.',
    'unique'               => ':attribute은(는) 이미 존재합니다.',
    'uploaded'             => ':attribute은(는) 업로드에 실패 했습니다.',
    'url'                  => ':attribute은(는) 유효하지 않은 포맷 입니다.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'title'=>'제목',
        'content'=>'본문',
        'tags'=>'태그',
        'files'=>'파일',
        'files.*'=>'파일',
        'parent_id'=>'부모 댓글',
    ],

];
