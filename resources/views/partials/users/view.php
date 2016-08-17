<div ng-controller="UserController" ng-init="findOne()">
  <div class="container" ng-show="usuario.rol == 'Admin'">
      
      <h1>Opciones de Administrador</h1>
      <br>
    
       <h2>Use el menú de la izquierda para navegar por las opciones<h2>
        <h4>Para ver el menú, presione el botón en la parte superior de la pantalla</h4>
 </div>      
  <div class="container" ng-show="usuario.rol != 'Admin'">
      
      <h1>Bienvenido {{usuario.nombre}}</h1>
      <br>
    
       <h2>Use el menú de la izquierda para navegar por las opciones<h2>
        <h4>Para ver el menú, presione el botón en la parte superior de la pantalla</h4>
  </div>
   
</div>
  