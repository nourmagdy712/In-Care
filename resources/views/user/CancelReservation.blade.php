<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>CancelReservation</title>
    <meta name="description" content="Roughly 155 characters">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/CancelReservation.css')}}">
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
        <a href="{{route('user.cancelReservation')}}"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px  #fff;background-color:#40719281;"  id="usercancelreserv"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
        <a href="{{route('UserReservationHis')}}" id="userreservationhis"><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> Reservation history</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
        <button type="submit" class="logout-btn" id="userlogouttt"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Log out</button>
        </form>
    </nav>
    <nav id="sidenav">
      <img src="../img/white.png" alt="logo" style="width:130px; height:130px; margin-left:5px; margin-bottom:20px;">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closse"><i class="fa-solid fa-xmark"></i></a>
      <a href="{{route('home')}}" id="userhome"><i class="fas fa-house"></i> Home</a>
       {{-- <a href="{{route('profile')}}" id="userpro" ><i class="fa-solid fa-user" style="color: #ffffff;"></i> Profile</a>--}}
      <a href="{{route('profile.edit')}}" id="userupdatepro"><i class="fa-solid fa-user" style="color: #ffffff;"></i> Profile</a>
      <a href="{{route('response')}}" id="userviewres" ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
      <a href="{{route('user.FeedBack')}}" id="userfeedback"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
      <a href="{{route('user.cancelReservation')}}"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px  #fff;background-color:#40719281;" id="usercancelres"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
      <a href="{{route('UserReservationHis')}}" id="userreservationhiss"><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> Reservation history</a>
      <form method="POST" action="{{ route('logout') }}">
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
      @foreach ($reservations as $reservation)
        <div class="column">
          <div class="content">
            <i class="fa-regular fa-hospital" style="color: #194868; font-size: x-large; padding-right:5px;"></i><h2 style="color:#194868; display: inline;">{{$reservation->Hospital->Hospital_name}}</h2><br><br>
            <h3 style="color:#000; display: inline; padding-left:10px;">Patient's name: {{$reservation->name}}</h3><br><br>
            <h3 style="color:#000; display: inline; padding-left:10px;">Status: {{$reservation->request_status}}</h3>
             <button  class="but" id="cancelll" style="background-color:#194868 ;width: 105px; height: 40px;border:none; border-radius: 10px; color: #ffffff; font-weight: bold; margin-left: 30px; font-size: 15px; "><i class="fa-solid fa-ban" style="color: #ffffff; font-size: 12px;"></i><a href="{{route('cancel',$reservation->id)}}" style="color: #ffffff; text-decoration: none;"> Cancel </a></button>
              <br />
             </div>
        </div>
        @endforeach

        @foreach ($requests as $request)
        <div class="column">
          <div class="content">
            <i class="fa-solid fa-truck-medical" style="color: #194868; font-size: x-large;"></i>
            <h2 style="color:#194868; display: inline;">{{$request->Hospital->Hospital_name}}</h2><br><br>
            <h3 style="color:#000; display: inline; padding-left:10px;">Patient's name: {{$request->name}}</h3><br><br>
            <h3 style="color:#000; display: inline; padding-left:10px;">Status: {{$request->request_status}}</h3>
             <button  class="but" id="cancelll" style="background-color:#194868 ;width: 105px; height: 40px; border-radius: 10px; color: #ffffff; font-weight: bold; margin-left: 30px; font-size: 15px; "><i class="fa-solid fa-ban" style="color: #ffffff; font-size: 12px;"></i><a href="{{route('cancelAmb',$request->id)}}" style="color: #ffffff; text-decoration: none;"> Cancel </a></button>
              <br />
             </div>
        </div>
        @endforeach

      </div>
           
          
            <div id="cancelresmodal" class="modal">
                <div class="modal-content">
                  <form class="modal-body">
                    <i class="fa-solid fa-ban fa-shake fa-2xl" style="color:#194868;display:flex;justify-content:center;padding-bottom: 20px;"></i>
                    <label style="font-size: 20px;">Are you sure you want to cancel your request?</label><br /><br />
                    <div class="container" style="display:flex;justify-content: space-around;">
                      <button class="boton" type="button" style="margin-top: 30px;"><a href="#" style="text-decoration: none; color: #ffffff;" onclick="cancelyes()">Yes</a></button>
                      <button class="boton"  type="button" style="margin-top: 30px;" onclick="notify()"> No </button>
                    </div>
                     </form>
                </div>
              </div>
           

              <div id="toast" >
                <h2>Request is cancelled</h2>
              </div>
       
    <script>
      var sidenav= document.getElementById("sidenav");
        function openNav() {
        sidenav.style.width = "300px";
       }

       function closeNav() {
        sidenav.style.width = "0px";
       }

       /* var logout = document.getElementById("logout");
        var userlogout = document.getElementById("userlogout");
        var userlogouttt = document.getElementById("userlogouttt");
        var cancelbtn = document.getElementById("cancell");
        var cancelbtnn = document.getElementById("cancelll");
        var cancelres = document.getElementById("cancelresmodal");
        
        cancelbtn.onclick = function () {
          cancelresmodal.style.display = "block";
        };

        cancelbtnn.onclick = function () {
          cancelresmodal.style.display = "block";
        }; 

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
        

        function notify() {
          cancelres.style.display = "none";
        };

        function cancelyes() {
          cancelres.style.display = "none";
          var toastt = document.getElementById("toast");
          toastt.className = "show";
          setTimeout(function () {
            toastt.className = toastt.className.replace("show", "");
          }, 3000);
        }*/
        </script>
</body>
</html>