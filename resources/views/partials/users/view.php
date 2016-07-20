<div ng-controller="UserController" ng-init="findOne()">
  <div class="container" ng-show="usuario.rol == 'Admin'">
      
      <h1>Opciones de Administrador</h1>
      <br>
    
       <h2>Use el menú de la izquierda para navegar por las opciones<h2>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Para ver el menú, presione aquí</a>
 </div>      
  <div class="container" ng-show="usuario.rol != 'Admin'">
      <h1>En construcción<i class="fa fa-truck" aria-hidden="true"></i></h1>
  </div>
  
</div>
  