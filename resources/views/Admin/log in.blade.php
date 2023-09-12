<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

body {
  background-color: #ececec;
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
  width: 400px;
  height: 550px;
  padding: 40px;
  margin: 20px auto;
  transform: translate(-50%, -55%);
  background: #1abc9c;
  box-sizing: border-box;
  border-radius: 10px;
  box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.login-box h2 {
  margin-top: -20px;
  letter-spacing: 2px;
  text-align: center;
  color: #fff;
}


.user-box {
  position: relative;
}

.user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  margin-bottom: 30px;
  border: none;
  border-bottom: 2px solid #ececec;
  outline: none;
  background: transparent;
  color: #fff;
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
  font-size: 12px;
}

.submit {
  background-color: inherit;
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
  border: 1px solid #fff;
  cursor: pointer;
}

.submit:hover {
  background: #fff;
  color: #1abc9c;
  border-radius: 5px;
}

@media (max-width: 400px){
.login-box{
  position: absolute !important;
  width: 100vw !important;
  height: 550px!important;
  top: 50%;
}
.submit{
  padding: 10px 30px !important;
}
}
.text-danger{
margin-bottom: 10px;
}
  </style>
</head>

<body>
  <div class="login-box">
<center> <img src="../img/white.png" alt="logo" style="width:200px; height:200px;"> </center>
  <h2>Welcome back!</h2>
    <form method="post" action="{{route('admin.login')}}">
      @csrf
      <div class="user-box">
        <input required value="{{old('email')}}" name="email" type="text">
        <label>E-mail</label>
        @error('email')
        <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="user-box">
        <input required name="password" type="password">
        <label>Password</label>
        @error('password')
        <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <center>
        <button type="submit" class="submit">Sign in </button>
      </center>
    </form>
  </div>
</body>

</html>