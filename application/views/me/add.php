<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Me Add</h3>
            </div>
            <?php echo form_open('me/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="mes_lec" class="control-label">Mes Lec</label>
						<div class="form-group">
							<select name="mes_lec" class="form-control">
								<option value="">select</option>
								<?php 
								$mes_lec_values = array(
									'ENERO'=>'ENERO',
									'FEBRERO'=>'FEBRERO',
									'MARZO'=>'MARZO',
									'ABRIL'=>'ABRIL',
								);

								foreach($mes_lec_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('mes_lec')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>