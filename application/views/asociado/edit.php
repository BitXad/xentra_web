<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="all_sistema_red" id="all_sistema_red" value='<?php echo json_encode($all_sistema_red); ?>' />
<input type="hidden" name="all_categoria" id="all_categoria" value='<?php echo json_encode($all_categoria); ?>' />
<input type="hidden" name="all_tipo_inmueble" id="all_tipo_inmueble" value='<?php echo json_encode($all_tipo_inmueble); ?>' />
<input type="hidden" name="all_diametro" id="all_diametro" value='<?php echo json_encode($all_diametro); ?>' />
<script type="text/javascript">
    function mostrar(a) {
        obj = document.getElementById('oculto'+a);
        obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
        //objm = document.getElementById('map');
        if(obj.style.visibility == 'hidden'){
            $('#map').css({ 'width':'0px', 'height':'0px' });
            $('#mosmapa').text("Modificar ubicación del Asociado");
        }else{
            $('#map').css({ 'width':'100%', 'height':'400px' });
            $('#mosmapa').text("Cerrar mapa");
        }
    }
    
    function generarcodigo(){
        var all_sistema_red   = JSON.parse(document.getElementById('all_sistema_red').value);
        var all_categoria     = JSON.parse(document.getElementById('all_categoria').value);
        var all_tipo_inmueble = JSON.parse(document.getElementById('all_tipo_inmueble').value);
        var all_diametro      = JSON.parse(document.getElementById('all_diametro').value);
        
        var sistemared   = document.getElementById('sistemared_asoc').value;
        var manzano      = document.getElementById('manzano_asoc').value;
        var calle        = document.getElementById('nro_asoc').value;
        var distancia    = document.getElementById('distancia_asoc').value;
        var categoria    = document.getElementById('categoria_asoc').value;
        var tipoinmueble = document.getElementById('tipoinmueble_asoc').value;
        var diametrored  = document.getElementById('diametrored_asoc').value;
        
        var z = all_sistema_red.length;
        var cod_sistemared = "";
        for (var i = 0; i < z; i++){
            if(all_sistema_red[i]['nombre_sred'] == sistemared){
                cod_sistemared = all_sistema_red[i]['codigo_sred'];
            }
        }
        var c = all_categoria.length;
        var cod_categoria = "";
        for (var j = 0; j < c; j++) {
            if(all_categoria[j]['categoria'] == categoria){
                cod_categoria = all_categoria[j]['codigo_cat'];
            }
        }
        var t = all_tipo_inmueble.length;
        var cod_tipoinmueble = "";
        for (var k = 0; k < t; k++) {
            if(all_tipo_inmueble[k]['nombre_tin'] == tipoinmueble){
                cod_tipoinmueble = all_tipo_inmueble[k]['codigo_tin'];
            }
        }
        var d = all_diametro.length;
        var cod_diametrored = "";
        for (var h = 0; h < d; h++) {
            if(all_diametro[h]['nombre_diam'] == diametrored){
                cod_diametrored = all_diametro[h]['codigo_diam'];
            }
        }
        
        $('#codigocatastral_asoc').val(cod_sistemared+manzano+calle+distancia+cod_categoria+cod_tipoinmueble+cod_diametrored);
        alert("Codigo de Catastro modiicado con exito!");
    }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Información</h3>
            </div>
            <?php echo form_open_multipart('asociado/edit/'.$asociado['id_asoc']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-3">
                        <label for="nombres_asoc" class="control-label"><span class="text-danger">*</span>Nombres</label>
                        <div class="form-group">
                            <input type="text" name="nombres_asoc" value="<?php echo ($this->input->post('nombres_asoc') ? $this->input->post('nombres_asoc') : $asociado['nombres_asoc']); ?>" class="form-control" id="nombres_asoc" />
                            <span class="text-danger"><?php echo form_error('nombres_asoc');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="apellidos_asoc" class="control-label"><span class="text-danger">*</span>Apellidos</label>
                        <div class="form-group">
                            <input type="text" name="apellidos_asoc" value="<?php echo ($this->input->post('apellidos_asoc') ? $this->input->post('apellidos_asoc') : $asociado['apellidos_asoc']); ?>" class="form-control" id="apellidos_asoc" />
                            <span class="text-danger"><?php echo form_error('apellidos_asoc');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="codigo_asoc" class="control-label">Código</label>
                        <div class="form-group">
                            <input type="text" name="codigo_asoc" value="<?php echo ($this->input->post('codigo_asoc') ? $this->input->post('codigo_asoc') : $asociado['codigo_asoc']); ?>" class="form-control" id="codigo_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fechanac_asoc" class="control-label">Fecha Nac.</label>
                        <div class="form-group">
                            <input type="date" name="fechanac_asoc" value="<?php echo ($this->input->post('fechanac_asoc') ? $this->input->post('fechanac_asoc') : $asociado['fechanac_asoc']); ?>" class="form-control" id="fechanac_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="ci_asoc" class="control-label">C.I.</label>
                        <div class="form-group">
                            <input type="text" name="ci_asoc" value="<?php echo ($this->input->post('ci_asoc') ? $this->input->post('ci_asoc') : $asociado['ci_asoc']); ?>" class="form-control" id="ci_asoc" />
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
                                    $selected = ($expedido['ciudad'] == $asociado['ciudad']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$expedido['ciudad'].'" '.$selected.'>'.$expedido['ciudad'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="telefono_asoc" class="control-label">Telefono</label>
                        <div class="form-group">
                            <input type="text" name="telefono_asoc" value="<?php echo ($this->input->post('telefono_asoc') ? $this->input->post('telefono_asoc') : $asociado['telefono_asoc']); ?>" class="form-control" id="telefono_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nit_asoc" class="control-label">Nit</label>
                        <div class="form-group">
                            <input type="text" name="nit_asoc" value="<?php echo ($this->input->post('nit_asoc') ? $this->input->post('nit_asoc') : $asociado['nit_asoc']); ?>" class="form-control" id="nit_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="razon_asoc" class="control-label">Razon Social</label>
                        <div class="form-group">
                            <input type="text" name="razon_asoc" value="<?php echo ($this->input->post('razon_asoc') ? $this->input->post('razon_asoc') : $asociado['razon_asoc']); ?>" class="form-control" id="razon_asoc" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="foto_asoc" class="control-label">Foto</label>
                        <div class="form-group">
                            <input type="file" name="foto_asoc" value="<?php echo ($this->input->post('foto_asoc') ? $this->input->post('foto_asoc') : $asociado['foto_asoc']); ?>" class="btn btn-success btn-sm form-control" id="foto_asoc" accept="image/png, image/jpeg, image/jpg, image/gif" />
                            <input type="hidden" name="foto_asoc1" value="<?php echo ($this->input->post('foto_asoc') ? $this->input->post('foto_asoc') : $asociado['foto_asoc']); ?>" class="form-control" id="foto_asoc1" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="direccion_asoc" class="control-label">Calle</label>
                        <div class="form-group">
                            <input type="text" name="direccion_asoc" value="<?php echo ($this->input->post('direccion_asoc') ? $this->input->post('direccion_asoc') : $asociado['direccion_asoc']); ?>" class="form-control" id="direccion_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nro_asoc" class="control-label"><span class="text-bold">*</span>Nro.</label>
                        <div class="form-group">
                            <input type="text" name="nro_asoc" value="<?php echo ($this->input->post('nro_asoc') ? $this->input->post('nro_asoc') : $asociado['nro_asoc']); ?>" class="form-control" id="nro_asoc" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="referencia_asoc" class="control-label">Referencia</label>
                        <div class="form-group">
                            <input type="text" name="referencia_asoc" value="<?php echo ($this->input->post('referencia_asoc') ? $this->input->post('referencia_asoc') : $asociado['referencia_asoc']); ?>" class="form-control" id="referencia_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="manzano_asoc" class="control-label">Manzano</label>
                        <div class="form-group">
                            <input type="text" name="manzano_asoc" value="<?php echo ($this->input->post('manzano_asoc') ? $this->input->post('manzano_asoc') : $asociado['manzano_asoc']); ?>" class="form-control" id="manzano_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
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
                                    $selected = ($zona["zona_med"] == $asociado["zona_asoc"]) ? ' selected="selected"' : "";
                                    echo '<option value="'.$zona["zona_med"].'" '.$selected.'>'.$zona["zona_med"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="distancia_asoc" class="control-label">Distancia(Mts.)</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="distancia_asoc" value="<?php echo ($this->input->post('distancia_asoc') ? $this->input->post('distancia_asoc') : $asociado['distancia_asoc']); ?>" class="form-control" id="distancia_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="tipoinmueble_asoc" class="control-label">Tipo Inmueble</label>
                        <div class="form-group">
                            <select name="tipoinmueble_asoc" class="form-control" id="tipoinmueble_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_tipo_inmueble as $inmueble)
                                {
                                    $selected = ($inmueble["nombre_tin"] == $asociado['tipoinmueble_asoc']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$inmueble["nombre_tin"].'" '.$selected.'>'.$inmueble["nombre_tin"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="diametrored_asoc" class="control-label">Diametro Red</label>
                        <div class="form-group">
                            <select name="diametrored_asoc" class="form-control" id="diametrored_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_diametro as $diametro)
                                {
                                    $selected = ($diametro["nombre_diam"] == $asociado['diametrored_asoc']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$diametro["nombre_diam"].'" '.$selected.'>'.$diametro["nombre_diam"].'</option>';
                                }
                                ?>
                            </select>
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
                                    $selected = ($tipo_asociado["tipo_asoc"] == $asociado["tipo_asoc"]) ? ' selected="selected"' : "";
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
                                    $selected = ($servicio["servicio"] == $asociado["servicios_asoc"]) ? ' selected="selected"' : "";
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
                                    $selected = ($categoria["categoria"] == $asociado["categoria_asoc"]) ? ' selected="selected"' : "";
                                    echo '<option value="'.$categoria["categoria"].'" '.$selected.'>'.$categoria["categoria"].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Modificar ubicación del Asociado</a></label>
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

                                //milat = document.getElementById('cliente_latitud').value;
                                milat = $('#latitud_asoc').val();
                                //milng = document.getElementById('cliente_longitud').value;
                                milng = $('#longitud_asoc').val();

                                    navigator.geolocation.getCurrentPosition(
                                    function (position){
                                        if(milat == 'undefined' || milat == null || milat ==""){
                                            coords_lat =  {
                                            lat: position.coords.latitude,
                                            };
                                            //milat = position.coords.latitude;
                                        }else{
                                            coords_lat =  {
                                            lat: milat,
                                            };
                                        }
                                        if(milng == 'undefined' || milng == null || milng ==""){
                                            coords_lng =  {
                                              lng: position.coords.longitude,
                                            };
                                            //lng = position.coords.longitude;
                                        }else{
                                            coords_lng =  {
                                              lng: milng,
                                            };
                                        } 
                                        /*coords_lat =  {
                                            lat: milat,
                                            };

                                        coords_lng =  {
                                              lng: milng,
                                            };*/
                                        setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa


                                      },function(error){console.log(error);});
                            }

                            function setMapa (coords_lat, coords_lng)
                            {
                                //document.getElementById("cliente_latitud").value = coords_lat.lat;
                               // document.getElementById("cliente_longitud").value = coords_lng.lng;
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
                                <input type="number" step="any" name="latitud_asoc" value="<?php echo ($this->input->post('latitud_asoc') ? $this->input->post('latitud_asoc') : $asociado['latitud_asoc']); ?>" class="form-control" id="latitud_asoc" />
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="longitud_asoc" class="control-label">Longitud</label>
                            <div class="form-group">
                                <input type="number" step="any" name="longitud_asoc" value="<?php echo ($this->input->post('longitud_asoc') ? $this->input->post('longitud_asoc') : $asociado['longitud_asoc']); ?>" class="form-control" id="longitud_asoc" />
                            </div>
                    </div>
                    <div class="col-md-3">
                        <label for="sistemared_asoc" class="control-label">Sistema Red</label>
                        <div class="form-group">
                            <select name="sistemared_asoc" class="form-control" id="sistemared_asoc" required>
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_sistema_red as $sistemared)
                                {
                                    $selected = ($sistemared["nombre_sred"] == $asociado['sistemared_asoc']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$sistemared["nombre_sred"].'" '.$selected.'>'.$sistemared["nombre_sred"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="medidor_asoc" class="control-label">Medidor</label>
                        <div class="form-group">
                            <input type="text" name="medidor_asoc" value="<?php echo ($this->input->post('medidor_asoc') ? $this->input->post('medidor_asoc') : $asociado['medidor_asoc']); ?>" class="form-control" id="medidor_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="orden_asoc" class="control-label">Orden</label>
                        <div class="form-group">
                            <input type="text" name="orden_asoc" value="<?php echo ($this->input->post('orden_asoc') ? $this->input->post('orden_asoc') : $asociado['orden_asoc']); ?>" class="form-control" id="orden_asoc" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="codigocatastral_asoc" class="control-label"><span class="text-danger">*</span>Código Catastral</label>
                        <div class="form-group" style="display: flex">
                            <input type="text" name="codigocatastral_asoc" value="<?php echo ($this->input->post('codigocatastral_asoc') ? $this->input->post('codigocatastral_asoc') : $asociado['codigocatastral_asoc']); ?>" class="form-control" id="codigocatastral_asoc" required />
                            <a onclick="generarcodigo()" class="btn btn-warning" title="Generar codigo">
                                <i class="fa fa-file-text-o"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="lecturabase_asoc" class="control-label">Lectura base(Mts3)</label>
                        <div class="form-group">
                            <input style="background: #ccffeb" type="number" step="any" min="0" name="lecturabase_asoc" value="<?php echo ($this->input->post('lecturabase_asoc') ? $this->input->post('lecturabase_asoc') : $lectura_basesocio['actual_lec']); ?>" class="form-control" id="lecturabase_asoc" requierd />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="meslec_asoc" class="control-label"><span class="text-danger">*</span>Mes</label>
                        <div class="form-group">
                            <select style="background: #ccffeb" name="meslec_asoc" id="meslec_asoc" class="form-control" required>
                                <?php 
                                $meslec_asoc_values = array(
                                    'ENERO'=>'ENERO',
                                    'FEBRERO'=>'FEBRERO',
                                    'MARZO'=>'MARZO',
                                    'ABRIL'=>'ABRIL',
                                    'MAYO'=>'MAYO',
                                    'JUNIO'=>'JUNIO',
                                    'JULIO'=>'JULIO',
                                    'AGOSTO'=>'AGOSTO',
                                    'SEPTIEMBRE'=>'SEPTIEMBRE',
                                    'OCTUBRE'=>'OCTUBRE',
                                    'NOVIEMBRE'=>'NOVIEMBRE',
                                    'DICIEMBRE'=>'DICIEMBRE',
                                );

                                foreach($meslec_asoc_values as $value => $display_text)
                                {
                                    $selected = ($value == $lectura_basesocio['mes_lec']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="gestionlec_asoc" class="control-label">Gestión</label>
                        <div class="form-group">
                            <select style="background: #ccffeb" name="gestionlec_asoc" class="form-control" id="gestionlec_asoc">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_gestion as $gestion)
                                {
                                    $selected = ($gestion["gestion_lec"] == $lectura_basesocio['gestion_lec']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$gestion["gestion_lec"].'" '.$selected.'>'.$gestion["gestion_lec"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fechalec_asoc" class="control-label">Fecha Lec.</label>
                        <div class="form-group">
                            <input style="background: #ccffeb" type="date" name="fechalec_asoc" value="<?php echo ($this->input->post('fechalec_asoc') ? $this->input->post('lecturabase_asoc') : $lectura_basesocio['fecha_lec']); ?>" class="form-control" id="fechalec_asoc" requierd />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="id_emp" class="control-label">Empresa</label>
                        <div class="form-group">
                            <select name="id_emp" class="form-control">
                                <!--<option value="">select empresa</option>-->
                                <?php 
                                foreach($all_empresa as $empresa)
                                {
                                    $selected = ($empresa['id_emp'] == $asociado['id_emp']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$empresa['id_emp'].'" '.$selected.'>'.$empresa['nombre_emp'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="estado" class="control-label">Estado</label>
                        <div class="form-group">
                            <select name="estado" class="form-control">
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_estado as $estado)
                                {
                                    $selected = ($estado['estado'] == $asociado["estado"]) ? ' selected="selected"' : "";
                                    echo '<option value="'.$estado["estado"].'" '.$selected.'>'.$estado["estado"].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <!--<div class="col-md-6">
                        <label for="fechahora_asoc" class="control-label">Fechahora Asoc</label>
                        <div class="form-group">
                            <input type="text" name="fechahora_asoc" value="<?php //echo ($this->input->post('fechahora_asoc') ? $this->input->post('fechahora_asoc') : $asociado['fechahora_asoc']); ?>" class="form-control" id="fechahora_asoc" />
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('asociado'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>