<form name="forgotForm" ng-controller="UserController" ng-submit="sendPassword()"
      class="form-horizontal" novalidate>
      <p>Por favor digite su correo electrónico y una contraseña temporal será enviada</p>
      <br>
     <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-envelope  icono" aria-hidden="true"></i>
            <label>Correo electrónico:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="email" ng-model="usuario.email"
                   class="form-control" placeholder="" required>
        </div>
       
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
           <label id="message">{{message}}</label>
        </div>
    </div>
</form>