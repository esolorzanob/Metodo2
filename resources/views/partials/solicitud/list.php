<div ng-controller="SolicitudController" ng-init="findAll()">
    
     <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
        
          <div class="title-container">
            <h3 class="modal-title">Confirmación para aceptar la solicitud</h3>
           
          </div>     
        
        </div>
        
        <div class="modal-body">
            <p>Está seguro que desea aceptar la solicitud?</p>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok()">Aceptar</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
    <script type="text/ng-template" id="myModalContent2.html">
        <div class="modal-header">
        
          <div class="title-container">
            <h3 class="modal-title">Confirmación para rechazar solicitud</h3>
           
          </div>     
        
        </div>
        
        <div class="modal-body">
            <p>Está seguro que desea rechazar la solicitud?</p>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok()">Rechazar</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
    
    <div class="container" ng-show="show">
        <h2> Lista de Solicitudes</h2>
<input type="text" placeholder="Buscar por solicitante" ng-model="filtro.solicitante"  />
        <select name="estado" ng-model="filtro.estado">
			<option value="" selected disabled>Estado</option>
			<option value="">Todos</option>
			<option>Pendiente</option>
			<option>Aceptada</option>  
			<option>Rechazada</option>  
		</select>
		
      <table class="table-responsive table-bordered table-striped table-hover" style="overflow-x:auto;">
       <tr>
        <th>Id</th>
        <th>Solicitante</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Devolución</th>
        <th>Recurso</th>
        <th>Aula</th>     
        <th>Estado</th>       
        <th>Rechazar</th>
        
      </tr>
      <tr ng-repeat="solicitud in guardadas  | filter:filtro |  filter:search:strict ">
          <td>{{solicitud.id}}</td>
          <td>{{solicitud.solicitante}}</td>
          <td>{{solicitud.fecha_inicio}}</td>
          <td>{{solicitud.fecha_devolucion}}</td> 
          <td><a href="/recurso/edit/{{solicitud.recursoId}}">{{solicitud.recurso}}</a></td>
          <td>{{solicitud.aula}}</td>
          <td>{{solicitud.estado}}</td>
          <td class="opcionList" ><a href="javascript:void(0)" ng-click="rechazar(solicitud)" ng-show="solicitud.estado != 'Rechazada'" ><i class="fa fa-times error" aria-hidden="true"></i></a></td>         
          
       </tr>
    </table>
    <p class="success">{{message}}</p>
    </div>
    <p class="error" >{{error}}</h1>
    
</div>