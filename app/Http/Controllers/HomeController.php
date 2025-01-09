<?php

namespace App\Http\Controllers;

use App\Mail\ContactFromSubmitted;
use App\Models\BtrcNotice;
use App\Models\Company;
use App\Models\Event;
use App\Models\FoundingMember;
use App\Models\PhotoAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function member(Request $request)
    {

//        $sortingOrder = FoundingMember::$memberTypes;
//
//        $members = FoundingMember::query()
//            ->where('is_active', true)
//            ->orderBy('sorting_order')
//            ->get()
//            ->groupBy('member_type')
//            ->sortBy(function ($group, $key) use ($sortingOrder) {
//                return array_search($key, array_keys($sortingOrder));
//            });

        $members = FoundingMember::query()
            ->where('is_active', true)
            ->where('member_type', $request->member_type)
            ->orderBy('sorting_order')
            ->get();

        $type = $request->member_type;

        return view('member', compact('members','type'));
    }

    public function btrcNotice()
    {
        $notices = BtrcNotice::query()
            ->orderBy('published_at', 'desc')
            ->get();

        return view('btrc-notice', compact('notices'));
    }

    public function btrcLicensed()
    {
        return view('btrc-licensed');
    }

    public function gallery()
    {
        $albums = PhotoAlbum::query()
            ->with('media') // spite media library
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('album_type');

//        dd($albums);

        return view('gallary', compact('albums'));
    }

    public function contactMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject,
        ];

        Mail::to('info@vtspab.org')->send(new ContactFromSubmitted($data));

        return response()->json(['status' => 'success','message' => 'Mail sent successfully']);

    }
}
