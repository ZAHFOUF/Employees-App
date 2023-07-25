<?php

namespace App\Http\Controllers;

use App\Events\PostAdded;
use App\Events\PostNotf;
use App\Http\Requests\PostsReq;
use App\Jobs\DispatchEventJob;
use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPost;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Mockery\Matcher\Contains;

use function PHPSTORM_META\type;
use function PHPUnit\Framework\matches;
use function PHPUnit\Framework\matchesRegularExpression;
use function PHPUnit\Framework\stringContains;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
       $posts =  Post::paginate(5) ;

       return view('posts.home',['posts' => $posts]);
    }



    public function search ($title) {
        $filter = Post::where('title', $title)->cursor();

        return view('posts.search',['data' => $filter]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

        return view('posts.add',['case'=>'create']);



    }

    public function mine(Request $req)
    {

       $posts =   Post::where('user' , Auth::user()->id)->get();

        return view('posts.yours',[ 'posts' => $posts  ]);



    }

    public function query (Request $req){



        // Get all posts with their respective user and category information
        $posts_one = Post::with('user')->whereRelation('user','name','YOUNES ZAHFOUF')->get();
    /*    foreach ($posts_one as $post) {
            $post->comments =  $post->comments()->get();
        } */

        // Get all posts created by a specific user.
        $posts_tow = Post::where("user",12)->get();

        // Get all posts in a specific category.
        $posts_three = Comments::where('comment','bravo')->get('post');
        $posts_four = [];
        if ($posts_three !== null) {
            foreach ($posts_three as $post) {
                array_push($posts_four,Post::find($post)->first());
            }
        }


        //Get the latest 5 posts ordered by their creation date.
        $posts_five = Post::select('*')->orderBy('id','desc')->limit(5)->orderBy('created_at')->get();


        // Get the posts that contain a specific keyword in their title or content.

        $posts_six = Post::where('title','like','%new%')->get();

        $posts_seven = DB::table('posts')
        ->select( 'name' , DB::raw("COUNT('*') as 'number of posts'"))
        ->join('users','posts.user','=','users.id')
        ->groupBy('posts.user','name')
        ->get();


        // filter the posts by there categories and time created

        $posts_ten = Post::with('categorie')->whereRelation('categorie','name','food')->whereRaw("date(created_at) = '2023-06-11' ")->get();




        return ['posts_one' => $posts_one , 'posts_tow' => $posts_tow , 'posts_three' => $posts_four , 'posts_five' => $posts_five ,
    'posts_six' => $posts_six , 'posts_seven' => $posts_seven ,'posts_ten' => $posts_ten


    ];





    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsReq $req)
    {
        $post = new Post();


        $post->title = $req->title;
        $post->content = $req->content;
        $post->user = $req->user;

        $post->save();



        $user = User::findOrFail($req->user);
        $users = User::where("id","!=",$req->user)->get();

     /*   $event =  new PostAdded($user,$post) ;

        DispatchEventJob::dispatch($event)->delay(2); */



        $notf = new NewPost($post);

        // store the notf in the db

        Notification::send($users,$notf);


        // broadcast to users

        event(new PostAdded($notf));






        // return with message

        return redirect()->route("posts.index")->with('message','Post added !');







    }


    public function ireadnot() {

        Auth::user()->unreadNotifications->markAsRead();

        return response()->json(['maessage' , "ok"]);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);

        $post->user = User::findOrFail($post->user);

        $comments = Post::findOrFail($id)->comments;

        foreach ($comments as $comment) {
            $comment->user = User::findOrFail($comment->user);
        }






        return view("posts.show",['post' => $post, 'comments' => $comments  ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $post = Post::findOrFail($id);

        if ($post) {
            return view('posts.add',['case'=>'edit',  'post' => $post]);
        }else{
            return view('posts.notfound',['message' => 'the user what you looking for is undefined !']);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $req->title ;
        $post->content = $req->content;
        $post->user = $req->user;

        $post->save();

        return redirect()->route('posts.index')->with('message' , 'Post updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index')->with('message' , 'Post deleted !');
    }
}
