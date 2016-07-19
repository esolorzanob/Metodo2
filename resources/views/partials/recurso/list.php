<div ng-controller="RecursoController" ng-init="findAll()">
    
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
        <h2> Lista de Recursos</h2>
<input type="text" placeholder="Buscar por nombre" ng-model="filtro.nombre"  />
<input type="text" placeholder="Buscar por numero de serie" ng-model="filtro.numeroSerie"  />
        <select name="estado" ng-model="filtro.estado">
			<option value="" selected disabled>Estado</option>
			<option value="">Todos</option>
			<option>Libre</option>
			<option>Prestado</option>  
			
		</select>
		
      <table class="table-responsive table-bordered table-striped table-hover" style="overflow-x:auto;">
       <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Numero de Serie</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Comentarios</th>  
        <th>Editar</th>
        <th>Borrar</th>   
      </tr>
      <tr ng-repeat="recurso in recursos  | filter:filtro |  filter:search:strict ">
          <td>{{recurso.id}}</td>
          <td>{{recurso.nombre}}</td>
          <td>{{recurso.numeroSerie}}</td> 
          <td>{{recurso.descripcion}}</td>
          <td>{{recurso.estado}}</td>
          <td>{{recurso.comentarios}}</td>           
          <td class="opcionList"><a href="recurso/edit/{{recurso.id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
          <td class="opcionList"><a href="javascript:void(0)" ng-click="open(recurso.id)"><i class="fa fa-trash error" aria-hidden="true"></i></a></td>
       </tr>
    </table>
    <p class="success">{{message}}</p>
    </div>
    <h1 class="error" ng-show="!show">{{error}}</h1>
    
</div>