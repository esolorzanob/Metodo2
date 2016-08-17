<div class="container" ng-controller="SolicitudController" ng-init="findAll()">

<h1>Reportes</h1>

<h3><a ng-click="reporteInicial()">Información general desde el primero del presente mes</a><h3>
<h3><a ng-click="reportePorSemana(dia)">Información por día de la semana del presente mes</a><h3>
    <div class="form-group">
            <div class="col-md-3">               
                <select ng-model="dia">       
        <option value="1">Lunes</option>
        <option value="2">Martes</option>
        <option value="3">Miércoles</option>
        <option value="4">Juves</option>
        <option value="5">Viernes</option>
        <option value="6">Sábado</option>
        </select>          
            </div>
            
            <div class="col-md-3">
                <button class="btn btn-primary" ng-click="imprimirReporte()">Imprimir</button> 
            </div>
      </div>
      
        <br>
        <br>
  <div id="reporte">
  <div class="form-horizontal" ng-show="showReport" id="reporteDelMes">
      
       <div class="form-group">
            <div class="col-md-6">               
                <h2>Reporte general del mes de {{mesActual}}</h2>  
                <p>______________________________________________</p>       
            </div>            
           
      </div>
      
      <div class="form-group">
            <div class="col-md-6">               
                <label>Numero de solicitudes:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{numeroTotal}}</label> 
            </div>
      </div>
      
      <div class="form-group">
            <div class="col-md-6">               
                <label>Día de la semana con más solicitudes:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{mayorSolicitud}}</label> 
            </div>
      </div>
      
      <div class="form-group">
            <div class="col-md-6">               
                <label>Día de la semana con menos solicitudes:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{menorSolicitud}}</label> 
            </div>
      </div>
      
       <div class="form-group">
            <div class="col-md-6">               
                <label>Tipo de recurso más pedido:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{tipoMayor}}</label> 
            </div>
      </div>
      
       <div class="form-group">
            <div class="col-md-6">               
                <label>Tipo de recurso menos pedido:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{tipoMenor}}</label> 
            </div>
      </div>
      
</div>
 <div class="form-horizontal" ng-show="showReportDia" id="reportePorDia">
     <div class="form-group">
            <div class="col-md-12">               
                <h2>Reporte general del mes de {{mesActual}} para el día {{diaActual}}</h2>  
                <p>______________________________________________</p>       
            </div>            
           
      </div>
      <div class="form-group">
            <div class="col-md-6">               
                <label>Numero de solicitudes:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{numeroTotal}}</label> 
            </div>
      </div>
      
     
       <div class="form-group">
            <div class="col-md-6">               
                <label>Tipo de recurso más pedido:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{tipoMayor}}</label> 
            </div>
      </div>
      
       <div class="form-group">
            <div class="col-md-6">               
                <label>Tipo de recurso menos pedido:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{tipoMenor}}</label> 
            </div>
      </div>
      
      <div class="form-group">
            <div class="col-md-6">               
                <label>Porcentaje de recursos tipo Aire Acondicionado:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{porcentajeAire}}</label> 
            </div>
      </div>
      
      <div class="form-group">
            <div class="col-md-6">               
                <label>Porcentaje de recursos tipo Video Beam:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{porcentajeVideo}}</label> 
            </div>
      </div>
      
      <div class="form-group">
            <div class="col-md-6">               
                <label>Porcentaje de recursos tipo Periférico:</label>         
            </div>
            
            <div class="col-md-3">
                <label>{{porcentajePeri}}</label> 
            </div>
      </div>
      
</div>
</div>

</div>