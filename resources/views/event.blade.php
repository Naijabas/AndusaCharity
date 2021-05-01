@extends('layouts.guest')
@section('content')
<br>
<br>
<br>
<br>

    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <section class="event__section">
      <div class="container">
        @php
        $upcomingevents = App\Models\Upcomingevents::latest()->paginate(1);
        @endphp

<h3 class="event__title">
            @foreach($upcomingevents as $upcomingevent)
        </h3>
       <h3> {{ $upcomingevent->title }}</h3>

        <div class="event__wrapper">
          <!-- main img -->
          <div class="event__main">
            <img src="{{asset('storage/uploads/'.$upcomingevent->passport) }}" alt="main image" />
            <h3 class="event__title">
            </h3>
           <p>Updated on:{{ $upcomingevent->created_at }}</p>
          </div>
          @endforeach
          <div class="event__side">
            <!-- side imgs -->
            <div class="book">
              <img src="images/test1.JPG" alt="submit side" />
              <p>views</p>
              <p>Date created:{{ $upcomingevent->created }}</p>
            </div>
            <div class="book">
              <img src="images/test1.JPG" alt="submit side" />
              <p>views</p>
              <p>Date created:</p>
            </div>
            <div class="book">
              <img src="images/test1.JPG" alt="submit side" />
              <p>views</p>
              <p>Date created:</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>

@endsection

