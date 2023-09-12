<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard
    </title>
    <meta name="description" content="Roughly 155 characters">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Bad Script" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="script.js"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

     :root{
      --primary-color:#1ABC9C;
      --main:#ececec;
      --secondary-color: #E8F8F5;
      --box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      --fontfamily: "Montserrat", sans-serif;
     }  
body{
    font-family: var(--fontfamily);
    background-color: var(--main);
    width: 100%;
    overflow-x: hidden;
}
.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: var(--primary-color);
  overflow-x: hidden;
  padding-top: 10px;
  border-radius: 0px 15px 10px 0px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  height: 6vh;
  margin-bottom: 5px;
  text-decoration: none;
  font-size: 20px;
  color: #fff;
  display: block;
  border-radius: 15px;
}

.sidenav a:hover {
  background-color: #48C9B0;
}
.modal {
  display: none;
  position: fixed;
  padding-top: 250px;
  padding-left: 50px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
  z-index: 50;
}

.modal-content {
  float: left;
  position: absolute;
  top: 10%;
  background-color: #fefefe;
  border-radius: 15px;
  margin: auto;
  padding: 0;
  width: 30%;
  box-shadow:var(--box-shadow);
}

.close {
  color: #000;
  float: right;
  width: 30px;
  height: 30px;
  margin-right: 8px;
  font-size: 30px;
  background-color: #fff;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  border-radius: 20px;
  font-weight: bold;
  text-align: center;
  margin-top: 10px;
}

.close:hover,
.close:focus {
  background-color: #ddd;
  text-decoration: none;
  cursor: pointer;
}
.modal-body {
  padding: 50px 1px;
  text-align: center;
  font-family: "Spectral", serif;
}
.modal-body input {
  width:50%;
  padding: 0 20px;
  line-height: 50px;
  height: 40px;
  background-color: #fff;
  border: 2px solid #cccccc;
  border-bottom-width: 3px;
  border-radius: 5px;
  outline: 0;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.inputz:focus,.inputz:active {
  border-color: #e6e6e6;
}
.boton,.butn{
  width: 140px;
  height: 45px;
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #fff;
  background-color: var(--primary-color);
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
}
.boton:hover,.butn:hover{
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  transform: translateY(-7px);
}
#snackbar,
#toast,
#notification {
  visibility: hidden;
  min-width: 90px;
  height: 40px;
  margin-left: -125px;
  color: #0c3a20;
  background-color: #fff;
  border: none;
  border-radius: 15px;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  text-align: center;
  padding: 8px 10px 40px 10px;
  position: fixed;
  z-index: 55;
  left: 20%;
  top: 100px;
  font-size: 15px;
}

#snackbar.show,
#toast.show,
#notification.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {
    top: 0;
    opacity: 0;
  }
  to {
    top: 100px;
    opacity: 1;
  }
}

@keyframes fadein {
  from {
    top: 0;
    opacity: 0;
  }
  to {
    top: 100px;
    opacity: 1;
  }
}

@-webkit-keyframes fadeout {
  from {
    top: 100px;
    opacity: 1;
  }
  to {
    top: 0;
    opacity: 0;
  }
}

@keyframes fadeout {
  from {
    top: 100px;
    opacity: 1;
  }
  to {
    top: 0;
    opacity: 0;
  }
}
@media (max-width: 1200px) {
  .sidenav{
    width:400px !important;
  }
  .main{
    margin-left: 420px !important;
    width: 99% !important;
  }
  #view{
    left:93% !important;
  }
  #vieww{
    left:96% !important;
  }
  header h1{
    margin-left: 35% !important;
  }
  body{
    font-size: larger !important;
  }
}
@media (max-width: 900px) {
  .main{
    width: 130vw !important;
    margin-left: 50px !important;
  }
  .sidenav{
    width: 0px !important;
  }
  #bar{
    display: inline-block !important;
  }
  header h1{
    margin-left: 10% !important;
  }
  #view{
    left:70% !important;
  }
  #vieww{
    left:76% !important;
  }
}
@media (max-width: 660px){
  header h1{
    margin-left: -35% !important;
  }
  #view{
    left:55% !important;
  }
  #vieww{
    left:61% !important;
  }
  .modal-content{
    width: 50%;
  }
}
@media (max-width: 500px){
  header h1{
    margin-left: -45% !important;
  }
  #view{
    left:38% !important;
  }
  #vieww{
    left:44% !important;
  }
}
@media (max-width: 350px){
  .main{
    width: 160vw !important;
  }
  header h1{
    margin-left: -65% !important;
  }
  #view{
    left:30% !important;
  }
  #vieww{
    left:42% !important;
  }
}

