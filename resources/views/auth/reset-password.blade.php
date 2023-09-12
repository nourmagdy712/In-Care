<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email recovery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

body {
  background-color: #ececec;
  color: #fff;
  font-family: "Montserrat", sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  overflow: hidden;
  margin: 0;
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 440px;
  padding: 40px;
  margin: 20px auto;
  transform: translate(-50%, -55%);
  background: #194868;
  box-sizing: border-box;
  border-radius: 10px;
}

.login-box h1 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  letter-spacing: 2px;
  font-size: 30px;
}

.aaa {
  color: lightblue;
  margin-top: -10px;
  margin-bottom: 30px;
  text-align: center;
}


.user-box {
  position: relative;
}

.user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

 .user-box input:focus~label,
 .user-box input:valid~label {
  top: -20px;
  left: 0;
  color: #fff;
  font-size: 12px;
}

.submit {
  background-color: inherit;
  cursor: pointer;
  position: relative;
  display: inline-block;
  padding: 10px 70px;
  font-weight: bold;
  color: #fff;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 3px;
  border: 1px solid white;
}

.submit:hover {
  background: #fff;
  color: rgb(37, 68, 94);
  border-radius: 5px;
}

.a2 {
  color: lightblue;
  text-decoration: none;
  
}

.a2:hover {
  background: transparent;
  color: white;
  border-radius: 5px;
}
.notification{
  visibility: hidden;
  min-width: 90px;
  height: 40px;
  margin-left: -125px;
  color:#fff;
  background-color: rgb(37, 68, 94);
  border: none;
  border-radius: 20px;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  text-align: center;
  padding: 25px 10px 40px 10px;
  position: fixed;
  z-index: 10;
  left: 45%;
  top: 70px;
  font-size: 15px;
 
}
@media (max-width: 400px){
.login-box{
  position: absolute !important;
  width: 100vw !important;
  height: 550px!important;
  background-color: rgb(37, 68, 94) !important;
  top: 50%;
}
.submit{
  padding: 10px 30px !important;
}
.forget{
  margin-left: 5px!important;
}
}

@-webkit-keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.notification.hide{
    -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation-name: fadeOutUp;
  animation-name: fadeOutUp;
}

@-webkit-keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

@keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}
  </style>
</head>

<body>
  <div class="login-box">

    <h1> <i class="fas fa-user-gear" style="margin-right: 10px;"></i>Password Recovery</h1>
    <p class="aaa">Please enter your E-mail down below</p>
    <form method="POST" action="{{route('reset.password.post')}}">
        @csrf
      <div class="user-box">
        <input required="" name="token" type="hidden" value="{{ $token }}">
      </div>
      <div class="user-box">
        <input required="" name="email" type="text">
        <label>Email</label>
        @error('email')
        <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="user-box">
        <input required="" name="password" type="password">
        <label>New Password</label>
        @error('password')
        <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="user-box">
        <input required="" name="password_confirmation" type="password">
        <label>confirm</label>
        @error('password')
        <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      
      <center>
        <button onclick="notify()" class="submit">Reset</button>
    </form>
    <br> <br>
    <a href="{{route('login')}}" class="a2">Log in with the new password</a>
  </div></center>
  <div class="notification fadeInDown" id="notification">please check your email inbox for the new password.<br>You can change it from your profile later</div>
  <script>
    function notify() {
         var notification = document.getElementById("notification");
         var list=notification.classList;
         list.add("show");
         setTimeout(function () {
           list.add("hide");
         }, 3000);
       }
 </script>
</body>

</html>