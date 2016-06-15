<form name="loginForm" ng-controller="UserController" ng-submit="changePassword()"
      class="form-horizontal" >
      <p>Por favor cambie su contraseña.</p>
      <br>
      
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-key  icono" aria-hidden="true"></i>
            <label>Contraseña:</label>
          
        </div>
        <div class="col-md-3">
            <input type="password" name="password" id="password" ng-model="usuario.password"
                   class="form-control" placeholder="" required>
        </div>
         <div class="col-md-6">
          <p ng-show="loginForm.password.$dirty">La contraseña debe tener al menos 8 caractéres, una mayuscula y un número</p>
        </div>
    </div>
    <div class="form-group">
         <div class="col-md-2">
            <i class="fa fa-key  icono" aria-hidden="true"></i>
            <label>Confirme contraseña:</label>
          
        </div>
        <div class="col-md-3">
            
            <input type="password" id="passwordConfirmation" ng-model="usuario.passwordConfirmation"
                   class="form-control" placeholder="" required>
        </div>
       
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
        </div>
    </div>
    <h3 class="error">{{message}}<h3>
</form>
