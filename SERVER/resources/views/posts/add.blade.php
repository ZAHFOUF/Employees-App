<x-layout>

    @if ($case === 'edit')

    <form action="{{route('posts.update',$post->id)}}" method="post" style="width: 50% ; margin:3%;">
        @csrf
        @method('PUT')
        <h3>Edit The Post {{$post->id}}</h1>
        <div class="form-outline mb-4">
    <input type="text" id="form12" value="{{$post->title}}" class="form-control" name="title" />
    <label class="form-label" for="form12"> Title </label>
    </div>
    <div class="form-outline mb-4">
        <textarea name="content"   class="form-control" id="textAreaExample" rows="4"> {{$post->content}} </textarea>
        <label class="form-label"  for="textAreaExample">Post Centent</label>
      </div>

      <div class="form-outline mb-4">
        <input name='user' type="number" value="{{$post->user}}" id="form12" class="form-control" />
        <label  class="form-label" for="form12"> User </label>
        </div>


        <button class="btn btn-primary" type="submit"> Edit Post </button>




    </form>


    @else
    <form action="{{route('posts.store')}}" method="post" style="width: 50% ; margin:3%;">
        @csrf
        <h3>Add New Post</h1>
        <div class="form-outline mb-4">
    <input type="text" id="form12" class="form-control" name="title" />
    <label class="form-label" for="form12"> Title </label>
    </div>
    <div class="form-outline mb-4">
        <textarea name="content" class="form-control" id="textAreaExample" rows="4"></textarea>
        <label class="form-label" for="textAreaExample">Post Centent</label>
      </div>

      <div class="form-outline mb-4">
        <input name='user'  type="hidden" value="{{ Auth::user()->id}}" id="form12" class="form-control" />

        </div>


        <button class="btn btn-primary" type="submit"> create post </button>


    </form>

    @endif

    @php
        $messages = " "
    @endphp

    @if ($errors->any())
            @foreach ($errors->all() as $error)
            @push('scripts')
            <script>
                toastr.error("{{$error}}")
            </script>
        @endPush
            @endforeach



@endif




</x-layout>
