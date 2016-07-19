<div ng-controller="UserController" ng-init="findAll()">
    
     <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
        
          <div class="title-container">
            <h3 class="modal-title">Confirmación para borrar usuario</h3>
           
          </div>     
        
        </div>
        
        <div class="modal-body">
            <p>Está seguro que desea borrar el usuario?</p>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok()">Borrar</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
    <div class="container" ng-show="show">
        <h2> Lista de Usuarios</h2>
<input type="text" placeholder="Buscar por nombre" ng-model="filtro.nombre"  />
<input type="text" placeholder="Buscar por Apellido" ng-model="filtro.apellido1"  />
<input type="text" placeholder="Buscar por email" ng-model="filtro.email"  />
        <select name="genero" ng-model="filtro.genero">
			<option value="" selected disabled>Género</option>
			<option value="">Todos</option>
			<option>Masculino</option>
			<option>Femenino</option>  
			<option>Otro</option> 
		</select>
		<select name="rol" ng-model="filtro.rol">
			<option value="" selected disabled>Rol</option>
			<option value="">Todos</option>
			<option>Estudiante</option>
			<option>Profesor</option>			                              
		</select>
      <table class="table-responsive table-bordered table-striped table-hover" style="overflow-x:auto;">
       <tr>
        <th>Id</th>
        <th>Rol</th>
        <th>Nombre</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        <th>Carnet</th>
        <th>Genero</th>
        <th>Email</th>
        <th>Editar</th> 
        <th>Eliminar</th>
      </tr>
      <tr ng-repeat="user in users  | filter:filtro |  filter:search:strict ">
          <td>{{user.idrecurso}}</td>
          <td>{{user.rol}}</td>
          <td>{{user.nombre}}</td> 
          <td>{{user.apellido1}}</td>
          <td>{{user.apellido2}}</td>
          <td>{{user.carnet}}</td>
          <td>{{user.genero}}</td>
          <td>{{user.email}}</td>          
          <td class="opcionList"><a href="users/edit/{{user.id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
          <td class="opcionList"><a href="javascript:void(0)" ng-click="open(user.id)"><i class="fa fa-trash error" aria-hidden="true"></i></a></td>
       </tr>
    </table>
    <p class="success">{{message}}</p>
    </div>
    <h1 class="error" ng-show="!show">{{error}}</h1>
    
</div>