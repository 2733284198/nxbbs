<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
                // CREATE
            case 'POST': {
                    return [
                        // CREATE ROLES
                    ];
                }
                // UPDATE
            case 'PUT':
            case 'PATCH': {
                    return [
                        'body'        => 'required|min:3',
                        'category_id' => 'required|numeric',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default: {
                    return [];
                }
        }
    }

    public function messages()
    {
        return [
            'body.min' => '文章内容必须至少三个字符',
        ];
    }
}
