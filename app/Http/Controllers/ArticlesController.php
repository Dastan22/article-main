<?php
/**
 * Created by PhpStorm.
 * User: egolubev
 * Date: 04.10.2021
 * Time: 23:13
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Tags;
use App\Models\Comment;

class ArticlesController extends Controller
{
    /**
     * Показываем главную страницу со статьями
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('articles/index', [
            'articles' => DB::table('articles')->paginate(6)
        ]);
    }

    /**
     * Каталог статей
     * @return \Illuminate\View\View
     */
    public function catalog()
    {
        return view('articles/catalog', [
            'articles' => DB::table('articles')->paginate(5),
            'tags' => Tags::all(),
        ]);
    }

    /**
     * Детализированный просмотр статьи
     * @param $id - ид статьи
     * @return \Illuminate\View\View
     */
    public function view($id = 0)
    {
        return view('articles/view', [
            'article' => Articles::with('tags')->where('id', $id)->first()
        ]);
    }

    /**
     * Добавляем новый голос
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function likeUp(Request $request)
    {
        // добавляем новый голос
        Articles::where('id', $request->get('id'))->increment('cnt_like');
        // получаем итоговое количество лайков
        $article = Articles::where('id', $request->get('id'))->first();
        return response()->json([
            'message' => 'Like added.',
            'cnt_like' => $article->cnt_like
        ], 200);
    }

    /**
     * Добавляем новый промотр
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showUp(Request $request)
    {
        // добавляем новый просмотр
        Articles::where('id', $request->get('id'))->increment('cnt_show');
        // получаем итоговое количество просмотров
        $article = Articles::where('id', $request->get('id'))->first();
        return response()->json([
            'message' => 'Show added.',
            'cnt_show' => $article->cnt_show
        ], 200);
    }

    /**
     * Добавляем новый комментарий
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function commentUp(Request $request)
    {
        // добавляем новый комментарий
        $comment = new Comment();
        $comment->body = $request->get('body');
        $comment->subject = $request->get('subject');
        $comment->article_id = $request->get('article_id');
        $comment->save();
        // формируем ответ (пока без валидации)
        return response()->json([
            'message' => 'Comment added.'
        ], 200);
    }
}
