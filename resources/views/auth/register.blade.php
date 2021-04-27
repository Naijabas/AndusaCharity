<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body  >
  <br>
<div class="cont" style="background-color: #e7f5ee;">
  <div class="form sign-in" method="POST" action="{{ route('login') }}">
    @csrf
    <h2>Welcome back,</h2>
    <label>
           <span style="color: black;">Email</span>
      <input type="email" />
    </label>
    <label>
      <span style="color: black;">Password</span>
      <input type="password" />
    </label>
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
    <p class="forgot-pass"  style="color: black;">Forgot password?</p></a>
    @endif
    <button type="button" class="submit"  style="background-color: #1ebe6e; color: white;">Sign In</button>

    <!-- <button type="button" class="fb-btn">Connect with <span>facebook</span></button> -->
  </div>
  <div class="sub-cont" style="background-color: #e7f5ee;">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>
    <div class="form sign-up">
        <form method="POST" action="{{ route('register') }}">
            @csrf

      <h2>Time to feel like home,</h2>
      <label >
        <span style="color: black;">Name</span>
        <input type="text" />
      </label>
      <label>
        <span style="color: black;">Email</span>
        <input type="email" />
      </label>
      <label>
        <span style="color: black;">Password</span>
        <input type="password" />
      </label>
      <button type="button" class="submit" style="background-color: #1ebe6e;">Sign Up</button>
      <!-- <button type="button" class="fb-btn">Join with <span>facebook</span></button> -->
    </div>
  </div>
</div>

</body>
<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});
</script>
</html>
