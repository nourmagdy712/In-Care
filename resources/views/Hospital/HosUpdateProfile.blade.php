<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile</title>
    <meta name="description" content="Roughly 155 characters">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/HosUpdateProfile.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Bad Script" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <nav class="sidenav">
      <img src="../img/white.png" alt="logo" style="width:130px; height:130px; margin-left:5px; margin-bottom:20px;">
        <a href="{{route('hospital.home')}}" id="hoshome"><i class="fas fa-house"></i> Home</a>
      {{-- <a href="{{route('hospital.profile')}}" id="hosrprofile" ><i class="fa-solid fa-hospital" style="color: #ffffff;"></i> Profile</a>--}} 
        <a href="{{route('hospital.update')}}" id="hosupdate" style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff; background-color:#40719281;"><i class="fa-solid fa-hospital" style="color: #ffffff;"></i> Profile</a>
        <a href="{{route('hospitalViewres')}}" id="hosviewresp"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
        <a href="{{route('hospitalFeedback')}}" id="hosfeedbackk"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
        <a href="{{route('reservationRequests')}}" id="hosreservationreq"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> Reservation requests</a>
        <a href="{{route('ambulanceRequests')}}" id="hosambulancereq"><i class="fa-solid fa-truck-medical" style="color: #ffffff;"></i> Ambulance requests</a>
        <form method="POST" action="{{ route('hospital.logout') }}">
          @csrf
        <button type="submit" class="logout-btn" id="userlogouttt"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Log out</button>
        </form>    </nav>
    <nav id="sidenav">
      <img src="../img/white.png" alt="logo" style="width:130px; height:130px; margin-left:5px; margin-bottom:20px;">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closse"><i class="fa-solid fa-xmark"></i></a>
      <a href="{{route('hospital.home')}}" id="hoshomee"><i class="fas fa-house"></i> Home</a>
      {{-- <a href="{{route('hospital.profile')}}" id="hosrprofile" ><i class="fa-solid fa-hospital" style="color: #ffffff;"></i> Profile</a>--}} 
      <a href="{{route('hospital.update')}}" id="hosupdate" style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff;background-color:#40719281;"><i class="fa-solid fa-hospital" style="color: #ffffff;"></i> Profile</a>
      <a href="{{route('hospitalViewres')}}" id="hosviewresp"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
      <a href="{{route('hospitalFeedback')}}" id="hosfeedback"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
      <a href="{{route('reservationRequests')}}" id="hosreservationreqq"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> Reservation requests</a>
      <a href="{{route('ambulanceRequests')}}" id="hosambulancereqq"><i class="fa-solid fa-truck-medical" style="color: #ffffff;"></i> Ambulance requests</a>
      <form method="POST" action="{{ route('hospital.logout') }}">
        @csrf
      <button type="submit" class="logout-btn" id="userlogouttt"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Log out</button>
      </form>    </nav>
    
    
      <div id="logout" class="modal">
        <div class="modal-content">
          <form class="modal-body">
            <i class="fa-regular fa-face-frown-open fa-shake fa-2xl" style="color:#194868;display:flex;justify-content:center;padding-bottom: 20px;"></i>
            <label style="font-size: 20px">Are you sure you want to log out?</label><br /><br />
            <div class="container" style="display:flex;justify-content: space-around;">
              <button class="boton" type="button" style="margin-top: 30px;"><a href="log in.html" style="text-decoration: none; color: #ffffff;">Yes</a></button>
              <button class="boton" type="button" style="margin-top: 30px;" onclick="notifyy()"> No </button>
            </div>
             </form>
        </div>
      </div>
    
      <button class="navicons" onclick="openNav()"><i class="fa-sharp fa-solid fa-bars" id="bar"></i></button>
      
      <div class="login-box">
        <h1><i class="fa-solid fa-hospital" style="margin-right: 10px;"></i>Welcome {{Auth::guard('hospital')->user()->Hospital_name}}</h1>
        <h3 class="aaa"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</h3>
        <form method="POST" action="{{route('hospital.edit')}}">
          @csrf
          @method('PUT')
          <div class="user-box">
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <input required name="name" type="text" value="{{Auth::guard('hospital')->user()->Hospital_name}}">
            <label>Hospital name</label>
          </div>
          <div class="user-box">
            @error('email')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <input required name="email" type="text" value="{{Auth::guard('hospital')->user()->email}}">
            <label>Email</label>
          </div>
          <div class="user-box">
            @error('phone')
            <div class="text-danger">{{$message}}</div>
            @enderror
              <input required name="phone" type="tel" value="{{Auth::guard('hospital')->user()->phone}}">
              <label>Phone Number</label>
            </div>
          <div class="user-box">
            @error('address')
            <div class="text-danger">{{$message}}</div>
            @enderror
              <input required name="address" type="text" value="{{Auth::guard('hospital')->user()->address}}">
              <label>Address</label>
            </div>
          <div class="user-box">
               <select required name="availability" style="width: 100%; background-color: #fff; cursor: pointer; color: #194868; height: 25px; margin-bottom: 10px; border-top: #194868; border-right: #194868; border-left: #194868; border-width: 2px; font-size: 15px; ">
                <option value="{{Auth::guard('hospital')->user()->availability}}"> Availability Of Beds</option>
                <option value="available"> Available</option>
                <option value="unavailable"> Not Available</option>
               </select>
             {{-- <span>{{Auth::guard('hospital')->user()->availability}}</span> --}} 
              </div>
          <center>
            <button class="submit" onclick="update()"> Update </button> <br><br>
            <a style="color:#194868" href="{{route('hpassupdate')}}">Update password</a>
          </center>
        </form>
      </div>
      <div id="toast">
        <h2>Updated Successfully</h2>
      </div>
    <script>
      var sidenav= document.getElementById("sidenav");
        function openNav() {
        sidenav.style.width = "300px";
       }

       function closeNav() {
        sidenav.style.width = "0px";
       }

        var logout = document.getElementById("logout");
        var userlogout = document.getElementById("userlogout");
        var userlogouttt = document.getElementById("userlogouttt");
        userlogout.onclick = function () {
          logout.style.display = "block";
        };
        userlogouttt.onclick = function () {
          logout.style.display = "block";
        };
        
        window.onclick = function (event) {
          if (event.target == logout) {
              userModal.style.display = "none";
          }
        };
        
        function notifyy() {
          logout.style.display = "none";
        };

        function update() {
          var toastt = document.getElementById("toast");
          toastt.className = "show";
          setTimeout(function () {
            toastt.className = toastt.className.replace("show", "");
          }, 3000);
        };
        </script>
</body>
</html>