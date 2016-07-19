<form name="loginForm" ng-controller="RecursoController"  ng-init="findOne()" ng-submit="edit()"
      class="form-horizontal" novalidate>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Nombre:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="nombre" ng-model="recurso.nombre"
                   class="form-control" placeholder="nombre">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
               <i class="fa fa-list-ol icono" aria-hidden="true"></i>
            <label>Número de Serie:</label>
          
        </div>
        <div class="col-md-3">            
            <input type="text" id="numeroSerie" ng-model="recurso.numeroSerie"
                   class="form-control" placeholder="numero de serie">
        </div>
    </div>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-wpforms icono" aria-hidden="true"></i>
            <label>Descripción:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="descripcion" ng-model="recurso.descripcion"
                   class="form-control" placeholder="descripcion">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
               <i class="fa fa-cogs icono" aria-hidden="true"></i>
            <label>Estado:</label>
          
        </div>
        <div class="col-md-3">
            <select name="estado" id="estado" ng-model="recurso.estado" 
                   class="form-control" required>
                   <option></option>
                   <option>Disponible</option>
                   <option>Prestado</option>                   
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
               <i class="fa fa-comments icono" aria-hidden="true"></i>
            <label>Comentarios:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="comentarios" ng-model="recurso.comentarios"
                   class="form-control" placeholder="Comentarios">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </div>
    <p class="success">{{message}}</p>
     <p class="error">{{error}}</p>
</form>
