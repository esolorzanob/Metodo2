<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>Meto2App</title>
    <script type="application/javascript" src="<% elixir('js/all.js') %>"></script>
    <script src="html2canvas.js"></script>
    <script src='pdfmake.min.js'></script>
 	<script src='vfs_fonts.js'></script>
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
                
                <li ng-if="authenticatedUser == null" ng-class="{active:isActive('/auth/login')}"><a href="/auth/login"><i class="fa fa-sign-in" aria-hidden="true"></i>Ingresar</a></li>
                <li ng-if="authenticatedUser != null" ng-class="{active:isActive('/users/view/' + authenticatedUser.id)}"><a ng-href="/users/view/{{authenticatedUser.id}}">{{authenticatedUser.nombre}}</a></li>
                <li ng-if="authenticatedUser != null" ><a href="#menu-toggle" id="menu-toggle">Menú</a></li>
                <li ng-if="authenticatedUser != null" ng-click="logout()"><a ng-href="#">Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="wrap">
     <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" >
            <ul class="sidebar-nav">
                <li class="sidebar-brand">                    
                        Menú de opciones                    
                </li>
                <li class="sidebar-subBrand" ng-show="authenticatedUser.rol == 'Admin'">
                   Usuarios
                </li>
                <li ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/users/create">Crear</a>
                </li>
                <li ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/users/list">Ver</a>
                </li>
               <li class="sidebar-subBrand" ng-show="authenticatedUser.rol == 'Admin'">
                   Recursos
                </li>
                <li ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/recurso/create">Crear</a>
                </li>
                <li ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/recurso/list">Ver</a>
                </li>
                 <li class="sidebar-subBrand" ng-show="authenticatedUser.rol == 'Admin'">
                   Aulas
                </li>
                <li ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/aula/create">Crear</a>
                </li>
                <li ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/aula/list">Ver</a>
                </li>
                 <li class="sidebar-subBrand">
                   Solicitudes
                </li>
                <li>
                    <a href="/solicitud/create">Crear</a>
                </li>
                <li>
                    <a href="/solicitud/list">Ver</a>
                </li>
                 <li class="sidebar-subBrand" ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/solicitud/reportes">Reportes</a>
                </li>
                <li class="sidebar-subBrand" ng-show="authenticatedUser.rol == 'Admin'">
                    <a href="/mensaje/list">Mensajes</a>
                </li>
                 <li class="sidebar-subBrand" ng-show="authenticatedUser.rol != 'Admin'">
                    <a href="/mensaje/create">Mensajes</a>
                </li>
            </ul>
        </div>
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
				
						
				
			</p>

			<p class="footer-company-name">Metodologías de Desarrollo 2 - grupo1 &copy; 2015</p>

		</footer>
        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });    
     
    </script>
   
   
</body>

</html>
