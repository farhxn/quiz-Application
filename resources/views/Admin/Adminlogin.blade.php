<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    
    <div class="wrapper">
      @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      @if(Session::has('error'))
      <div class="alert alert-danger">{{Session::get('error')}}</div>
      @endif
        <div class="title-text">
          <div class="title login">Login Form</div>
          <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
          <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
          </div>
          <div class="form-inner">
          
            <form action="{{url('AdminAuthenticate')}}" class="login" method="POST">
                @csrf
              <div class="field">
                <input type="email" class="form-control  @error('email') is-invalid  @enderror"
                  placeholder="Email Address" name="email" value="{{old('email')}}">
                @error('email')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
              </div>
              <div class="field">
                <input type="password" class="form-control @error('password')
                 is-invalid  @enderror" placeholder="Password" name="password" value="{{old('password')}}">
                @error('password')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
              </div>
              <br>
              <div class="pass-link"><a href="#">Forgot password?</a></div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Login">
              </div>
              <div class="signup-link">Not a member? <a href="{{route('Adminregister')}}">Signup now</a></div>
            </form>
            <form action="{{url('AdminprocessRegister')}}" method="POST" class="signup">
                @csrf
              <div class="field">
                <input type="text" class="form-control  @error('name') is-invalid  @enderror"
                placeholder="Username" name="name" value="{{old('name')}}">
              @error('name')
                  <p class="invalid-feedback">{{$message}}</p>
              @enderror
              </div>
              <div class="field">
                <input type="email" class="form-control  @error('email') is-invalid  @enderror"
                placeholder="Email Address" name="email" value="{{old('email')}}">
              @error('email')
                  <p class="invalid-feedback">{{$message}}</p>
              @enderror
              </div>
              <div class="field">
                <input type="password" class="form-control @error('password') 
                is-invalid  @enderror" placeholder="Password" 
                name="password" value="{{old('password')}}">
                @error('password')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
              </div>
              <div class="field">
                <input type="password" name="password_confirmation" 
                class="form-control @error('password_confirmation') is-invalid  @enderror"
                  placeholder="Confirm password" value="{{old('password_confirmation')}}">
                  @error('password_confirmation')
                  <p class="invalid-feedback">{{$message}}</p>
              @enderror
              </div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Signup">
              </div>
              <div class="signup-link">Already a member? <a href="{{route('AdminLogin')}}">Login now</a></div>
            </form>
          </div>
        </div>
      </div>
  
</body>

<script src="{{asset("assets/js/login.js")}}"></script>
</html>