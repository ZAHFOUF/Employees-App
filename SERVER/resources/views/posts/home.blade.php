
    <x-layout>


        <style>
            .row {
    --mdb-gutter-x: 1.5rem;
    --mdb-gutter-y: 23 !important;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--mdb-gutter-y)*-1);
    margin-right: calc(var(--mdb-gutter-x)*-0.5);
    margin-left: calc(var(--mdb-gutter-x)*-0.5);
}
        </style>



        <h2> {{$settings['title']}} </h2>

        <h3>  Welcome <span> {{ Auth::user()->name }} </span></h3>

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

       <div class="d-flex justify-content-center p-3">
        <div>
            {{$posts->links('vendor.pagination.bootstrap-5')}}

        </div>
       </div>


        @if(session('message'))

        @push('scripts')
        <script>
           toastr.success(" {{ session('message') }} ");

        </script>
    @endpush

        @endif


    </x-layout>


