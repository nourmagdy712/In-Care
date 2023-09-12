<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>UserReservationHis</title>
    <meta name="description" content="Roughly 155 characters">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/UserReservationHis.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Bad Script" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <nav class="sidenav">
      <img src="../img/white.png" alt="logo" style="width:130px; height:130px; margin-left:5px; margin-bottom:20px;">
        <a href="{{route('home')}}" id="userhome"><i class="fas fa-house"></i> Home</a>
       {{-- <a href="{{route('profile')}}" id="userpro" ><i class="fa-solid fa-user" style="color: #ffffff;"></i> Profile</a>--}}
        <a href="{{route('profile.edit')}}" id="userupdatepro"><i class="fa-solid fa-user" style="color: #ffffff;"></i> Profile</a>
        <a href="{{route('response')}}" id="userviewresp" ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
        <a href="{{route('user.FeedBack')}}" id="userfeedbackk"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
        <a href="{{route('user.cancelReservation')}}"  id="usercancelreserv"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
        <a href="{{route('UserReservationHis')}}" id="userreservationhis"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff;background-color:#40719281;" ><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> Reservation history</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
        <button type="submit" class="logout-btn" id="userlogouttt"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Log out</button>
        </form>    </nav>
    <nav id="sidenav">
      <img src="../img/white.png" alt="logo" style="width:130px; height:130px; margin-left:5px; margin-bottom:20px;">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closse"><i class="fa-solid fa-xmark"></i></a>
      <a href="{{route('home')}}" id="userhome"><i class="fas fa-house"></i> Home</a>
       {{-- <a href="{{route('profile')}}" id="userpro" ><i class="fa-solid fa-user" style="color: #ffffff;"></i> Profile</a>--}}
      <a href="{{route('profile.edit')}}" id="userupdatepro"><i class="fa-solid fa-user" style="color: #ffffff;"></i> Profile</a>
      <a href="{{route('response')}}" id="userviewres" ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
      <a href="{{route('user.FeedBack')}}" id="userfeedback"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
      <a href="{{route('user.cancelReservation')}}" id="usercancelres"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
      <a href="{{route('UserReservationHis')}}" id="userreservationhiss"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px#fff;background-color:#40719281;" ><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> Reservation history</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
      <button type="submit" class="logout-btn" id="userlogouttt"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Log out</button>
      </form>
    </nav>
  
    
    
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
            <i class="fa-solid fa-clock-rotate-left fa-2xl" style="color: #194868; "></i>
            <h2 style="font-size: 40px; color: #194868; display: inline-block; padding-left: 5px; "> Your History </h2>
          </header>
          @foreach ($histories as $history)
        <div class="column">
          <div class="content">
            <form action="{{route('UserReservationHis')}}">
                <label><i class="fa-regular fa-calendar-days" style="color: #194868;"></i> Request date:</label>
                <p style="display: inline;">{{$history->created_at}}</p>
                 <br><br>
                <label><i class="fa-solid fa-user-large" style="color:#194868 ;"></i> Patient name:</label>
                <p style="display: inline;">{{$history->name}}</p>
                <br><br>
                <label><i class="fa-solid fa-user-clock" style="color: #194868;"></i> Age:</label>
                <p style="display: inline;">{{$history->age}}</p>
                <br><br>
                <label><i class="fa-solid fa-venus-mars" style="color: #194868;"></i> Gender:</label>
                <p style="display: inline;">{{$history->gender}}</p>
                <br><br>
                <label><i class="fa-solid fa-hospital" style="color: #194868;"></i> Hospitalname:</label>
                <p style="display: inline;">{{$history->Hospital->Hospital_name}}</p>
                <br><br>
                <label><i class="fa-sharp fa-solid fa-clipboard-list" style="color:#194868;"></i> Request status:</label>
                <p style="display: inline;">{{$history->request_status}}</p>
                <br><br>
            </form>
          </div>
        </div>
        @endforeach

        </div>
             {{-- <div class="column">
                <div class="content">
                  <form>
                      <label><i class="fa-regular fa-calendar-days" style="color: #194868;"></i> Request date:</label>
                      <p style="display: inline;">12/02/2023</p>
                       <br><br>
                      <label><i class="fa-solid fa-user-large" style="color:#194868 ;"></i> Patient name:</label>
                      <p style="display: inline;">Sarah Mohamed</p>
                      <br><br>
                      <label><i class="fa-solid fa-user-clock" style="color: #194868;"></i> Age:</label>
                      <p style="display: inline;">55</p>
                      <br><br>
                      <label><i class="fa-solid fa-venus-mars" style="color: #194868;"></i> Gender:</label>
                      <p style="display: inline;">female</p>
                      <br><br>
                      <label><i class="fa-solid fa-hospital" style="color: #194868;"></i> Hospitalname:</label>
                      <p style="display: inline;">Dokki Hospital</p>
                      <br><br>
                      <label><i class="fa-sharp fa-solid fa-clipboard-list" style="color:#194868;"></i> Request status:</label>
                      <p style="display: inline;">pending</p>
                      <br><br>
                    </form>
                  </div>
                   </div> --}}

         
       
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
        

       /*userlogout.onclick = function () {
          logout.style.display = "block";
        };
        userlogouttt.onclick = function () {
          logout.style.display = "block";
        };*/
        
        window.onclick = function (event) {
          if (event.target == logout) {
              userModal.style.display = "none";
          }
        };
        
        function notifyy() {
          logout.style.display = "none";
        };
        
        </script>
</body>
</html>