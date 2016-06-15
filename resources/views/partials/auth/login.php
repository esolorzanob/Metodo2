<form name="loginForm" ng-controller="UserController" ng-submit="login()"
      class="form-horizontal" novalidate>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-envelope  icono" aria-hidden="true"></i>
            <label>Correo electrónico:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="username" ng-model="usuario.email"
                   class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
               <i class="fa fa-key  icono" aria-hidden="true"></i>
            <label>Contraseña:</label>
          
        </div>
        <div class="col-md-3">
            <input type="password" id="password" ng-model="usuario.password"
                   class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
         <div class="col-md-4">
         
        </div>
        
    </div>
     <a href="/auth/forgot">Olvidó su contraseña?</a>
    <h3 class="error">{{error}}</h3>
</form>
