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
        @php
        $upcomingevents = App\Models\Upcomingevents::latest()->paginate(2);
        @endphp
      <div class="container">
          @foreach($upcomingevents as $upcomingevent)
        <h3 class="event__title">
            {{ $upcomingevent->title }}
        </h3>

        <div class="event__wrapper">
          <!-- main img -->
          <div class="event__main">
            <img src="{{asset('storage/uploads/'.$upcomingevent->passport) }}" alt="main image" />
            <h3 class="event__title">
                {{ $upcomingevent->post }}
            </h3>
          </div>
          @endforeach
          <div class="event__side">
            <!-- side imgs -->
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

