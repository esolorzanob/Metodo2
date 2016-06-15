<div ng-controller="UserController" ng-init="findOne()">
  <div class="container" ng-show="usuario.rol == 'Admin'">
      <h1>Menu de opciones para Administrador</h1>
      <br>
    <div class="row">
        <div class="col-md-4">
               <i class="fa fa-user fa-2x icono" aria-hidden="true"></i>
            <label class="tituloOpcion">Opciones de Usuario</label>          
        </div>
        <div class="col-md-3">
           <a class="opcion" href="users/create"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Crear Usuario</a>
        </div>
    </div>
     <div class="row">
        <div class="col-md-4">
               
        </div>
        <div class="col-md-3">
           <a class="opcion" href="users/list"><i class="fa fa-list" aria-hidden="true"></i>Ver Usuarios</a>
        </div>
    </div>
    
     <div class="row">
        <div class="col-md-4">
               
        </div>
        <div class="col-md-5">
           <p>*Para editar o borrar usuarios, primero haga click en Ver Usuarios para seleccionar el que desee.</p>
        </div>
    </div>
 </div>      
  <div class="container" ng-show="usuario.rol != 'Admin'">
      <h1>En construcción<i class="fa fa-truck" aria-hidden="true"></i></h1>
  </div>
</div>
