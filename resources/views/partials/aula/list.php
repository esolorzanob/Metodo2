<div ng-controller="AulaController" ng-init="findAll()">
    
     <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
        
          <div class="title-container">
            <h3 class="modal-title">Confirmación para borrar aula</h3>
           
          </div>     
        
        </div>
        
        <div class="modal-body">
            <p>Está seguro que desea borrar el aula?</p>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok()">Borrar</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
    <div class="container" ng-show="show">
        <h2> Lista de Aulas</h2>
<input type="text" placeholder="Buscar por numero" ng-model="filtro.numero"  />
        <select name="edificio" ng-model="filtro.edificio">
			<option value="" selected disabled>Edificio</option>
			<option value="">Todos</option>
			<option>Principal</option>
			<option>Ciencias Medicas</option>  
			
		</select>
        <select name="Aire" ng-model="filtro.aireAcondicionado">
			<option value="" selected disabled>Aire</option>
			<option value="">Todos</option>
			<option>Sí</option>
			<option>No</option>  
			
		</select>
        <select name="proyector" ng-model="filtro.proyector">
			<option value="" selected disabled>Proyector</option>
			<option value="">Todos</option>
			<option>Sí</option>
			<option>No</option>  
			
		</select>
		 <select name="computadora" ng-model="filtro.computadora">
			<option value="" selected disabled>Computadora</option>
			<option value="">Todos</option>
			<option>Sí</option>
			<option>No</option>  
			
		</select>
      <table class="table-responsive table-bordered table-striped table-hover" style="overflow-x:auto;">
       <tr>
        <th>Id</th>
        <th>Numero</th>
        <th>Edificio</th>
        <th>Aire Acondicionado</th>
        <th>Proyector</th>
        <th>Computadora</th> 
        <th>Editar</th>
        <th>Borrar</th>    
      </tr>
      <tr ng-repeat="aula in aulas  | filter:filtro |  filter:search:strict ">
          <td>{{aula.id}}</td>
          <td>{{aula.numero}}</td>
          <td>{{aula.edificio}}</td> 
          <td>{{aula.aireAcondicionado}}</td>
          <td>{{aula.proyector}}</td>
          <td>{{aula.computadora}}</td>           
          <td class="opcionList"><a href="aula/edit/{{aula.id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
          <td class="opcionList"><a href="javascript:void(0)" ng-click="open(aula.id)"><i class="fa fa-trash error" aria-hidden="true"></i></a></td>
       </tr>
    </table>
    <p class="success">{{message}}</p>
    </div>
    <h1 class="error" ng-show="!show">{{error}}</h1>
    
</div>