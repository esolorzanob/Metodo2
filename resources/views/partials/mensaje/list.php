<div ng-controller="MensajeController" ng-init="findAll()">
    
     <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
        
          <div class="title-container">
            <h3 class="modal-title">Confirmación para borrar recurso</h3>
           
          </div>     
        
        </div>
        
        <div class="modal-body">
            <p>Está seguro que desea borrar el recurso?</p>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok()">Borrar</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
    <div class="container" ng-show="show">
        <h2> Lista de Mensajes</h2>
<input type="text" placeholder="Buscar por nombre" ng-model="filtro.nombre"  />
        <select name="estado" ng-model="filtro.estado">
			<option value="" selected disabled>Estado</option>
			<option value="">Todos</option>
			<option>Nuevo</option>
			<option>Leído</option>  
			
		</select>
		
      <table class="table-responsive table-bordered table-striped table-hover" style="overflow-x:auto;">
       <tr>      
        <th>Id de Usuario</th> .
        <th>Usuario</th>       
        <th>Acerca de</th>      
        <th>Estado</th>
        <th>Ver</th>   
      </tr>
      
      <tr ng-repeat="mensaje in mensajes  | filter:filtro |  filter:search:strict ">
          <td>{{mensaje.idUsuario}}</td>
          <td>{{mensaje.usuario}}</td>
          <td>{{mensaje.acerca_de}}</td> 
          <td>{{mensaje.estado}}</td>                     
          <td class="opcionList"><a href="mensaje/edit/{{mensaje.id}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
         
       </tr>
    </table>
    <p class="success">{{message}}</p>
    </div>
    <h1 class="error" ng-show="!show">{{error}}</h1>
    
</div>