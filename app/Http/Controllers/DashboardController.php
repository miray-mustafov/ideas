<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // builds an Eloquent QUERY to fetch Idea models ordered by their created_at attribute in descending order
        $ideas = Idea::with('user', 'comments.user',)->orderBy('created_at', 'DESC');
        // with is to eagerly load the Idea with its user, so we extract the idea and the user at the same time
        // with one query, instead of making a query for the user later again bcs of the default lazy loading
        // comments.user loads the idea's comments and the comments' user (make sure u have user rel in the com model)
        // you can also define this in the Idea model
        // opposite of with is without


        // adds a where clause to filter the Idea models based on the content attribute.
        if (request()->has('search')) {
            $search = '%' . request()->get('search', '') . '%';
            $ideas = $ideas->where('content', 'like', $search);
        }

        // 1. executes a SELECT COUNT(*) query to determine the total number of Idea records
        // 2. executes a SELECT query to fetch the current page's records. This query includes
        // the appropriate LIMIT and OFFSET clauses to retrieve only the records for the current page.
        // example sql for selecting ideas on page 1
        // SELECT * FROM ideas WHERE content LIKE '%search_term%' ORDER BY created_at DESC LIMIT 4 OFFSET 0;
        return view(
            'dashboard',
            [
                'ideas' => $ideas->paginate(4),
            ]
        );
    }
}
