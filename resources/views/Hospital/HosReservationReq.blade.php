<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>HosReservationReq</title>
    <meta name="description" content="Roughly 155 characters">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/HosReservationReq.css')}}">
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
        <a href="{{route('hospital.update')}}" id="hosupdate"><i class="fa-solid fa-hospital" style="color: #ffffff;"></i> Profile</a>
        <a href="{{route('hospitalViewres')}}" id="hosviewresp"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
        <a href="{{route('hospitalFeedback')}}" id="hosfeedbackk"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
        <a href="{{route('reservationRequests')}}" id="hosreservationreq"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff; background-color: #40719281; " ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> Reservation requests</a>
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
      <a href="{{route('hospital.update')}}" id="hosupdate"><i class="fa-solid fa-hospital" style="color: #ffffff;"></i> Profile</a>
      <a href="{{route('hospitalViewres')}}" id="hosviewresp"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
      <a href="{{route('hospitalFeedback')}}" id="hosfeedback"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
      <a href="{{route('reservationRequests')}}" id="hosreservationreqq"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff; background-color:#40719281; " ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> Reservation requests</a>
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
    
      <button class="navicons"  onclick="openNav() "><i class="fa-sharp fa-solid fa-bars" id="bar"></i></button>
      
      <div class="row">
        <header>
            <i class="fa-solid fa-pen-to-square fa-2xl" style="color: #194868;"></i>
            <h2 style="font-size: 40px; color: #194868; display: inline-block; padding-left: 5px; "> Reservation Requests </h2>
          </header>
          @foreach($reservations as $reservation)
        <div class="column">
          <div class="content">
                <label><i class="fa-solid fa-user-large" style="color:#194868 ;"></i> Name:</label>
                <p style="display: inline;">{{$reservation->name}}</p>
                 <br><br>
                <label><i class="fa-solid fa-user-clock" style="color: #194868;"></i> Age:</label>
                <p style="display: inline;">{{$reservation->age}}</p>
                <br><br>
                <label><i class="fa-solid fa-venus-mars" style="color: #194868;"></i> Gender:</label>
                <p style="display: inline;">{{$reservation->gender}}</p>
                <br><br>
                <label><i class="fa-regular fa-calendar-days" style="color: #194868;"></i> Request Date:</label>
                <p style="display: inline;">{{$reservation->created_at}}</p>
                <br><br>
                <label><i class="fa-solid fa-phone" style="color: #194868;"></i> Phone number:</label>
                <p style="display: inline;">{{$reservation->phone}}</p>
                <br><br>
                <label><i class="fa-solid fa-bed" style="color: #194868;"></i> Condition:</label><br><br>
                <button id="download"><i class="fa-solid fa-file-arrow-down"></i> <a download href="{{asset('reports/'.$reservation->condition)}}" style="text-decoration: none; color: #194868;">Download report</a></button><br><br>
                <form action="{{route('rejectres',$reservation->id)}}"  style="display: inline;"> @csrf
                  <button id="decline" class="buttons"> <i class="fa-solid fa-xmark"></i> Decline </button>
                </form>
                <form action="{{route('acceptres',$reservation->id)}}"  style="display: inline;"> @csrf
                 <button id="accept" class="buttons"> <i class="fa-solid fa-check"></i> Accept </button>
              </form>
            </div>
             </div>
             @endforeach
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
        

       /* let download=document.getElementById("download");
        download.onclick=function(){
        download.classList.add("active");
        }*/
        </script>
</body>
</html>