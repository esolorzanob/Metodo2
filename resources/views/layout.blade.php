<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>Meto2App</title>
    <script type="application/javascript" src="<% elixir('js/all.js') %>"></script>
    <link rel="stylesheet" href="/css/app.css"/>
    <link rel="stylesheet" href="<% elixir('css/all.css') %>"/>
    <link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-basic-centered.css">
</head>
<body ng-app="ResourceApp" ng-controller="MainController" ng-init="getAuthenticatedUser()">


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           
        </div>
        <a href="/"><img class="logo" src="/images/logo2.png" style="float:left;"></a>
        <div id="navbar" class="navbar-collapse collapse" >
            <ul class="nav navbar-nav">               
                <li ng-if="authenticatedUser == null" ng-class="{active:isActive('/auth/signup')}"><a href="/auth/signup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Registrarse</a></li>
                <li ng-if="authenticatedUser == null" ng-class="{active:isActive('/auth/login')}"><a href="/auth/login"><i class="fa fa-sign-in" aria-hidden="true"></i>Ingresar</a></li>
                <li ng-if="authenticatedUser != null" ng-class="{active:isActive('/users/view/' + authenticatedUser.id)}"><a ng-href="/users/view/{{authenticatedUser.id}}">{{authenticatedUser.nombre}}</a></li>
                <li ng-if="authenticatedUser != null" ng-click="logout()"><a ng-href="#">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="wrap">
<div id="main" class="container clear-top">
    <div ng-view>
    </div>

</div>
</div>
<footer class="footer-basic-centered">

			<p class="footer-company-motto">Universidad Latina de Costa Rica</p>

			<p class="footer-links">
				<a href="/">Principal</a>
				·
				<a href="/auth/login">Ingresar</a>
				·
				<a href="/auth/signup">Registrarse</a>				
				
			</p>

			<p class="footer-company-name">Metodologías de Desarrollo 2 - grupo1 &copy; 2015</p>

		</footer>
</body>

</html>
