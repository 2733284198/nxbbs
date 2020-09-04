<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class AdminTopicsController extends Controller
{
    public function top(Topic $topic)
    {
        if(($topic->top)==1){
            $topic->top=0;
            $topic->update();
            return redirect()->back()->with('success', '取消置顶');
        }else{
            $topic->top=1;
            $topic->update();
            return redirect()->back()->with('success', '置顶成功');
        }
    }
}
