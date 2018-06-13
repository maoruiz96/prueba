@extends ('layouts.admin')
@section ('contenido')

<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 <h3>Listado de Ventas <a href="venta/create"><button class="btn btn-success">Nuevo</button> </a> </h3> <!-- Este código me llevará a la formulario de create, osea crea una categoría -->
 @include('ventas.venta.search')
 </div>
</div>

 <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <!--Tabla responsive para que se pueda ver en cualquier tipo de sipositivo -->
  <div class="table-responsive">
 <!--Código para que se vea la tabla intuitivo al usuario -->
  <table class="table table-striped table-bordered table-condensed table-hover">
 <!--Agrega celdas dentro de la tabla-->
  <thead> <!--Cabezeras => N° 4 -->
   <!--En llaves porque estamos trabajando con Laravel-->
   <th>Fecha</th> 
   <th>Cliente</th> 
   <th>Comprobante</th>
   <th>Impuesto</th>
   <th>Total </th> 
   <th>Estado</th> 
   <th>Opciones</th>

  </thead>
 @foreach ($ventas as $ven) 
 <tr>
  <td>{{ $ven->fecha_hora}}</td>
  <td>{{ $ven->nombre}}</td>
  <td>{{ $ven->tipo_comprobante.': '.$ven->serie_comprobante.'-'.$ven->num_comprobante}}</td>
  <td>{{ $ven->impuesto}}</td>
  <td>{{ $ven->total_venta}}</td>
  <td>{{ $ven->estado}}</td>
  <td>
  <a href="{{URL::action('VentaController@show',$ven->idventa)}}"<button class="btn btn-primary">Detalles</button></a>
  <a href=""  data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"<button class="btn btn-danger">Anular</button></a> <!-- btn es una clase y se le agrega el estilo-->
  </td>
  
 </tr>
 @include('ventas.venta.modal')
 @endforeach <!-- Si existen 100 filas de registros se mostraran en este bucle for each-->
 </table>
 </div>
  <!-- Fuera del Responsive, mostramos la paginación-->

 {{$ventas->render()}} <!-- Método que nos permite la paginación-->
</div>
</div>
@endsection