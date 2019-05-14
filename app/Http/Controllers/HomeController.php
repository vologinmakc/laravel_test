<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\News;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user()->name;
            return view('index', [
                'user' => $user
            ]);
        }
        return view('index');
    }

    public function create()
    {
        if (Auth::user()) {
            return view('news.create');
        }
    }

    public function store(StoreNewsRequest $request)
    {
        if (Auth::user()) {

            $user = Auth::user();
            $fields = $request->validated();
            $news = new News();

            # tags
            if (!empty($fields['tags-news'])) {
                $tags_news = explode(',', $fields['tags-news']);
            }

            $news->fill($fields);
            $news->user_id = $user->id;

            # files
            if ($request->file()) {
                $file_user = $request->file();
                foreach ($file_user as $key => $value) {
                    $file = $file_user[$key];
                }
                $news->img_url = $file->storeAs('/files/news/images', 'img-' . time(), 'public');
            }

            # save
            $news->save();

            session()->flash('message', 'Новость успешна добавлена');

            return redirect()->route('index');
        }
    }
}
