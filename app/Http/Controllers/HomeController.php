<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\News;
use App\Tag;
use Illuminate\Http\Request;
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
        # authorize user
        if (!Auth::user()) {
            if (Auth::attempt(['email' => 'admin@admin.com', 'password' => 'password'])) {
                return redirect()->intended('index');
            }
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Tag $tag)
    {
        # Select user name
        $user = (Auth::user()) ? Auth::user()->name : 'Гость';

        if (!empty($tag->name)) {
            $news = $tag->news();
        } else {
            # News collection
            $news = News::with('tags');
        }

        return view('index', [
            'user' => $user,
            'news' => $news->orderBy('created_at', 'decs')->paginate(10)
        ]);
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

            # save news
            $news->save();

            if (isset($tags_news) and count($tags_news) > 0) {
                foreach ($tags_news as $tags) {
                    # if isset name
                    if (Tag::where('name', $tags)->first()) {
                        $tag = Tag::where('name', $tags)->first();
                        $news->tags()->attach($tag->id);

                    } else {
                        $tag = new Tag;
                        $tag->name = $tags;
                        $tag->save();

                        $news->tags()->attach($tag->id);
                    }

                }
            }

            if ($news->id) {
                session()->flash('message', 'Новость успешна добавлена');

                return redirect()->route('index');
            }

            session()->flash('error', 'Произошла ошибка обратитесь к Администратору');
            return redirect()->route('index');
        }
    }
}
