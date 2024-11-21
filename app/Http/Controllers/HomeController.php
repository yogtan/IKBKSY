<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Department;
use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'title' => 'Home - IKBKSY',
        ]);
    }

    public function sejarah()
    {
        return view('about.sejarah', [
            'title' => 'Sejarah - IKBKSY',
        ]);
    }

    public function visiMisi()
    {
        return view('about.visimisi', [
            'title' => 'Visi & Misi - IKBKSY',
        ]);
    }

    public function contact()
    {
        return view('kontak.kontak', [
            'title' => 'Kontak - IKBKSY',
        ]);
    }


    public function dashboard()
    {
        // return view('admin/admin-dashboard');
        $totalBlog = Blog::count();
        $totalPengurus = Member::count();
        $totalDepartment = Department::count();
        $totalCategory = Category::count();

        return view('admin.admin-dashboard', [
            'title' => 'Dasboard Admin - IKBKSY',
            'totalBlog' => $totalBlog,
            'totalPengurus' => $totalPengurus,
            'totalDepartment' => $totalDepartment,
            'totalCategory' => $totalCategory,
        ]);
    }
}
