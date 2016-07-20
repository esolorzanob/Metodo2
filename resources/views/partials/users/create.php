<div class="container" ng-controller="UserController"  ng-init="getUser()">
    <form name="createForm"  ng-submit="create()"
      class="form-horizontal" ng-show="authenticatedUser.rol == 'Admin'">
      <p>Por favor ingrese la información para la creación del usuario. Todos los campos son requeridos**</p>
      <br>
      <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-user  icono" aria-hidden="true"></i>
            <label>Tipo de Usuario:</label>
          
        </div>
        <div class="col-md-3">
             <select name="rol" id="rol" ng-model="usuario.rol" 
                   class="form-control" required>
                   <option></option>
                   <option>Estudiante</option>
                   <option>Profesor</option>                 
            </select>
        </div>      
       
    </div>
     <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tag  icono" aria-hidden="true"></i>
            <label>Nombre:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" name="nombre" id="nombre" ng-model="usuario.nombre"
                   class="form-control" placeholder="" required>
        </div>      
       
    </div>
      <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tags  icono" aria-hidden="true"></i>
            <label>Primer apellido:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" name="apellido1" id="apelldio1" ng-model="usuario.apellido1"
                   class="form-control" placeholder="" required>
        </div>      
       
    </div>
      <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tags  icono" aria-hidden="true"></i>
            <label>Segundo apellido:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" name="apellido2" id="apellido2" ng-model="usuario.apellido2"
                   class="form-control" placeholder="" required>
        </div>      
        
    </div>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-envelope  icono" aria-hidden="true"></i>
            <label>Correo electrónico:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" name="email" id="email" ng-model="usuario.email"
                   class="form-control" placeholder="" required>
        </div>
       
    </div>
    <div class="form-group">
         <div class="col-md-2">
              <i class="fa fa-transgender-alt icono" aria-hidden="true"></i>
            <label>Género:</label>
          
        </div>
        <div class="col-md-3">
            <select name="genero" id="genero" ng-model="usuario.genero" 
                   class="form-control" required>
                   <option></option>
                   <option>Masculino</option>
                   <option>Femenino</option>
                   <option>Otro</option>
                  
            </select>
        </div>
       
    </div>
    <div class="form-group">
         <div class="col-md-2">
              <i class="fa fa-sticky-note-o icono" aria-hidden="true"></i>
            <label>Carnet:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" name="carnet" id="carnet" ng-model="usuario.carnet"
                   class="form-control" placeholder="" required>
        </div>
       
    </div>
     <div class="form-group" ng-show="usuario.rol == 'Estudiante'">
         <div class="col-md-2">
              <i class="fa fa-graduation-cap icono" aria-hidden="true"></i>
            <label>Carrera:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" name="carrera" id="carrera" ng-model="usuario.carrera"
                   class="form-control" placeholder="" >
        </div>
       
    </div>
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
            
            <input type="password" name="confirm" id="passwordConfirmation" ng-model="usuario.passwordConfirmation"
                   class="form-control" placeholder="" required>
        </div>
       
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </div>
    <h2 class="error">{{error}}</h3>
    <h2 class="success">{{message}}</h2>
</form>
<h1 class="error" ng-show="authenticatedUser.rol != 'Admin'">No esta autorizado para ver esta información.</h1>
    
</div>
