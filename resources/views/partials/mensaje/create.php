<form name="mensajeForm" ng-controller="MensajeController" ng-submit="create()" ng-init="getUser()"
      class="form-horizontal" novalidate>
    <div class="form-group">
         <div class="col-md-2">
               <i class="fa fa-tag icono" aria-hidden="true"></i>
            <label>Asunto:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="asunto" ng-model="mensaje.acerca_de"
                   class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
               <i class="fa fa-list-ol icono" aria-hidden="true"></i>
            <label>Mensaje:</label>
          
        </div>
        <div class="col-md-3">            
            <textarea name="mensaje" cols="100" rows="6" ng-model="mensaje.mensaje"></textarea>
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
    <p class="success">{{message}}</p>
</form>
