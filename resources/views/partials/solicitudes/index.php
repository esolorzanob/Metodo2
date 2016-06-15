<div ng-controller="SolicitudController" ng-init="find()">
    <p ng-if="!solicitudes.length">
        No hay solicitudes en este momento, <a href="/solicitudes/create">¡Cree una!</a>
    </p>

    <div class="row" ng-repeat="solicitud in solicitudes">
        <div class="col-lg-6">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" ng-click="remove(solicitud)">
                </span>
                <input type="text" class="form-control" ng-model="solicitud.body"
                       ng-blur="update(solicitud)" enter-stroke="update(solicitud)">
            </div>
        </div>
    </div>
</div>