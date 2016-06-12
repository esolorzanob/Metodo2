<form name="loginForm" ng-controller="RecursoController" ng-submit="create()"
      class="form-horizontal" novalidate>
    <div class="form-group">
        <div class="col-md-3">
            <input type="text" id="nombre" ng-model="nombre"
                   class="form-control" placeholder="nombre">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <input type="text" id="numeroSerie" ng-model="numeroSerie"
                   class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <input type="text" id="descripcion" ng-model="descripcion"
                   class="form-control" placeholder="descripcion">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <input type="text" id="estado" ng-model="estado"
                   class="form-control" placeholder="estado">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <input type="text" id="comentarios" ng-model="comentarios"
                   class="form-control" placeholder="Comentarios">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
    </div>
</form>
