<?php

namespace SmarterCoding\WpBase\Requests;

use SmarterCoding\WpPlus\Structs\Request;

class TestRequest extends Request
{
    public function rules()
    {
        return [
            'foo' => ['required']
        ];
    }
}
