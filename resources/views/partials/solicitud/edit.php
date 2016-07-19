<div class="container" ng-controller="SolicitudController">
<form name="loginForm"  ng-init="findOne()" ng-submit="edit()"
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
            <label>Fecha de devolución:</label>
          
        </div>
        <div class="col-md-2">
            <input type="date" id="fecha_devolucion" ng-model="solicitud.fecha_devolucion"
                   class="form-control" placeholder="">
        </div>
         
    </div>
    
   
   <div class="form-group">
        
        <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Aula:</label>
          
        </div>       
       <div class="col-md-2">
            <input type="text" id="aula" ng-model="solicitud.aula"
                   class="form-control" placeholder="">
        </div>
        <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Recurso:</label>
          
        </div>
         <div class="col-md-2">
            <input type="text" id="recurso" ng-model="solicitud.recurso"
                   class="form-control" placeholder="">
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>
    <p class="success">{{message}}</p>
</form>

</div>