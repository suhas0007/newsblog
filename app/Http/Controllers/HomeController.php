<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\admin;
use App\Article;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // *
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
     
    public function home()
    {

       $data['articles'] = Article::latest()->get();
      return view('welcome', $data);
    }

    public function index()
    {
        return view('home');
    }

    public function show()
    {
          $data['adminlists'] = admin::paginate(3);
         
        return view('about', $data );
        
    }

    public function export()
    {
      return Excel::download(new UsersExport, 'articles.xlsx');
      
    }
}
