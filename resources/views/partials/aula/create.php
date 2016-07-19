<form name="loginForm" ng-controller="AulaController" ng-submit="create()"
      class="form-horizontal" novalidate>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-list-ol icono" aria-hidden="true"></i>
            <label>Numero:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="numero" ng-model="aula.numero"
                   class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-building icono" aria-hidden="true"></i>
            <label>Edificio:</label>
          
        </div>
        <div class="col-md-3">
            <select name="edificio" id="edificio" ng-model="aula.edificio" 
                   class="form-control" required>
                   <option></option>
                   <option>Principal</option>
                   <option>Ciencias Medicas</option>
                   
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
               <i class="fa fa-power-off icono" aria-hidden="true"></i>
            <label>Aire Acondicionado:</label>
          
        </div>
        <div class="col-md-3">
            <select name="aire" id="aire" ng-model="aula.aireAcondicionado" 
                   class="form-control" required>
                   <option></option>
                   <option>Sí</option>
                   <option>No</option>
                   
            </select>
        </div>
    </div>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-video-camera icono" aria-hidden="true"></i>
            <label>Proyector:</label>
          
        </div>
        <div class="col-md-3">
            <select name="proyector" id="proyector" ng-model="aula.proyector" 
                   class="form-control" required>
                   <option></option>
                   <option>Sí</option>
                   <option>No</option>
                   
            </select>
        </div>
    </div>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-desktop icono" aria-hidden="true"></i>
            <label>Computadora:</label>
          
        </div>
        <div class="col-md-3">
             <select name="compu" id="compu" ng-model="aula.computadora" 
                   class="form-control" required>
                   <option></option>
                   <option>Sí</option>
                   <option>No</option>
                   
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </div>
    <p class="success">{{message}}</p>
</form>