header {
    height:50px;
    margin-left: 300px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 20px 50px;
    width: 100%;
    position: relative;
}
#view{
  position: absolute;
  left:62%;
}
#vieww{
  position: absolute;
  left:65%; 
}
.logout-btn{
  background: inherit;
  border: inherit;
  color: #fff;
  font-size: 25px; 
  padding: 6px 10px 6px 16px;
  text-align: start;
  border-radius: 15px;
  cursor: pointer;
  width: 100%;
  font-family: "Spectral", serif;
}

.sidenav .logout-btn:hover {
  background-color: #48C9B0;
}

.navicons{
  font-size: 25px;
  color: #1C1C1C;
  cursor: pointer;
  background-color: inherit;
  border: none;
  display: inline-block;
}
.navicons:hover{
  color: var(--primary-color);
}
.closebtn{
  position: absolute;
  top: 2%;
  margin-left: 80%;
  font-size: 35px;
  z-index: 30;
  color: #fff;
  display: none;
}
#bar{
  position: absolute;
  top: 60px;
  left: 30px;
  display: none;
  font-size: xx-large;
}
header h1{
  position: absolute;
  margin-left: 20%;
}
.main{
  margin-top: 10px;
  margin-left: 300px;
  width: 85%;
}
table.hospitalsView {
  background-color: var(--main);
  text-align: center;
  border-collapse: collapse;
  width: inherit;
  border-radius: 10px;
  box-shadow: var(--box-shadow);
}
table.hospitalsView th{
  height: 6vh;
  padding: 10px 0px;
}
table.hospitalsView td{
  padding: 10px 0px;
  height: 5vh;
}
table.hospitalsView tbody tr:hover{
background-color: #D1F2EB;
}
table.hospitalsView tbody td {
  font-size: 18px;
  font-weight: bold;
  color: #3B3B3B;
}
/*table.purpleHorizon tr:nth-child(even) {
  background: #CC3BFC;
}*/
table.hospitalsView thead {
  background: var(--primary-color);
}
table.hospitalsView thead th {
  font-size: 1.5rem;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
}
table.hospitalsView thead th:first-child {
  border-left: none;
}
#sidenav{
  width: 0px;
  height: 100%;
  transition: 0.5s;
  z-index: 40;
  top: 0;
  left: 0;
  background-color: var(--primary-color);
  overflow-x: hidden;
  padding-top: 10px;
  border-radius: 0px 15px 10px 0px;
  position: fixed;
  
}

#sidenav a {
  transition: 0.5s;
  padding: 6px 8px 6px 16px;
  height: 5vh;
  margin-bottom: 5px;
  text-decoration: none;
  font-size: 20px;
  color: #fff;
  display: block;
  border-radius: 15px;
}

