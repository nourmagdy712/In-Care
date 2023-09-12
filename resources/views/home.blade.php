<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
	<link rel="stylesheet" href="{{asset('/css/home.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
	<nav>
		<div class="menu-icon">
			<span id="btn" class="fas fa-bars"></span>
		</div>
		<div class="logo">
			<span style="color: rgb(131, 180, 219);"> I</span>nCare
		</div>
		<div class="nav-items">
			<li><a href="{{route('home')}}" id="home">Home</a></li>
			<li><a href="#ab" id="about">About</a></li>
			<li><a href="#contact" id="contactt">Contact</a></li>
			@if(Auth::guest())
			<li>
				<div class="dropbox">
					<a class="dropbtn" id="register">Register</a>
					<div class="dropcontent">
						<a href="{{route('registeruser')}}">as a patient</a>
						<a href="{{route('registerhospital')}}">as a hospital</a>
					</div>
			</li>
			@endif
		</div>
		<div class="search-icon">
			<span class="fas fa-search"></span>
		</div>
		<div class="cancel-icon">
			<span class="fas fa-times"></span>
		</div>
		<form action="{{route('search')}}">
			<input type="search" name="search" class="search-data" placeholder="Search" required>
			<button type="submit" class="fas fa-search"></button>
		</form>
		{{-- <a href="#"> <i class="fa-solid fa-globe" style="font-size: 18px; color: aliceblue; margin-left: 10px;"
			id="language"></i></a> --}}
		@if (!Auth::guest())
		 @if(Auth::guard('hospital')->user())
		 <a href="{{route('hospital.update')}}"> <i class="fa-solid fa-hospital fa-2xl" style="font-size: 18px; color: aliceblue; margin-left: 10px;" id="prof"></i></a>
		 
		 {{-- @elseif(!Auth::guard()->user()) --}}
		 @else @auth()
		 <a href="{{route('profile.edit')}}"> <i class="fa-solid fa-user" style="font-size: 18px; color: aliceblue; margin-left: 10px;" id="prof"></i></a>
		 @endauth
		 @endif
		 @endif
	</nav>
	<!-- responsive nav -->
	<script>
		const menuBtn = document.querySelector(".menu-icon span");
		const searchBtn = document.querySelector(".search-icon");
		const cancelBtn = document.querySelector(".cancel-icon");
		const items = document.querySelector(".nav-items");
		const form = document.querySelector("form");
		menuBtn.onclick = () => {
			items.classList.add("active");
			menuBtn.classList.add("hide");
			searchBtn.classList.add("hide");
			cancelBtn.classList.add("show");
		}
		cancelBtn.onclick = () => {
			items.classList.remove("active");
			menuBtn.classList.remove("hide");
			searchBtn.classList.remove("hide");
			cancelBtn.classList.remove("show");
			form.classList.remove("active");
			cancelBtn.style.color = "steelblue";
		}
		searchBtn.onclick = () => {
			form.classList.add("active");
			searchBtn.classList.add("hide");
			cancelBtn.classList.add("show");
		}

		let home = document.getElementById("home");
		let contacttt = document.getElementById("about");
		let about = document.getElementById("contactt");
		let language = document.getElementById("language");

		home.onclick = function () {
			items.classList.remove("active");
			menuBtn.classList.remove("hide");
			searchBtn.classList.remove("hide");
			cancelBtn.classList.remove("show");
			form.classList.remove("active");
			cancelBtn.style.color = "steelblue";
		}
		about.onclick = function () {
			items.classList.remove("active");
			menuBtn.classList.remove("hide");
			searchBtn.classList.remove("hide");
			cancelBtn.classList.remove("show");
			form.classList.remove("active");
			cancelBtn.style.color = "steelblue";
		}
		contacttt.onclick = function () {
			items.classList.remove("active");
			menuBtn.classList.remove("hide");
			searchBtn.classList.remove("hide");
			cancelBtn.classList.remove("show");
			form.classList.remove("active");
			cancelBtn.style.color = "steelblue";
		}
		language.onclick = function () {
			items.classList.remove("active");
			menuBtn.classList.remove("hide");
			searchBtn.classList.remove("hide");
			cancelBtn.classList.remove("show");
			form.classList.remove("active");
			cancelBtn.style.color = "steelblue";
		}
	</script>


	<div class="slider">
		<div class="myslide fade">
			<div class="txt">
				<h1>Welcome to InCare</h1>
				<p>Your health is our priority</p>
			</div>
			<div id="img-1" class="imgg"></div>
			<!-- <img src="doc4.jpg" style="width: 100%; height: 100%;"> -->
		</div>

		<div class="myslide fade">
			<div class="txt">
				<h1>Always Ready!</h1>
				<p>anytime, anywhere <br>
					get intensive&instant care</p>
			</div>
			<div id="img-2" class="imgg"></div>
		</div>

		<div class="myslide fade">
			<div class="txt">
				<h1>Best Hospitals</h1>
				<p>we will help you to find the best ICU bed <br> for your condition with the best price</p>
			</div>
			<div id="img-3" class="imgg"></div>
		</div>

		<div class="myslide fade">
			<div class="txt">
				<mark style=" color: yellow; ">
					<h3>top rated</h3>
				</mark>
				<h1>Dar Al-Fouad Hospital</h1>
				<p>Obtaining international accreditation for the quality of health care<br> for the sixth time in a row<br> </p>
				<span class="res"><a class="act" href="{{route('advsearch',[2])}}" target="blank">Learn More</a></span>
			</div>
			<div id="img-4" class="imgg"></div>
		</div>
		<div class="myslide fade">
			<div class="txt">
				<mark style=" color: yellow; ">
					<h3>top rated</h3>
				</mark>
				<h1>Al Salam International Hopsital </h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br></p>
				<span class="res"><a class="act" href="{{route('advsearch',[3])}}" target="blank">Learn More</a></span>
			</div>
			<div id="img-5" class="imgg"></div>
		</div>

		<div class="myslide fade">
			<div class="txt">
				<mark style=" color: yellow; ">
					<h3>top rated</h3>
				</mark>
				<h1>Haven hospital</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
				</p>
				<span class="res"><a class="act" href="{{route('advsearch',[4])}}" target="blank">Learn More</a></span>
			</div>
			<div id="img-6" class="imgg"></div>
		</div>
		<div class="myslide fade">
			<div class="txt">
				<mark style=" color: yellow; ">
					<h3>top rated</h3>
				</mark>
				<h1>Marwa Hospital </h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
				</p>
				<span class="res"><a class="act" href="{{route('advsearch',[5])}}" target="blank">Learn More</a></span>
			</div>
			<div id="img-7" class="imgg"></div>
		</div>



		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		<div class="dotsbox" style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
			<span class="dot" onclick="currentSlide(3)"></span>
			<span class="dot" onclick="currentSlide(4)"></span>
			<span class="dot" onclick="currentSlide(5)"></span>
			<span class="dot" onclick="currentSlide(6)"></span>
			<span class="dot" onclick="currentSlide(7)"></span>
		</div>

	</div>

	<script>
		const myslide = document.querySelectorAll('.myslide'),
			dot = document.querySelectorAll('.dot');
		let counter = 1;
		slidefun(counter);

		let timer = setInterval(autoSlide, 8000);
		function autoSlide() {
			counter += 1;
			slidefun(counter);
		}
		function plusSlides(n) {
			counter += n;
			slidefun(counter);
			resetTimer();
		}
		function currentSlide(n) {
			counter = n;
			slidefun(counter);
			resetTimer();
		}
		function resetTimer() {
			clearInterval(timer);
			timer = setInterval(autoSlide, 8000);
		}

		function slidefun(n) {

			let i;
			for (i = 0; i < myslide.length; i++) {
				myslide[i].style.display = "none";
			}
			for (i = 0; i < dot.length; i++) {
				dot[i].className = dot[i].className.replace(' active', '');
			}
			if (n > myslide.length) {
				counter = 1;
			}
			if (n < 1) {
				counter = myslide.length;
			}
			myslide[counter - 1].style.display = "block";
			dot[counter - 1].className += " active";
		}
	</script>

	<!-- about us -->
	<div class="about" id="ab">

		<h1 class="heading" style="padding-top: 80px;">---- About Us ----</h1>
		<div class="abcontainer1">
			<div>
				<div id="tt" class="two"></div>
			</div>
			<div>
				<h2>The first and only in Egypt...</h2>
				<p class="para"> <span
						style="font-size: 13px; color: lightblue; background-color: lightblue; padding-left: 5px; border-radius: 100%;">
						-
					</span> Through InCare web application, patients can search for the nearest hospital
					with an ICU that suits their budget, and medical case. Thus, they can reserve a bed, and also
					request an ambulance to take them to the intended hospital they reserved in. </p>
			</div>
		</div>


		<div class="abcontainer2">
			<div>
				<p class="para"> <span
						style="font-size: 13px; color: lightblue; background-color: lightblue; padding-left: 5px; border-radius: 100%;">
						-
					</span>Through InCare web application,we help hospitals gain recognition and reach more people.
					and connect hospitals which have spare beds with patients in need for intensive care in nearby
					places. </p>
			</div>

			<div>
				<div id="dd" class="two"></div>
			</div>
		</div>

	</div>


	<!-- features -->

	<div class="feat">
		<h2 class="heading"> -- Why Choose InCare -- </h2>
	
		<div class="box-content">
		  <div class="box">
			<script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
			<lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="hover"
			  style="width:100px;height:100px; filter: hue-rotate(45deg);">
			</lord-icon>
			<h3>Easy Search</h3>
			  <p>you can search for the nearest hospital with an ICU that suits your budget, and medical case
			  </p>
		  </div>
		  <div class="box">
	
			<script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
			<lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="hover"
			  style="width:100px;height:100px;filter: hue-rotate(45deg);">
			</lord-icon>
			<h3>24/7 available</h3>
			<p>We are available 24 hours a day, 7 days a week to help you with your needs. </p>
		  </div>
		  <div class="box">
			<script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
			<lord-icon src="https://cdn.lordicon.com/mdksbrtj.json" trigger="hover"
			  style="width:100px;height:100px;filter: hue-rotate(45deg); ">
			</lord-icon>
			<h3>Request Ambulance</h3>
			<p>Reserve an ambulance online and get the care you need quickly and safely. </p>
		  </div>
		  <div class="box">
			<script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
			<lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="hover"
			  style="width:100px;height:100px ">
			</lord-icon>
			<h3>Online Reservation</h3>
			<p>Save people’s time and decrease the risk of making the urgent cases worse </p>
		  </div>
		  <div class="box">
			
			<div id="img_wrap" class="static">
			  <img id="animated" src="img/hospital.gif" alt="">
			  <img id="static" src="img/hospital.png" alt="">
			</div> <br>
			<h3>Variety of Hospital</h3>
			<p>There are all types of hospital (govermental & private) Choose the right hospital for your needs </p>
		  </div>
	
		  <div class="box"> <br>
	
			<div id="img_wrap" class="static">
			  <img id="animated" src="img/wrong-decision.gif" alt="">
			  <img id="static" src="img/wrong-decision.png" alt="">
			</div> 
			<h3>Cancelation Option</h3>
			<p>You can cancel your online request at any time within 2 hours from reservation. </p>
		  </div>
		  <div class="box">
			<script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
			<lord-icon src="https://cdn.lordicon.com/huwchbks.json" trigger="hover"
			  style="width:120px;height:120px;filter: hue-rotate(45deg);">
			</lord-icon>
			<h3>Protect Your Data </h3>
			  <p>Protect your data from unauthorized access by using strong security measures.
			  </p>
		  </div>
		  <div class="box">
			<script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
			<lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="hover"
			  style="width:100px;height:100px; filter: hue-rotate(45deg);">
			</lord-icon>  <br><br>
			<h3>Direct Connection</h3>
			  <p>Hospital manages directly the pending reservation requests from patients.
			  </p>
		  </div>
	
		</div>
	  </div>


	<!-- Contact Us -->
	<div class="contact" id="contact">

		<h1 class="heading" style="padding-top: 80px;color: steelblue;">---- Contact Us ----</h1>
		<!-- <div class="abcontainer1">
			<div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55306.63467597516!2d31.264508718992047!3d29.960322690940924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583809b8f551e3%3A0x6265c5febb8ab4a3!2sMaadi%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1681947457815!5m2!1sen!2seg" width="600" height="450" style="border:5px solid white;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="coninfo">
				<h2><i class="fas fa-location-dot"></i> Address</h2>
				<p class="para">  maadi-cairo-egypt</p>
				<h2><i class="fas fa-phone"></i> Phone</h2>
				<p class="para">  0123456789</p>
				<h2> <i class="fa-solid fa-envelope"></i> E-mail </h2>
				<p class="para">incare@gmail.com</p>
			</div>
		</div> -->
		<div class="boxx-content">
			<div class="boxx">
				<i class="fas fa-location-dot"></i>
				<h3> Location Address</h2>
					<p>12st,maadi-cairo-egypt </p>
			</div>
			<div class="boxx">
				<i class="fas fa-phone"></i>
				<h3>Phone Number</h3>
				<!-- <p>0123456789 </p>
				<p>022345678</p> -->
				<p><a href="tel:+020123456789"> +20 0123456789</a></p>
				<p><a href="tel:+022345678">022 22345678</a></p>
			</div>
			<div class="boxx">
				<i class="fa-solid fa-envelope"></i>
				<h3>E-mail Address</h3>
				<p><a href="mailto:incareCo23@gmail.com"> incareCo23@gmail.com</a></p>
			</div>
		</div>
		<div class="mapouter">
			<div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas"
					src="https://maps.google.com/maps?q=maadi&t=&z=8&ie=UTF8&iwloc=&output=embed" frameborder="0"
					scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>
		</div>
	</div>

	<footer id="foot">

		<div class="logoz"></div>

		<div class="vision ">
			<h3 class="title"> Our Mission</h3>
			<p> we aim to connect people in need for urgent intensive care<br> with hospitals to find a spare bed there.
			</p>
		</div>
		<div class="follow ">
			<p class="title"> Follow Us</p>
			<div class="lin">
				<a href="#"> <i class="fab fa-facebook"></i></a>
				<a href="#"> <i class="fab fa-instagram"></i></a><br>
				<a href="#"> <i class="fab fa-whatsapp"></i></a>
				<a href="#"> <i class="fab fa-youtube"></i></a>
			</div>
		</div>
		<button onclick="backtotopFunction()" id="topbutton" title="Go to top">
			<i class="fa-solid fa-up-long"></i>
		</button>
	</footer>


	<div class="copy">
		<p>Copyright ©2023 by InCare Team </p>

	</div>

	<script>
		function backtotopFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
		let totopbutton = document.getElementById("topbutton");
		window.onscroll = function () {
			scrollFunction();
		};
		function scrollFunction() {
			if (
				document.body.scrollTop > 25 ||
				document.documentElement.scrollTop > 20
			) {
				totopbutton.style.display = "block";
			} else {
				totopbutton.style.display = "none";
			}
		}



	</script>

</body>


</html>