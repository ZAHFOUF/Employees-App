<x-mail::message>
# Welcome To My App {{$user->name}}

enjoy My service and I hope it's useful for You


<x-mail::button url="{{route('posts.index')}}">
Explore Now
</x-mail::button>

Thanks,<br>
Younes Zahfouf coe of {{ config('app.name') }}
</x-mail::message>