#sidenav a:hover {
  background-color: #48C9B0;
}
    </style>
  </head>
  <body>
    <nav class="sidenav">
      <img src="../img/white.png" alt="logo" style="width:130px; height:130px; margin-left:5px; margin-bottom:20px;">
        <a href="javascript:void(0)" style="background-color: #76D7C4; border-radius: 10px 0px 0px 10px; border-right: solid 4px #979A9A;"><i class="fa-solid fa-house-laptop"></i> Home</a>
        <a href="{{route('ViewSubscriptions')}}"><i class="fa-sharp fa-regular fa-bell"></i> Hospital requests</a>
        <a href="#" id="addhospital"><i class="fa-solid fa-plus"></i> Add a hospital</a>
        <a href="#" id="blockk"><i class="fa-regular fa-calendar-days"></i> Set appointment</a>
        <a href="#" id="block"><i class="fa-solid fa-user-slash"></i> Block a user</a>
        <a href="{{route('viewFeedbacks')}}"><i class="fa-solid fa-comment-dots"></i> View feedbacks</a>
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
        <button type="submit" class="logout-btn" id="userlogouttt"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Log out</button>
        </form>
    </nav>
    <nav id="sidenav">
      <img src="../img/white.png" alt="logo" style="width:130px; height:130px; margin-left:5px; margin-bottom:20px;">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closse"><i class="fa-solid fa-xmark"></i></a>
      <a href="javascript:void(0)" style="background-color: #76D7C4; border-radius: 10px 0px 0px 10px; border-right: solid 4px #979A9A;"><i class="fa-solid fa-house-laptop"></i> Home</a>
      <a href="{{route('ViewSubscriptions')}}"><i class="fa-sharp fa-regular fa-bell"></i> Hospital requests</a>
      <a href="#" id="addhospitals"><i class="fa-solid fa-plus"></i> Add a hospital</a>
      <a href="#" id="blkhospitals"><i class="fa-regular fa-calendar-days"></i> Set an appointment</a>
      <a href="#" id="blkusers"><i class="fa-solid fa-user-slash"></i> Block a user</a>
      <a href="{{route('viewFeedbacks')}}"><i class="fa-solid fa-comment-dots"></i> View feedbacks</a>
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
      <button type="submit" class="logout-btn" id="userlogouttt"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Log out</button>
      </form>
    </nav>
  <div id="addModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closemodal">&times;</span>
      <form class="modal-body" action="{{route('addHos')}}" method="get">
        @csrf
        <input required class="inputz" type="text" name="name" placeholder="Enter Hospital's name" style="margin-bottom: 3px;"/>
        <input required class="inputz" type="email" name="email" placeholder="Enter E-mail" style="margin-bottom: 3px;"/>
        <input required class="inputz" type="password" name="pass" placeholder="Enter Password" style="margin-bottom: 3px;"/>
        <input required class="inputz" type="tel" name="phone" placeholder="Enter Phone number" style="margin-bottom: 3px;"/>
        <input required class="inputz" type="text" name="address" placeholder="Enter Address" style="margin-bottom: 3px;"/><br><br>
      <div style="width:50%; margin-left:100px;">
        <select required name="type" style="width: 100%; background-color: #fff; cursor: pointer; color: #194868; height: 25px; margin-bottom: 10px; border-top: #194868; border-right: #194868; border-left: #194868; border-width: 2px; font-size: 15px; ">
          <option value="">Type</option>
          <option value="governmental">Governmental</option>
          <option value="private">Private</option>
         </select>
        </div>
        <br>
        <button class="boton" type="submit" style="margin-top: 30px;" onclick="notifyy()">
          Add
        </button>
      </form>
    </div>
  </div>


    <div id="blkUserModal" class="modal">
        <div class="modal-content">
          <span class="close" id="closeUser">&times;</span>
          <form class="modal-body" action="{{route('blockUser')}}">
            <label style="font-size: 20px">Enter the user's email</label><br /><br />
            <input required class="inputz" type="text" name="userMail" placeholder="Enter E-mail"/><br /><br />
            <button class="boton" type="submit" style="margin-top: 30px;" onclick="notify()">
              Block
            </button>
          </form>
        </div>
      </div>
    
      <div id="blkHosModal" class="modal">
        <div class="modal-content">
          <span class="close" id="closeHos">&times;</span>
          <form class="modal-body" action="{{route('setdate')}}" method="POST">
            @csrf
            <input required class="inputz" type="text" name="hospitalid" placeholder="Enter hospital's id"/><br /><br />
            <input required class="inputz" type="datetime-local" name="paymentdetails" placeholder="Enter appointment-date"/><br /><br />
            <button class="boton" type="submit" style="margin-top: 30px;" onclick="set()">
              Confirm
            </button>
          </form>
        </div>
      </div>
    
      <div id="snackbar">
        <h2>Blocked successfully</h2>
      </div>
      <div id="toast">
        <h2>Added successfully</h2>
      </div>
      <div id="notification">
        <h2>Set successfully</h2>
      </div>
      <button class="navicons" onclick="openNav()"><i class="fa-sharp fa-solid fa-bars" id="bar"></i></button>
      <header>
        <h1>InCare Dashboard</h1>
       <!-- <form>
          <button class="navicons" id="view"><i class="fa-solid fa-table-columns"></i></button>
          <button class="navicons" id="vieww"><i class="fa-solid fa-border-all"></i></button>
        </form> -->
      </header>
    <section class="main">
        <table class="hospitalsView">
            <thead>
            <tr>
            <th>Hospital name</th>
            <th>Status</th>
            <th>Type</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
           @if ($hospitals->isNotEmpty())
              @foreach($hospitals as $hospital)
              <tr><td>{{$hospital->Hospital_name}}</td><td>{{$hospital->status}}</td><td>{{$hospital->type}}</td><td><form action="{{route('blockHos',$hospital->id)}}"> @csrf <button class="butn" onclick="notify()">Block</button></form></td></tr>
          @endforeach
          @else
         <tr> <td></td><td style=" font-size:25px;">There's no subscribed hospitals yet</td></tr>
          @endif
            </tbody>
            </tr>
            </table>
    </section>
    <script>
      var sidenav= document.getElementById("sidenav");
        function openNav() {
        sidenav.style.width = "300px";
       }

       function closeNav() {
        sidenav.style.width = "0px";
       }


        var addModal =document.getElementById("addModal")
        var userModal = document.getElementById("blkUserModal");
        var hospitalModal = document.getElementById("blkHosModal");
        var blockUser = document.getElementById("block");
        var blockHospital = document.getElementById("blockk");
        var blockUsers = document.getElementById("blkusers");
        var blockHospitals = document.getElementById("blkhospitals");
        var addhospital =document.getElementById("addhospital");
        var addhospitals =document.getElementById("addhospitals");
        addhospital.onclick = function () {
          addModal.style.display = "block";
        };
        addhospitals.onclick = function () {
          addModal.style.display = "block";
        };
        blockUser.onclick = function () {
          userModal.style.display = "block";
        };
        blockHospital.onclick = function () {
          hospitalModal.style.display = "block";
        };
        blockUsers.onclick = function () {
          userModal.style.display = "block";
        };
        blockHospitals.onclick = function () {
          hospitalModal.style.display = "block";
        };
        var span = document.getElementById("closeUser");
        span.onclick = function () {
          userModal.style.display = "none";
        };
        var spann = document.getElementById("closeHos");
        spann.onclick = function () {
          hospitalModal.style.display = "none";
        };
        var spannn =document.getElementById("closemodal");
        spannn.onclick = function () {
          addModal.style.display = "none";
        };
       /* window.onclick = function (event) {
          if (event.target == userModal) {
              userModal.style.display = "none";
          }
        };
        window.onclick = function (event) {
          if (event.target == hospitalModal) {
              hospitalModal.style.display = "none";
          }
        };*/
        function notify() {
          userModal.style.display = "none";
          var toast = document.getElementById("snackbar");
          var list=toast.classList;
          list.add("show");
          setTimeout(function () {
            list.remove("show");
          }, 3000);
        }
        function notifyy() {
          addModal.style.display = "none";
          var toastt = document.getElementById("toast");
          toastt.className = "show";
          setTimeout(function () {
            toastt.className = toastt.className.replace("show", "");
          }, 3000);
        }

        function set() {
          hospitalModal.style.display = "none";
          var notification = document.getElementById("notification");
          notification.className = "show";
          setTimeout(function () {
            notification.className = notification.className.replace("show", "");
          }, 3000);
        }
        </script>
  </body>
</html>