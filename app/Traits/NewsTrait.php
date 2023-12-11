<?php
namespace App\Traits;

use App\Models\Category;
use App\Models\News;

use Yajra\DataTables\DataTables;

trait NewsTrait
{
    //function search
  public function DataAjax(): \Illuminate\Http\JsonResponse
  {
      //use function in model user

        $news = News::latest()->get();


      return DataTables::of($news)
          ->addColumn('record_select', 'dashboard.categories.data_table.record_select')
          ->editColumn('status', function (News $news) {
              return view('dashboard.news.data_table.status',compact('news'));

          })
            ->editColumn('image', function (News $news) {
                return view('dashboard.news.data_table.image',compact('news'));

            })

            ->editColumn('category_id', function (News $news) {
                return $news->category->name;})


          ->editColumn('created_at', function (News $news) {
              return $news->created_at->format('Y-m-d');
          })
          ->addColumn('actions', function (News $news){
             $categories = Category::all();
              return view('dashboard.news.data_table.actions',compact('news','categories'));
          })
          ->rawColumns(['record_select', 'actions'])
          ->toJson();


  }



}
