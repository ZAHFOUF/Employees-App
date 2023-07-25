<x-layout>
    <h2>Your Posts </h2>

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)

            <div class="col-4">
                <a style="color: initial;" href="{{route('posts.show',$post->id)}}">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{$post->title}}</h5>
                          <p class="card-text">{{$post->content}} .</p>

                          <div style="display: flex;
                          justify-content: flex-start;
                          align-items: center;">

    <a style="color: #FFF;" href="{{route('posts.edit',$post->id)}}">       <button  type="button" class="btn btn-success"> edit </button> </a>
                          <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button style="margin-top: 14px;  margin-left: 13px;" type="submit" class="btn btn-danger"> delete </button>

                        </form>

                          </div>


                        </div>
                      </div>

                </a>

            </div>

            @endforeach


       </div>


</x-layout>
