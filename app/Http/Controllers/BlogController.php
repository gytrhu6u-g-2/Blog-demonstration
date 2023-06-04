<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class BlogController extends Controller
{
    //

    /**
     * ホーム画面の表示
     * @return view
     */
    public function showHome()
    {
        $blogs = Blogs::all();

        return view('blog.home',['blogs' => $blogs]);
    }

    /**
     * 追加画面の表示
     * @return view
     */
    public function ShowAddBlog()
    {
        return view('blog.addBlog');
    }

    /**
     * ホーム画面に新規データを追加する
     * @return view
     */
    public function exeStore(Request $request): RedirectResponse
    {
        // バリデーション
        $validated = $request->validate([
            'title' => 'required',
            'comment' => 'required',
        ]);

        $input = $request->all();

        DB::beginTransaction();
        try {
            Blogs::create($input);
            DB::commit();
        } catch (\Exception $e) {
            abort(500);
            DB::rollback();
        }

        session()->flash('success_msg', 'データの登録が完了しました。');
        return redirect(route('home'));

    }
}
