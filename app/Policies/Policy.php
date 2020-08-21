<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Dcat\Admin\Admin;
class Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        // 如果用户拥有管理内容的权限的话，即授权通过
    }
	    // }
	}
