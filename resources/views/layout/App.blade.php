<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RedFB @yield('title')</title>
<link href="/css/style.css" type="text/css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,800;1,400;1,800&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/26c4477b0a.js" crossorigin="anonymous"></script>

</head>
<body>
 <div id="wrapper">
<header id="header">
<div class="logo">
    <img src="/images/logo.png" alt="" name="skopjeLogo" width="100">
    <p><strong>Red Facebook </strong></p>
</div>
</header>
<nav id="nav">
<ul>
            <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="about"><i class="fas fa-address-card"></i>About</a></li>
            <li><a href="info"><i class="fas fa-info-circle"></i>Info</a></li>
            <li><a href="login"><i class="fas fa-info-circle"></i>Log In</a></li> 
            <li><a href="singup"><i class="fas fa-info-circle"></i>Sing Up</a></li> 
</ul>
<div class="social">
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-twitter-square"></i></a>
<a href="#"><i class="fab fa-linkedin"></i></a>
</div>
</nav>
<main id="main">
    @section('main')
    @show
	</main>
    <aside id="aside">
    <ul>
			<li><strong>Država	 Sjeverna Makedonija</strong></li>
			<li>Statistička regija Region.svg Skopska</li>
			<li><strong>Općina	Skoplje</strong></li>
			<ul>
			<li>Koordinate	42°00′N 21°25′E</li>
			<li>Najviša tačka	</li>
			<li> Nadmorska visina	240 m</li>
			</ul>
			<li><strong>Površina</strong></li>
			<ul>
 			<li>- Naselje	571,46 km2</li>
 			<li>- Općina	225,00 km2</li>
 			</ul>
			<li><strong>Stanovništvo</strong></li>
			<ul>
 			<li>- Naselje	428,933</li>
 			<li>- Općina	506,926 (2002)</li>
 			</ul>
			<li><strong>Gustoća</strong></li>
			<ul>
 			<li>- Općina	887 /km2</li> 
 			</ul>
			<li>Gradonačelnik	Koce Trajanovski (VMRO-DPMNE)</li>
			<li>Vremenska zona	Srednjoevropsko vrijeme</li>
			 <li>- ljeto	Srednjoevropsko ljetno vrijeme</li>
			<li>Poštanski broj	2330</li>
			<li>Pozivni broj	+389 2</li>
			<li>Registarska oznaka	SK</li>
       </ul>
       <article class="block">
       <h2>About Us	</h2>
       <img class="map" src="images/map.png" alt="" width="220">
       <a href="/about">Opširnije...</a>
       </article>
	</aside>
    <footer id="footer">
		<p>&copy Almir Redzic 2021-2022</p>
	</footer>

</div>
</body>
</html>