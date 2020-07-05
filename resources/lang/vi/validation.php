<?php
return [
    'login_client' => [
        'email' => [
            'required' => 'Email không được bỏ trống',
            'email' => 'Email sai định dạng. Hãy nhập đúng định dạng email',
            'exists' => 'Email không tồn tại',
            'max' => 'Email phải không được dài quá quá 256 ký tự',
        ],
        'password' => [
            'required' => 'Mật khẩu không được để trống',
            'min' => 'Mật khẩu phải có từ 8 ký tự đến 50 ký tự',
            'max' => 'Mật khẩu phải có từ 8 ký tự đến 50 ký tư',
        ],
        ]
];
