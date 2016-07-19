<div class="container" ng-controller="SolicitudController">
<form name="loginForm"  ng-init="findEverything()" ng-submit="create()"
      class="form-horizontal" novalidate>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Fecha de incio:</label>
          
        </div>
        <div class="col-md-2">
            <input type="date" id="fecha_inicio" ng-model="solicitud.fecha_inicio"
                   class="form-control" placeholder="">
        </div>
        <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Duración:</label>
          
        </div>
        <div class="col-md-2" ng-show="authenticatedUser.rol == 'Estudiante' ">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label ng-model="dia">1 día</label>
          
        </div>
        <div class="col-md-2" ng-show="authenticatedUser.rol == 'Admin' || authenticatedUser.rol == 'Profesor' ">
            <select name="duracion" id="duracion" ng-model="duracion" 
                   class="form-control" required>
                   <option></option>
                   <option>Días</option>
                   <option>Semanas</option> 
                   <option>Meses</option>
                   <option>Cuatrimestre</option>                                     
            </select>
            </div>
             <div class="col-md-2">
            <select name="numero" id="numero" ng-model="numero" 
                   class="form-control" required ng-show="duracion == 'Días'">
                   <option></option>
                   <option>1</option>
                   <option>2</option> 
                   <option>3</option>
                   <option>4</option>
                                                       
            </select>
            <select name="numero" id="numero" ng-model="numero" 
                   class="form-control" required ng-show="duracion == 'Semanas' || duracion == 'Meses'">
                   <option></option>
                   <option>1</option>
                   <option>2</option> 
                   <option>3</option>                    
            </select>
        </div>
    </div>
   <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Edificio:</label>
          
        </div>
        <div class="col-md-2">
             <select name="edificio" id="edicifio" ng-model="edificio" 
                   class="form-control" required>
                   <option></option>
                   <option>Principal</option>
                   <option>Ciencias Medicas</option> 
                                      
            </select>
        </div>
        <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Aula:</label>
          
        </div>       
        <div class="col-md-3" ng-show="edificio == 'Principal'">
          <select name="aula" id="aula"
      ng-options="aula.numero for aula in principal track by aula.id"
      ng-model="solicitud.aula" class="form-control"   ></select>
             
        </div>  
        <div class="col-md-3" ng-show="edificio == 'Ciencias Medicas'" >
          <select name="aula" id="aula"
      ng-options="aula.numero for aula in ciencias track by aula.id"
      ng-model="solicitud.aula" class="form-control"  ></select>
             
        </div>  
    </div>
    
     <div class="form-group">
          <div class="col-md-4">
            <button type="button" class="btn btn-primary" ng-click="buscar()">Buscar recursos disponibles</button>
        </div>
         <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Recurso:</label>
          
        </div>
        <div class="col-md-3" ng-show="disponibles.length > 0">
             <select name="recurso" id="recurso"
      ng-options="recurso.nombre for recurso in disponibles track by recurso.id"
      ng-model="solicitud.recurso" class="form-control" required></select>
        </div>
    </div>
    <div class="form-group">
          <div class="col-md-4">
         <p ng-click="agregar()"><i class="fa fa-plus-circle icono" aria-hidden="true" >Agregar solicitud</i></p>
         </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </div>
    <p class="success">{{message}}</p>
</form>
  <table class="table-responsive table-bordered table-striped table-hover" style="overflow-x:auto;">
       <tr>
        
        <th>Solicitante</th>        
        <th>Fecha de inicio</th>
        <th>Fecha de devolución</th>
        <th>Recurso</th> 
        <th>Edificio - Aula</th>
          
      </tr>
      <tr ng-repeat="solicitud in solicitudes ">
        
          <td>{{solicitud.solicitante}}</td>
          <td>{{solicitud.fecha_inicio}}</td> 
          <td>{{solicitud.fecha_devolucion}}</td>
          <td>{{solicitud.recurso}}</td>
          <td>{{solicitud.edificio}}  {{solicitud.aula}}</td>
          
          <td class="opcionList"><a href="javascript:void(0)" ng-click="remove(solicitud.num)"><i class="fa fa-trash error" aria-hidden="true"></i></a></td>
       </tr>
    </table>
</div>