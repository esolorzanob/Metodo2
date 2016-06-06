<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>Meto2App</title>
    <script type="application/javascript" src="<% elixir('js/all.js') %>"></script>
    <link rel="stylesheet" href="/css/app.css"/>
    <link rel="stylesheet" href="<% elixir('css/all.css') %>"/>
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
                <li ng-if="authenticatedUser == null" ng-class="{active:isActive('/auth/signup')}"><a href="/auth/signup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sign Up</a></li>
                <li ng-if="authenticatedUser == null" ng-class="{active:isActive('/auth/login')}"><a href="/auth/login"><i class="fa fa-sign-in" aria-hidden="true"></i>Log in</a></li>
                <li ng-if="authenticatedUser != null" ng-class="{active:isActive('/users/view/' + authenticatedUser.id)}"><a ng-href="/users/view/{{authenticatedUser.id}}">{{authenticatedUser.username}}</a></li>
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
<footer class="footer">
 Universidad Latina de Costa Rica 
 <br>
BSI-508 Metodología de Desarrollo de Software 2
<br> 
© 2016 Grupo 1  
</footer>
</body>

</html>
