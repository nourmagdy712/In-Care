
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>UserFeedback</title>
    <meta name="description" content="Roughly 155 characters">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/UserFeedback.css')}}">
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
        <a href="{{route('response')}}" id="userviewresp"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
        <a href="{{route('user.FeedBack')}}" id="userfeedbackk" style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff;background-color:#40719281;"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
        <a href="{{route('user.cancelReservation')}}" id="usercancelreserv"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
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
      <a href="{{route('response')}}" id="userviewres"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
      <a href="{{route('user.FeedBack')}}" id="userfeedback"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff;background-color:#40719281;" ><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
      <a href="{{route('user.cancelReservation')}}" id="usercancelres"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
      <a href="{{route('UserReservationHis')}}" id="userreservationhiss"><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> Reservation history</a>
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
    
      <button class="navicons" onclick="openNav()"><i class="fa-sharp fa-solid fa-bars" id="bar"></i></button>
      
    <section class="main">
      <header>
        <i class="fa-regular fa-comments fa-2xl" style="color: #194868;"></i>
        <h2 style="font-size: 40px;color: #194868; padding-left: 5px;"> Feedback </h2>
      </header>
     <form id="formm" method="POST" action="{{route('feedback')}}">
        @csrf
      <section class="protable">
        <div class="item">
        <i class="fa-solid fa-comment iconn" style="color: #194868;"></i>
        <h5 style="padding-left: 5px; font-weight: lighter;">How do you feel about the support you received from Incare ?</h5><br><br>
        </div>
        <div class="containers">
           <label for="first" id="great" class="containerr" style="color: #194868; font-size: 20px; font-weight: bold;">
            <input style="display: none" id="first" type="radio" value="Great" name="reaction"> <i class="fa-regular fa-face-smile fa- fa-2xl" style="color: #194868;"></i>
            <p class="one">Great</p>
           </label><br><br>
           <label for="second" id="average" class="containerr" style="color: #194868; font-size: 20px; font-weight: bold;">
            <input style="display: none" id="second" type="radio" value="Indifferent" name="reaction"> <i class="fa-regular fa-face-frown-open fa- fa-2xl" style="color: #194868;"></i>
            <p class="one">Indifferent</p>
           </label>
           <label for="third" id="bad" class="containerr" style="color: #194868; font-size: 20px; font-weight: bold;">
           <input style="display: none" id="third" type="radio" value="Unhappy" name="reaction"><i class="fa-regular fa-face-sad-tear fa- fa-2xl" style="color: #194868;"></i>
            <p class="one">Unhappy</p>
           </label>
        </div>
          <p  class="para"style="float: left; color: black; font-weight: lighter; font-size: 20px; margin-left: 120px;">
            Do you have any additional feedback for us? We are listening....
          </p>
          <br><br>
          @error('feedback')
          <div class="text-danger">{{$message}}</div>
          @enderror
          <textarea required name="content" cols="100" rows="6" placeholder=" Tell us what is on your mind..." style="margin-left: 20px; background-color:#fcfcfc ; border-color: darkblue;border-radius: 10px;" ></textarea><br>
          <button type="submit" id="subfeedback" onclick="feedbackk()" > Submit Feedback</button>
        </section>
     </form>
      </section>

    <div id="toast">
      <h2>Feedback is sent</h2>
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

        /* userlogout.onclick = function () {
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

        function feedbackk() {
          var toastt = document.getElementById("toast");
          toastt.className = "show";
          setTimeout(function () {
            toastt.className = toastt.className.replace("show", "");
          }, 3000);
        };
        /*for feedback reactions*/
        let great=document.getElementById("great");
        let average=document.getElementById("average");
        let bad=document.getElementById("bad");

        great.onclick=function(){
          great.classList.add("active");
          average.classList.remove("active");
          bad.classList.remove("active");
        }
        average.onclick=function(){
          average.classList.add("active");
          great.classList.remove("active");
          bad.classList.remove("active");
        }
        bad.onclick=function(){
          bad.classList.add("active");
          average.classList.remove("active");
          great.classList.remove("active");
        }
        
        </script>
</body>
</html>