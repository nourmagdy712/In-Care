<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>UserViewResponse</title>
    <meta name="description" content="Roughly 155 characters">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/UserViewResponse.css')}}">
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
        <a href="{{route('response')}}" id="userviewresp"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff;background-color:#40719281;" ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
        <a href="{{route('user.FeedBack')}}" id="userfeedbackk"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
        <a href="{{route('user.cancelReservation')}}" id="usercancelreserv"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
        <a href="{{route('UserReservationHis')}}" id="userreservationhis"><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> Reservation history</a>
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
      <a href="{{route('response')}}" id="userviewres"style="border-radius: 10px 0px 0px 10px; border-right: solid 4px #fff;background-color:#40719281;" ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #ffffff;"></i> View response</a>
      <a href="{{route('user.FeedBack')}}" id="userfeedback"><i class="fa-solid fa-comments" style="color: #ffffff;"></i> Send feedback</a>
      <a href="{{route('user.cancelReservation')}}" id="usercancelres"><i class="fa-sharp fa-solid fa-rectangle-xmark" style="color: #ffffff;"></i> Cancel reservation</a>
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
       @isset($acceptedRes)
         @foreach ($acceptedRes as $accepted)
         <div class="column">
          <div class="content">
            <h2 style="color:#194868"><i class="fa-solid fa-bed-pulse"></i> {{$accepted->Hospital->Hospital_name}}</h2>
            <br />
            <label class="labels" style="font-weight: bold; font-size:18px;"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #194868;"></i> your reservation request is accepted<br><br>please note that your reservation is valid for only 2 hours</label>
              <br /><br />
            <label class="labels" style="font-weight: bold; font-size: 18px;" ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #194868;"></i> you can request an ambulance</label >
                <button onclick="ambulance()" style="background-color:#194868 ; cursor: pointer; width: 75px; height: 35px; border-radius: 10px; margin-left: 5px;"><i class="fa-solid fa-truck-medical" style="color: #ffffff; font-size: 20px;"></i></button>
              <br />
          </div>
         </div>
         @endforeach
        @endisset
        @isset($rejectedRes)   
        @foreach ($rejectedRes as $rejected)
        <div class="column">
          <div class="content">
            <h2 style="color: #194868"><i class="fa-solid fa-bed-pulse"></i> {{$rejected->Hospital->Hospital_name}}</h2>
            <br />
            <label class="labels"style="font-weight: bold; font-size:18px;" ><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #194868;"></i> Unfortunately they can't take your condition right now</label>
              <br /><br />
            <label class="labels" style="font-weight: bold; font-size:18px;"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #194868;"></i> you can search for another hospital here</label >
              <button  id="but" style="background-color:#194868 ;width: 75px; height: 35px; border-radius: 10px; margin-left: 5px; color: #ffffff; font-weight: bold;"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;font-size: 10px;" ></i><a href="{{route('search')}}" style="color: #ffffff; text-decoration: none;"> Search </a></button>
              <br />
          </div>
        </div>
 @endforeach
@endisset
@isset($acceptedReq)  
@foreach($acceptedReq as $accReq)
        <div class="column">
          <div class="content">
            <h2 style="color: #194868"><i class="fa-solid fa-truck-medical"></i> {{$accReq->Hospital->Hospital_name}}</h2>
            <br />
            <label class="labels" style="font-weight: bold; font-size:18px;"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #194868;"></i> There's an ambulance in its way to you<br><br>Contact the hospital: <span style="color: #194868;">{{$accReq->Hospital->phone}}</span></label> 
          </div>
        </div>
@endforeach
@endisset
@isset($rejectedReq) 
@foreach($rejectedReq as $rejReq)
          <div class="column" style="margin-bottom: 15px;">
          <div class="content">
            <h2 style="color: #194868"><i class="fa-solid fa-truck-medical"></i> {{$rejReq->Hospital->Hospital_name}}</h2>
            <br />
            <label class="labels" style="font-weight: bold; font-size:18px;"><i class="fa-sharp fa-solid fa-clipboard-list" style="color: #194868;"></i> Unfortunately there is no available ambulance right now</label> 
          </div>
        </div>
        @endforeach
        @endisset
             
            <div id="ambulancereqModal" class="modal">
                <div   class="modal-content">
                  <span class="close" id="closemodal"><i class="fa-solid fa-xmark"></i></span>
                  <form class="modal-body" method="POST" action="@isset($accepted){{route('requestAmbu',$accepted->Hospital->id)}}@endisset">
                    @csrf
                   <i class="fa-solid fa-truck-medical" style="text-align: center; font-size: 50px; color:#194868 ;" ></i><p style="font-size: 27px; color: #194868;"> Request Ambulance</p><br>
                    <input class="inputz" type="text" name="name" placeholder="Enter your name" required style="margin-bottom: 3px;"/>
                    <input class="inputz" type="text" name="address" placeholder="Enter your location" required style="margin-bottom: 3px;"/> 
                    <input class="inputz" type="tel" name="phone" placeholder="Enter your phone number"required style="margin-bottom: 3px;"/>
                     <br>
                    <button class="boton" type="submit" style="margin-top: 30px;" onclick="amb()" >
                      Done
                    </button>
                  </form>
                </div>
              </div>

              <div id="toast" >
                <h2>Request is sent</h2>
              </div>
       
    <script>
      var sidenav= document.getElementById("sidenav");
        function openNav() {
        sidenav.style.width = "300px";
       }

       function closeNav() {
        sidenav.style.width = "0px";
       }

      /*  var logout = document.getElementById("logout");
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
        */
        var ambreqModal = document.getElementById("ambulancereqModal");
        
       function ambulance() {
          ambreqModal.style.display = "block";
        };

        
        var spannn =document.getElementById("closemodal");
        spannn.onclick = function () {
           ambreqModal.style.display = "none";
        };
    
        function amb() {
          ambreqModal.style.display = "none";
          var toastt = document.getElementById("toast");
          toastt.className = "show";
          setTimeout(function () {
            toastt.className = toastt.className.replace("show", "");
          }, 3000);
        };
        </script>
</body>
</html>