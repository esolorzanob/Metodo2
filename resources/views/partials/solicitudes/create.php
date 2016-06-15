<div ng-controller="SolicitudController">
    <form class="form-horizontal" ng-submit="create()" novalidate>
        <legend>Solicitud de recursos</legend>
        <fieldset>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                            <label>Aula</label>
                            <select id="aula" name="aula" class="form-control input-md" ng-model="aula">
                            <option value="0" selected>Elija alg&uacute;n aula</option>
                            <option value="1">Aula 1</option>
                            <option value="2">Aula 2</option>
                            <option value="3">Aula 3</option>
                            <option value="4">Aula 4</option>
                            <option value="5">Aula 5</option>   
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label>Extraordinaria</label><br>
                        <input type="checkbox" name="my-checkbox">
                    </div>    
                </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Horario</label>
                        <select id="horarios" name="horarios" class="form-control input-md" ng-model="horarios" required>
                            <option value="0" selected>Seleccione alg&uacute;n horario</option>
                            <option value="1">Horario 1</option>
                            <option value="2">Horario 2</option>
                            <option value="3">Horario 3</option>
                            <option value="4">Horario 4</option>
                            <option value="5">Horario 5</option>
                        </select>
                    </div>   
                    
                    <div class="col-md-6">
                        <p>Repetici&oacute;n</p>
                        <label class="radio-inline"><input type="radio" name="repeticion" id="mes">Mes</label>
                        <label class="radio-inline"><input type="radio" name="repeticion" id="cuatri">Cuatrimestre</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <div class="col-md-5">
                        <label>Recursos disponibles</label>
                        <select id="recursos" name="recursos" class="form-control input-md" ng-model="recursos" size="5" required>
                            <option value="1">Recurso 1</option>
                            <option value="2">Recurso 2</option>
                            <option value="3">Recurso 3</option>
                            <option value="4">Recurso 4</option>
                            <option value="5">Recurso 5</option>
                        </select>
                    </div>  
                    
                    <div class="col-md-2" align="center" valign="bottom">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </div>
                    
                    <div class="col-md-5">
                        <label>Mi lista</label>
                        <select id="misRecursos" name="misRecursos" class="form-control input-md" ng-model="misRecursos" size="5" required>
                        </select>
                    </div>   
                </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <div class="col-md-5">
                        <input type="submit" id="submit" name="submit" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>