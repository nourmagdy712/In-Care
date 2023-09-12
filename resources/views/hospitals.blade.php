<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>search</title>
	<link rel="stylesheet" href="{{asset('/css/searchstyle.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<nav>
		<div class="container">
			<h1 class="logo "><a href="{{route('welcome')}}"><span>I</span>NCARE</a></h1>
			<ul>
				@auth()
				<li><a href="{{route('home')}}" id="home"> <i class="fas fa-house" style="font-size: 25px;"></i></a></li>
				<li><a href="{{route('profile.edit')}}"><i class="fas fa-user-large"
					style="font-size: 25px;"></i></a></li>
				@endauth
			</ul>
		</div>
	</nav>

	<main>
		<section class="search-form">
			<div class="container">
				<h1>Find Suitable ICU Bed</h1>
				<form action="{{route('search')}}">
					<div>

						<input type="text" name="search" placeholder="search for...">
						<button type="submit"> <i class="fa-solid fa-magnifying-glass"></i></button>
						<span class="filter-results" id="filter"><i class="fa-solid fa-filter"></i></span>
					</div>
					<div id="filter-dropdown">
						<i class="fa-solid fa-xmark" id="cancel" style="cursor: pointer; position: absolute;top:10px; right:10px;"></i>
						<h4>Refine results</h4>
						<hr>
						<h5>Sort by price</h5>
						<div class="sort">
							<input type="radio" name="price" style="margin-left: 10px;" value="asc"> Ascending</input> <br>
							<input type="radio" name="price" style="margin-left: 10px;" value="desc"> Descending</input>
						</div><br><br><br>
						<h5>Hospital type</h5>
						<div class="hos-type">
						<!--	<select name="type" style="margin-left:15px;"> 
							<option> All</option>
							<option value="governmental"> Governmental</option>
							<option value="private"> Private</option>
						</select> -->
							<input type="radio" name="type" style="margin-left: 10px;" value="governmental"> Governmental</input> <br>
							<input type="radio" name="type" style="margin-left: 10px;" value="private"> Private</input> 
						</div><br>
				</div>
				</form>
			</div>
		</section>
		<section class="search-results">
			<div class="container">
			{{--	@foreach($results as $result)
				    @php
					$search=$result->Hospital_name;
					@endphp
					@endforeach
					--}}
				@isset($search)
				<h2>Search Results For "{{$search}}" : <span style="font-size: 20px; color: steelblue;">({{$count}})</span></h2>
				@endisset
				<div class="ull">
					@if($results->isNotEmpty())
					@foreach($results as $result)
					<div class="lii">
						<h3>{{$result->Hospital_name}}</h3>
						<p class="typee"> {{$result->type}}</p>
						<p class="para"> <i class="fas fa-location-dot"></i> Location: {{$result->address}}</p>
						<p class="para"> <i class="fas fa-phone"></i> Phone: {{$result->phone}}</p>
						<p class="para"> <i class="fa-solid fa-tag"></i> Price: {{$result->price}} per day</p>
						<p class="beds-available" style="color: green ;">{{$result->availability}}</p>
						<button class="reserve-bed" onclick="openModal()">Reserve Bed</button>
					</div>
	@endforeach
	@else 
    <div>
        <h3 style="color:#243b55;">It seems we can’t find what you’re looking for</h3>
    </div>
@endif
				</div>
			</div>
		</section>
		@isset($result)
		<div id="portal">
			<form action="{{route('reserve',$result->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				<span id="cancell"><i class="fa-solid fa-xmark"></i></span>
				<div class="title">
					<h1>Request ICU bed</h1>
					<p>Please enter your details.</p>
				</div>

				<div class="input-field">
					<input type="text" name="name" required/>
					<label>Full Name</label>
				</div>

				<div class="input-field">
					<input type="text" name="gender" required/>
					<label>Gender</label>
				</div>

				<div class="input-field">
					<input type="number" name="age" required/>
					<label>Age</label>
				</div>

				<div class="input-field">
					<input type="tel" name="phone" required/>
					<label>Phone Number</label>
				</div>

				<div class="input-field">
					<input type="file" name="condition" required/>
					<label>Upload report</label>
				</div>
				<button type="submit" class="sub" id="reserve">Submit</button>
			</form>
		</div>
@endisset
		
	</main>
	<script>
		const nav = document.querySelector('nav')
		window.addEventListener('scroll', fixNav)

		function fixNav() {
			if (window.scrollY > nav.offsetHeight + 150) {
				nav.classList.add('active');
			} else {
				nav.classList.remove('active');
			}
		}
		let modal = document.getElementById("portal");
		function openModal() {
			modal.style.display = "grid";
		}
		let reserve = document.getElementById("reserve");
		reserve.onclick = function () {
			modal.style.display = "none";
		}
		let cancel = document.getElementById("cancell");
		cancel.onclick = function () {
			modal.style.display = "none";
		}
		let filter = document.getElementById("filter");
		let filterMenu = document.getElementById("filter-dropdown");
		filter.onclick = function () {
			filterMenu.style.display = "inline-block";
			filter.classList.add('active');
		}
		let cancell = document.getElementById("cancel");
		cancell.onclick = function () {
			filterMenu.style.display = "none";
			filter.classList.remove('active');
		}
		let apply = document.getElementById("apply");
		apply.onclick = function () {
			filterMenu.style.display = "none";
			filter.classList.remove('active');
		}
	</script>
</body>


</html>