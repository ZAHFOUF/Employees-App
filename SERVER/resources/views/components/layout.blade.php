<!-- resources/views/components/layout.blade.php -->
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post App</title>
   <!-- Font Awesome -->


<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
rel="stylesheet"
/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


@vite(['resources/sass/layout.scss'])

</head>
<body>


    @php
        $settings =[ ['name' => ' posts' , 'path' => 'posts.index' ] , ['name' => ' add post' , 'path' => 'posts.create' ] , ['name' => 'your posts' , 'path' => 'posts.mine' ] ]
    @endphp
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            @foreach($settings as $path)


    <li class="nav-item"> <a class="nav-link" href="{{route($path['path'])}}"> {{$path['name']}}</a></li>



  @endforeach
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>

        <!-- Notifications -->
        <div class="dropdown">
          <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">{{Auth::user()->unreadNotifications()->count()}}</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
            style="width: 250px; "
          >



          @foreach (Auth::user()->notifications()->limit(3)->get() as $item)

          @php
               $data = json_decode($item)->data
          @endphp

          <li style="height:auto; "  @class([ 'unread' => $item->read_at ? false : true , 'read' => $item->read_at ? true : false])>
            <a class="dropdown-item" href="{{$data->url}}"> <p style="text-wrap: wrap; line-height: 1.5;">{{$data->title}}  </p> <b>{{$data->time}}</b>   </a>
          </li>
          <li><hr class="dropdown-divider" /></li>



          @endforeach

          @if (Auth::user()->notifications()->count() > 3)
          <li style="height:auto; " style="background-color: #000; color:#FFF;">
            <a class="dropdown-item" href="#"> <p style="text-wrap: wrap; line-height: 1.5;"> View All  </a>
          </li>
      @endif

          @if (Auth::user()->notifications()->count() === 0)
              <p> You have no notifications </p>
          @endif


          </ul>
        </div>
        <!-- Avatar -->
        <div class="dropdown">
          <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
              class="rounded-circle"
              height="25"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuAvatar"
          >


            <li>
              <a class="dropdown-item" href="#">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Settings</a>
            </li>
            <li>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @method("POST")
                 @csrf
             </form>
            </li>
          </ul>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
    <audio id="myAudio" src="{{asset('audio/notification.mp3')}}"></audio>

  </nav>
  <!-- Navbar -->


  <div class="container-fluid">
    {{ $slot }}

  </div>
    <!-- MDB -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script>
     toastr.options = {
  closeButton: true,
  newestOnTop: false,
  progressBar: true,
  positionClass: 'toast-bottom-center',
  preventDuplicates: false,
  onclick: null,
  showDuration: '300',
  hideDuration: '1000',
  timeOut: '5000',
  extendedTimeOut: '1000',
  showEasing: 'swing',
  hideEasing: 'linear',
  showMethod: 'fadeIn',
  hideMethod: 'fadeOut'
};
</script>
@stack('scripts')

<script>

    var GlobalsVar = {
        userId :"{{Auth::user()->id}}"
    }


    // make all notif as read
$(document).ready(function() {
    $('#navbarDropdownMenuLink').on('click', function() {
      // Get the CSRF token
      var token = $('meta[name="csrf-token"]').attr('content');

      // Make an AJAX request to the Laravel route
      $.ajax({
        url: '{{ route("posts.ireadnot") }}',
        method: 'POST', // or any other HTTP method
        headers: {
          'X-CSRF-TOKEN': token
        },
        success: function(response) {
          // Handle the response from the server
          console.log(response);
        },
        error: function(xhr) {
          // Handle any error that occurred during the request
          console.log(xhr.responseText);
        }
      });
    });
  });

</script>

@vite(['resources/js/app.js'])

</body>
