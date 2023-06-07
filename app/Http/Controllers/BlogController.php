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

    /**
     * ブログ閲覧画面を表示する
     * @param $id
     * @return view
     */
    public function ShowCommentBlog($id) {
        $blog = Blogs::find($id);

        if(is_null($blog)) {
            session()->flash('err_msg', 'データを取得できませんでした。');
            return redirect(route('home'));
        }

        return view('blog.comment',['blog'=>$blog]);
    }

    /**
     * 編集画面へ遷移する
     * @param $id
     * @return view
     */
    public function ShowEditBlog($id) {
        $blog = Blogs::find($id);

        if (is_null($blog)) {
            session()->flash('err_msg', 'データを取得できませんでした。');
            redirect(route('home'));
        }

        return view('blog.editBlog', ['blog'=>$blog]);
    }

    /**
     * 更新する
     * @param Request
     * @return view
     */
    public function exeUpdate(Request $request) {
        $input = $request->all();

        DB::beginTransaction();
        try {
            $blog = Blogs::find($input['id']);
            $blog->fill([
                'title' => $input['title'],
                'comment' => $input['comment'],
            ]);
            $blog->save();
            DB::commit();
        }catch(\Exception $e) {
            abort('500');
            DB::rollback();
        }
        session()->flash('success_msg','データの更新に成功しました。');
        return redirect(route('home'));
    }

    /**
     * 削除する
     * @param Request
     * @return view
     */
    public function exeDelete($id) {
        
        if(empty($id)){
            session()->flash('err_msg', 'データが存在しません。');
            return redirect(route('home'));
        }
        
        try {
            $delete = Blogs::find($id);
            $delete->destroy($id);
        }catch(\Exception $e) {
            abort(500);
        }

        session()->flash('success_msg', 'データの削除に成功しました。');
        return redirect(route('home'));

    }
}
