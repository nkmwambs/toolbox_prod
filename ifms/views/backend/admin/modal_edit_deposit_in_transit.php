<?php
$rec = $this->db->get_where('transitfundsbf',array('transitBfID'=>$param2))->row();

$start_date = date('Y-m-t',strtotime('-1 month',strtotime($this->finance_model->project_system_start_date($rec->icpNo))));

?>
<div class="row">
		<div class="col-md-12">
			
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-pencil"></i>
                            <?php echo get_phrase('edit_deposit_in_transit');?>
                        </div>
                    </div>
                    <div class="panel-body">
                    	<?php echo form_open(base_url() . 'ifms.php/admin/opening_deposit_in_transit/edit/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>	
						
						<div class="form-group">
							<label class="control-label col-sm-4"><?=get_phrase('project_id');?></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?=$rec->icpNo;?>" name="icpNo" id="icpNo" readonly="readonly" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-4"><?=get_phrase('transaction_date');?></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?=$start_date;?>" name="TDate" id="TDate" readonly="readonly" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-4"><?=get_phrase('details');?></label>
							<div class="col-sm-8">
								<input type="text" class="form-control"  name="Details" id="Details" value="<?=$rec->Details;?>" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-4"><?=get_phrase('amount');?></label>
							<div class="col-sm-8">
								<input type="text" class="form-control"  name="amount" id="amount" value="<?=$rec->amount;?>" />
							</div>
						</div>
						
						<div class="form-group">
							<button class="btn btn-primary btn-icon"><i class="fa fa-pencil"></i><?=get_phrase('edit');?></button>
						</div>	
						
						</form>
					</div>
				</div>
		</div>
</div>	

<script>
	$(document).ready(function(){
		$('.datepicker')
		.datepicker({
				format: 'yyyy-mm-dd',
				endDate:"<?php echo date('Y-m-t',strtotime('-1 month',strtotime($this->finance_model->project_system_start_date($param2))));?>"
		})
		.prop('readonly','readonly');
	});
</script>					