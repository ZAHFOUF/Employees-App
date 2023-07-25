<x-mail::message>
News !!

Hello , added a new post at {{$post->created_at}} from {{$user->name}}

don't miss see post now

<x-mail::button url="{{route('posts.show',$post->id)}}" >
See Post Now
</x-mail::button>

See You ,<br>
{{ config('app.name') }}
</x-mail::message>
