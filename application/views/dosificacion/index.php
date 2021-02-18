<style type="text/css">
    .linea:hover {
  background-color: #dddddd;
}
</style>
<div class="box-header">
    <h3 class="box-title">Dosificación</h3>
    <div class="box-tools">
        <?php
        if($newdosif == 0){
        ?>
            <a href="<?php echo site_url('dosificacion/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
        <?php } ?>
        <?php
        if($newdosif == 1){
        ?>
            <a href="<?php echo site_url('dosificacion/edit/'.$dosificacion[0]["id_dosif"]); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="box">
        <div class="col-md-12 linea">
            <div class="col-md-1">
                <label class="control-label">Autorización</label>
            </div>
            <div class="col-md-3">
                <?php echo $dosificacion[0]['numorden_dosif']; ?>
            </div>
            <div class="col-md-1">
                <label class="control-label">Llave</label>
            </div>
            <div class="col-md-3" style="word-break: break-word;">
                <?php echo $dosificacion[0]['llave_dosif']; ?>
            </div>
            <div class="col-md-1">
                <label class="control-label">Fecha Limite</label>
            </div>
            <div class="col-md-3">
                <?php echo date("d/m/Y", strtotime($dosificacion[0]['fechalim_dosif'])); ?>
            </div>
        </div>
        <div class="col-md-12 linea">
            <div class="col-md-1">
                <label class="control-label">Fecha y hora</label>
            </div>
            <div class="col-md-3">
                <?php echo date("d/m/Y H:i:s", strtotime($dosificacion[0]['fechahora_dosif'])); ?>
            </div>
            <div class="col-md-1">
                <label class="control-label">Num. Factura</label>
            </div>
            <div class="col-md-3">
                <?php echo $dosificacion[0]['numfact_dosif']; ?>
            </div>
            <div class="col-md-1">
                <label class="control-label">Estado</label>
            </div>
            <div class="col-md-3">
                <?php echo $dosificacion[0]['estado_dosif']; ?>
            </div>
        </div>
        <div class="col-md-12 linea">
            <div class="col-md-1">
                <label class="control-label">Leyenda 1</label>
            </div>
            <div class="col-md-3">
                <?php echo $dosificacion[0]['dosificacion_leyenda1']; ?>
            </div>
            <div class="col-md-1">
                <label class="control-label">Leyenda 2</label>
            </div>
            <div class="col-md-3">
                <?php echo $dosificacion[0]['dosificacion_leyenda2']; ?>
            </div>
            <!--<div class="col-md-1">
                <label class="control-label">Estado</label>
            </div>
            <div class="col-md-3">
                <?php //echo $dosificacion[0]['estado_dosif']; ?>
            </div>-->
        </div>
    </div>
</div>
