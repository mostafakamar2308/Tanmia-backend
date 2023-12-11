<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   public function index(){








       return view('dashboard.index');
   }

    public function count()
    {
        $categoryCount = number_format(Category::count());
        $newsCount = number_format(News::count());
        $userCount = number_format(Visitor::count());


        return response()->json([
            'category_count' => $categoryCount,
            'news_count' => $newsCount,
            'user_count' => $userCount,
        ]);

    }// end of topStatistics

    public function newsChart(){

        $news = News::whereYear('created_at', request()->year)
            ->select(
                '*',
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(id) as total_news'),
            )
            ->groupBy('month')->get();



        return view('dashboard.charts', compact('news'));

    }// end of moviesChart
}
