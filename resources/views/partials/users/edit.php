<div class="container" ng-controller="UserController" ng-init="findWithAuthenticate()">
    <form name="loginForm"  ng-submit="edit()" ng-show="show"
      class="form-horizontal" >
      <p>Por favor ingrese la información para la creación del usuario. Todos los campos son requeridos**</p>
      <br>
      <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-user  icono" aria-hidden="true"></i>
            <label>Tipo de Usuario:</label>
          
        </div>
        <div class="col-md-3">
             <select id="rol" ng-model="usuario.rol" 
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
            <input type="text" id="nombre" ng-model="usuario.nombre"
                   class="form-control" placeholder="" required>
        </div>      
       
    </div>
      <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tags  icono" aria-hidden="true"></i>
            <label>Primer apellido:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="apelldio1" ng-model="usuario.apellido1"
                   class="form-control" placeholder="" required>
        </div>      
       
    </div>
      <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tags  icono" aria-hidden="true"></i>
            <label>Segundo apellido:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="apellido2" ng-model="usuario.apellido2"
                   class="form-control" placeholder="" required>
        </div>      
        
    </div>
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
         <div class="col-md-2">
              <i class="fa fa-transgender-alt icono" aria-hidden="true"></i>
            <label>Género:</label>
          
        </div>
        <div class="col-md-3">
            <select id="genero" ng-model="usuario.genero" 
                   class="form-control" required>
                   <option></option>
                   <option>Masculino</option>
                   <option>Femenino</option>
                   <option>Otro</option>
                   <option>No responde</option>
            </select>
        </div>
       
    </div>
    <div class="form-group">
         <div class="col-md-2">
              <i class="fa fa-sticky-note-o icono" aria-hidden="true"></i>
            <label>Carnet:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="carnet" ng-model="usuario.carnet"
                   class="form-control" placeholder="" required>
        </div>
       
    </div>
     <div class="form-group" ng-show="usuario.rol == 'Estudiante'">
         <div class="col-md-2">
              <i class="fa fa-graduation-cap icono" aria-hidden="true"></i>
            <label>Carrera:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="carrera" ng-model="usuario.carrera"
                   class="form-control" placeholder="" >
        </div>
       
    </div>
    
    
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>
    <h3 class="error">{{error}}<h3>
</form>
<p class="error" >{{error}}</h1>
<p class="success">{{message}}</h1>
</div>
