<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/asociado_parametros.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    function mostrar(a) {
        obj = document.getElementById('oculto'+a);
        obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
        //objm = document.getElementById('map');
        if(obj.style.visibility == 'hidden'){
            $('#map').css({ 'width':'0px', 'height':'0px' });
            $('#mosmapa').text("Obtener Ubicación del Asociado");
        }else{
            $('#map').css({ 'width':'100%', 'height':'400px' });
            $('#mosmapa').text("Cerrar mapa");
        }

    }
    function generarcodigo(){
        var zona        = document.getElementById('zona_asoc').value;
        var manzano     = document.getElementById('zona_asoc').value;
        var calle       = document.getElementById('direccion_asoc').value;
        var categoria   = document.getElementById('categoria_asoc').value;
        var distancia   = document.getElementById('distancia_asoc').value;
        var diametrored = document.getElementById('diametrored_asoc').value;
        var tipo        = document.getElementById('tipo_asoc').value;
        $('#codigo_asoc').val(zona);
    }
    /*function cambiarcod(){
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }
        $('#cliente_codigo').val(anio+mes+dia+hora+min+seg);
    }*/

</script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#apellidos_asoc").change(function(){
        var nombre   = $("#nombres_asoc").val();
        var apellido = $("#apellidos_asoc").val();
        /*var cad1 = nombre.substring(0,1);
        var cad1 = apellido.substring(0,1);
        var cad2 = apellido.substring(apellido.length-1,apellido.length);
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        var cad = cad1+cad2+anio+mes+dia+hora+min+seg;
        $('#cliente_codigo').val(cad);*/
        $('#razon_asoc').val(nombre+" "+apellido);
    });
    $("#ci_asoc").change(function(){
        var ci = $("#ci_asoc").val();
        $('#nit_asoc').val(ci);
    });
  });
    
