<?php

namespace App\Http\Controllers;

use App\Models\BtrcNotice;
use App\Models\Company;
use App\Models\Event;
use App\Models\FoundingMember;
use Illuminate\Http\Request;
use Stephenjude\FilamentBlog\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::query()->where('status', 'approved')->select(['website','logo','name','description'])->get();
        $events = Event::with('user', 'media')
            ->where('is_active', true)
            ->select(['title','description','start_date','end_date','location','max_participants','event_banner'])->get();

        $posts = Post::with(['author', 'category'])->published()->take(3)->get();
        return view('welcome', compact('companies', 'events','posts'));
    }

    public function showBlog($blogID)
    {
        $post = Post::with(['author', 'category'])->published()->where('id', $blogID)->first();

        if (!$post) {
            abort(404);
        }
         return view('blog-show', compact('post'));

    }

    public function member()
    {
        $members = FoundingMember::query()
            ->where('is_active', true)
            ->orderBy('sorting_order')
            ->get()
            ->groupBy('member_type');

        return view('member', compact('members'));
    }

    public function btrcNotice()
    {
        $notices = BtrcNotice::query()
            ->orderBy('published_at', 'desc')
            ->get();

        return view('btrc-notice', compact('notices'));
    }
}
