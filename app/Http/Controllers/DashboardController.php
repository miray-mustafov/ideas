<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $ideas=Idea::orderBy('created_at','DESC');
        if(request()->has('search')){
            $search = '%'.request()->get('search','').'%';
            $ideas=$ideas->where('content','like', $search);
        }
        return view(
            'dashboard',
            [
                'ideas'=> $ideas->paginate(4),
            ]
        );
    }
}