</script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Asociado</h3>
            </div>
            <?php echo form_open_multipart('asociado/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-3">
                        <label for="nombres_asoc" class="control-label"><span class="text-danger">*</span>Nombres</label>
                        <div class="form-group">
                            <input type="text" name="nombres_asoc" value="<?php echo $this->input->post('nombres_asoc'); ?>" class="form-control" id="nombres_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('nombres_asoc');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="apellidos_asoc" class="control-label"><span class="text-danger">*</span>Apellidos</label>
                        <div class="form-group">
                            <input type="text" name="apellidos_asoc" value="<?php echo $this->input->post('apellidos_asoc'); ?>" class="form-control" id="apellidos_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('apellidos_asoc');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="codigo_asoc" class="control-label">Código</label>
                        <!--<div class="form-group" style="display: flex">-->
                        <div class="form-group">
                            <input type="text" name="codigo_asoc" value="<?php echo $this->input->post('codigo_asoc'); ?>" class="form-control" id="codigo_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <!--<a onclick="generarcodigo()" class="btn btn-warning" title="Generar codigo">
                                <i class="fa fa-file-text-o"></i></a>-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fechanac_asoc" class="control-label">Fecha Nac.</label>
                        <div class="form-group">
                            <input type="date" name="fechanac_asoc" value="<?php echo $this->input->post('fechanac_asoc'); ?>" class="form-control" id="fechanac_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="ci_asoc" class="control-label">C.I.</label>
                        <div class="form-group">
                            <input type="text" name="ci_asoc" value="<?php echo $this->input->post('ci_asoc'); ?>" class="form-control" id="ci_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="expedido" class="control-label">Expedido</label>
                        <div class="form-group">
                            <select name="expedido" class="form-control">
                                <option value="">- EXPEDIDO -</option>
                                <?php 
                                foreach($all_expedido as $expedido)
                                {
                                    $selected = ($expedido['ciudad'] == $this->input->post('ciudad')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$expedido['ciudad'].'" '.$selected.'>'.$expedido['ciudad'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="telefono_asoc" class="control-label">Telefono</label>
                        <div class="form-group">
                            <input type="text" name="telefono_asoc" value="<?php echo $this->input->post('telefono_asoc'); ?>" class="form-control" id="telefono_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nit_asoc" class="control-label">Nit</label>
                        <div class="form-group">
                            <input type="text" name="nit_asoc" value="<?php echo $this->input->post('nit_asoc'); ?>" class="form-control" id="nit_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="razon_asoc" class="control-label">Razon Social</label>
                        <div class="form-group">
                            <input type="text" name="razon_asoc" value="<?php echo $this->input->post('razon_asoc'); ?>" class="form-control" id="razon_asoc" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="foto_asoc" class="control-label">Foto Asoc</label>
                        <div class="form-group">
                            <input type="file" name="foto_asoc" value="<?php echo $this->input->post('foto_asoc'); ?>" class="btn btn-success btn-sm form-control" id="foto_asoc" accept="image/png, image/jpeg, jpg, image/gif" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="direccion_asoc" class="control-label">Calle</label>
                        <div class="form-group">
                            <input type="text" name="direccion_asoc" value="<?php echo $this->input->post('direccion_asoc'); ?>" class="form-control" id="direccion_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nro_asoc" class="control-label">Nro.</label>
                        <div class="form-group">
                            <input type="text" name="nro_asoc" value="<?php echo $this->input->post('nro_asoc'); ?>" class="form-control" id="nro_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="manzano_asoc" class="control-label">Manzano</label>
                        <div class="form-group">
                            <input type="text" name="manzano_asoc" value="<?php echo $this->input->post('manzano_asoc'); ?>" class="form-control" id="manzano_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="referencia_asoc" class="control-label">Referencia</label>
                        <div class="form-group">
                            <input type="text" name="referencia_asoc" value="<?php echo $this->input->post('referencia_asoc'); ?>" class="form-control" id="referencia_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="zona_asoc" class="control-label">Zona</label>
                        <div class="form-group">
                            <select name="zona_asoc" class="form-control" id="zona_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_zona as $zona)
                                {
                                    $selected = ($zona["zona_med"] == $this->input->post('zona_med')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$zona["zona_med"].'" '.$selected.'>'.$zona["zona_med"].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="distancia_asoc" class="control-label">Distancia</label>
                        <div class="form-group">
                            <input type="text" name="distancia_asoc" value="<?php echo $this->input->post('distancia_asoc'); ?>" class="form-control" id="distancia_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="tipoinmueble_asoc" class="control-label">Tipo Inmueble</label>
                        <div class="form-group">
                            <select name="tipoinmueble_asoc" class="form-control" id="tipoinmueble_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_tipoinmueble as $inmueble)
                                {
                                    $selected = ($inmueble["nombre_tin"] == $this->input->post('nombre_tin')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$inmueble["nombre_tin"].'" '.$selected.'>'.$inmueble["nombre_tin"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="diametrored_asoc" class="control-label">Diametro Red</label>
                        <div class="form-group" style="display: flex">
                            <select name="diametrored_asoc" class="form-control" id="diametrored_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_diametro as $diametro)
                                {
                                    $selected = ($diametro["nombre_diam"] == $this->input->post('nombre_diam')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$diametro["nombre_diam"].'" '.$selected.'>'.$diametro["nombre_diam"].'</option>';
                                } 
                                ?>
                            </select>
                            <a data-toggle="modal" data-target="#modaldiametrored" class="btn btn-info" title="Registrar nuevo diametro de Red">
                                <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="tipo_asoc" class="control-label">Tipo</label>
                        <div class="form-group">
                            <select name="tipo_asoc" class="form-control" id="tipo_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_tipo_asociado as $tipo_asociado)
                                {
                                    $selected = ($tipo_asociado["tipo_asoc"] == $this->input->post('tipo_asoc')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$tipo_asociado["tipo_asoc"].'" '.$selected.'>'.$tipo_asociado["tipo_asoc"].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="servicios_asoc" class="control-label">Servicios</label>
                        <div class="form-group">
                            <select name="servicios_asoc" class="form-control" id="servicios_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_servicio as $servicio)
                                {
                                    $selected = ($servicio["servicio"] == $this->input->post('servicios_asoc')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$servicio["servicio"].'" '.$selected.'>'.$servicio["servicio"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="categoria_asoc" class="control-label">Categoría</label>
                        <div class="form-group">
                            <select name="categoria_asoc" class="form-control" id="categoria_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_categoria as $categoria)
                                {
                                    $selected = ($categoria["categoria"] == $this->input->post('categoria_asoc')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$categoria["categoria"].'" '.$selected.'>'.$categoria["categoria"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Obtener Ubicación del Asociado</a></label>
                        <!-- ***********************aqui empieza el mapa para capturar coordenadas *********************** -->
                        <div id="oculto1" style="visibility:hidden">
                        <div id="map"></div>
                        <script type="text/javascript">
                            var marker;          //variable del marcador
                            var coords_lat = {};    //coordenadas obtenidas con la geolocalización
                            var coords_lng = {};    //coordenadas obtenidas con la geolocalización


                            //Funcion principal
                            initMap = function () 
                            {
                                //usamos la API para geolocalizar el usuario
                                    navigator.geolocation.getCurrentPosition(
                                      function (position){
                                        coords_lat =  {
                                          lat: position.coords.latitude,
                                        };
                                        coords_lng =  {
                                          lng: position.coords.longitude,
                                        };
                                        setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa

                                      },function(error){console.log(error);});
                            }

                            function setMapa (coords_lat, coords_lng)
                            {
                                    document.getElementById("latitud_asoc").value = coords_lat.lat;
                                    document.getElementById("longitud_asoc").value = coords_lng.lng;
                                  //Se crea una nueva instancia del objeto mapa
                                  var map = new google.maps.Map(document.getElementById('map'),
                                  {
                                    zoom: 13,
                                    center:new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                  });

                                  //Creamos el marcador en el mapa con sus propiedades
                                  //para nuestro obetivo tenemos que poner el atributo draggable en true
                                  //position pondremos las mismas coordenas que obtuvimos en la geolocalización
                                  marker = new google.maps.Marker({
                                    map: map,
                                    draggable: true,
                                    animation: google.maps.Animation.DROP,
                                    position: new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                  });
                                  //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
                                  //cuando el usuario a soltado el marcador
                                  //marker.addListener('click', toggleBounce);

                                  marker.addListener( 'dragend', function (event)
                                  {
                                    //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                                    document.getElementById("latitud_asoc").value = this.getPosition().lat();
                                    document.getElementById("longitud_asoc").value = this.getPosition().lng();
                                  });
                            }
                            initMap();
                        </script>                                            
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5L7UMFw0GxFZgVXCfMLhGVK5Gn7HvG_U&callback=initMap"></script>                                            
                        </div>
                        <!-- ***********************aqui termina el mapa para capturar coordenadas *********************** -->
                    </div>
                    <div class="col-md-3">
                            <label for="latitud_asoc" class="control-label">Latitud</label>
                            <div class="form-group">
                                <input type="number" step="any" name="latitud_asoc" value="<?php echo $this->input->post('latitud_asoc'); ?>" class="form-control" id="latitud_asoc" />
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="longitud_asoc" class="control-label">Longitud</label>
                            <div class="form-group">
                                <input type="number" step="any" name="longitud_asoc" value="<?php echo $this->input->post('longitud_asoc'); ?>" class="form-control" id="longitud_asoc" />
                            </div>
                    </div>
                    <!--<div class="col-md-6">
                        <label for="fechahora_asoc" class="control-label">Fechahora Asoc</label>
                        <div class="form-group">
                            <input type="text" name="fechahora_asoc" value="<?php //echo $this->input->post('fechahora_asoc'); ?>" class="form-control" id="fechahora_asoc" />
                        </div>
                    </div>-->
                    <div class="col-md-4">
                        <label for="medidor_asoc" class="control-label">Medidor</label>
                        <div class="form-group">
                            <input type="text" name="medidor_asoc" value="<?php echo $this->input->post('medidor_asoc'); ?>" class="form-control" id="medidor_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="orden_asoc" class="control-label">Orden</label>
                        <div class="form-group">
                            <input type="text" name="orden_asoc" value="<?php echo $this->input->post('orden_asoc'); ?>" class="form-control" id="orden_asoc" />
                        </div>
                    </div>
                    <!--<div class="col-md-6">
                        <label for="id_emp" class="control-label">Empresa</label>
                        <div class="form-group">
                            <select name="id_emp" class="form-control">
                                <?php
                                /*foreach($all_empresa as $empresa)
                                {
                                    $selected = ($empresa['id_emp'] == $this->input->post('id_emp')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$empresa['id_emp'].'" '.$selected.'>'.$empresa['nombre_emp'].'</option>';
                                } */
                                ?>
                            </select>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="box-footer">
                <button onclick="generarcodigo()" type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
                <a href="<?php echo site_url('asociado'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<!------------------------ INICIO modal para Registrar nueva Categoria ------------------->
<div class="modal fade" id="modaldiametrored" tabindex="-1" role="dialog" aria-labelledby="modaldiametroredlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold">Registrar Nuevo Diametro de Red</span>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
               <div class="col-md-6">
                    <label for="nuevo_diametronombre" class="control-label">Nombre</label>
                    <div class="form-group">
                        <input type="text" name="nuevo_diametronombre"  class="form-control" id="nuevo_diametronombre" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <div class="col-md-6">
                    <label for="nuevo_diametrocodigo" class="control-label">Código</label>
                    <div class="form-group">
                        <input type="text" name="nuevo_diametrocodigo"  class="form-control" id="nuevo_diametrocodigo" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="registrarnuevodiametrored()" class="btn btn-success"><span class="fa fa-check"></span> Registrar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nueva Categoria ------------------->