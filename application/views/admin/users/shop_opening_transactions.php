<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">

	<div class="box-body">
		<div class="row">
			<!-- include message block -->
			<div class="col-sm-12">
				<?php $this->load->view('admin/includes/_messages'); ?>
			</div>
		</div>

		<?php if (empty($url_data)): ?>
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('Shop Opening Transactions'); ?></h3>
				</div>
				<div class="right">
					<a href="<?php echo admin_url(); ?>shop-opening-requests" class="btn btn-success btn-add-new">
						<?php echo ('Shop Opening Requests'); ?>
					</a>
					<a href="<?php echo admin_url(); ?>shop-opening-requests?ws=workshop" class="btn btn-success btn-add-new">
						<?php echo ('Workshop Opening Requests'); ?>
					</a>
				</div>
			</div><!-- /.box-header --><br/>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
							<thead>
							<tr role="row">
								<th width="20"><?php echo trans('id'); ?></th>
								<th><?php echo trans('user'); ?></th>
								<th><?php echo trans('payment_method'); ?></th>
								<th><?php echo trans('payment_amount'); ?></th>
								<th><?php echo trans('payment_status'); ?></th>
								<th><?php echo trans('purchased_plan'); ?></th>
								<th><?php echo trans('status'); ?></th>
								<th class="max-width-120"><?php echo trans('options'); ?></th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ($transactions as $user): ?>
								<tr>
									<td><?php echo html_escape($user->id); ?></td>
									<td><?php echo get_user($user->user_id)->slug; ?></td>
									<td><?php echo html_escape($user->payment_method); ?></td>
									<td><?php echo html_escape($user->payment_amount); ?></td>
									<td><?php echo html_escape($user->payment_status); ?></td>
									<td><?php echo html_escape($user->purchased_plan); ?></td>
									<td><?php echo html_escape($user->status); ?></td>
									<td>
										<?php echo form_open('admin_controller/approve_shop_opening_request'); ?>
										<input type="hidden" name="id" value="<?php echo $user->user_id; ?>">
										<input type="hidden" name="shop_date" value="<?php echo $user->created_at; ?>">
										<div class="dropdown">
											<button class="btn bg-purple dropdown-toggle btn-select-option" type="submit" name="submit"  value="2" >
												<?php echo ('View Details'); ?>
											</button>
										</div>
										<?php echo form_close(); ?>
									</td>
								</tr>

							<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php else: ?>
				

				<div class="box-header with-border">
					<div class="left">
						<h3 class="box-title"><?php echo (get_user($url_data)->slug); ?></h3>
					</div>
					<?php foreach ($transactions as $user): if ($user->user_id == $url_data && $user->created_at == $data2 && (strpos($user->purchased_plan, 'asic') == false && strpos($user->purchased_plan, 'remium') == false && strpos($user->purchased_plan, 'ltimate') == false)): ?>
					<div class="right">
						<a href="<?php echo admin_url(); ?>shop-opening-requests" class="btn btn-success btn-add-new">
							<?php echo ('Shop Opening Requests'); ?>
						</a>
					</div>
					<?php elseif ($user->user_id == $url_data && $user->created_at == $data2 && (strpos($user->purchased_plan, 'asic') != false || strpos($user->purchased_plan, 'remium') != false || strpos($user->purchased_plan, 'ltimate') != false)): ?>
					<div class="right">
						<a href="<?php echo admin_url(); ?>shop-opening-requests?ws=workshop" class="btn btn-success btn-add-new">
							<?php echo ('Workshop Opening Requests'); ?>
						</a>
					</div>
					<?php endif; endforeach; ?><br/>
				</div>
				<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						


							<?php foreach ($transactions as $user): if ($user->user_id == $url_data && $user->created_at == $data2): ?>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('id'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->id); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('purchased_plan'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->purchased_plan); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_amount'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->payment_amount); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_id'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->payment_id); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_method'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->payment_method); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_status'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->payment_status); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('currency'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->currency); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo ('Days'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->day_count); ?></div>
								</div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('date'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $user->created_at; ?></div>
                                </div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('ip_address'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->ip_address); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('options'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;">
										<?php echo form_open('admin_controller/approve_shop_opening_request'); ?>
										<input type="hidden" name="id" value="<?php echo $user->id; ?>">
										<?php if ($user->payment_status != 'payment_completed') : ?>
											<div class="dropdown">
												<button class="btn bg-purple dropdown-toggle btn-select-option" type="submit" name="submit"  value="3" >
													<?php echo ('Confirm Payment'); ?>
												</button>
											</div>
										<?php else: ?>
											<?php echo ('Payment Completed'); ?>
										<?php endif; ?>
										<?php echo form_close(); ?>
									</div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('status'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($user->status); ?></div>
								</div>
							<?php endif; endforeach; ?>

					</div>
				</div>
			</div>
			<div class="box-header with-border" style="margin-top: 30px;">
				<div class="left">
					<a href="<?php echo admin_url(); ?>shop-opening-requests?gp=sprqtrn" class="btn btn-success btn-add-new">
						<?php echo ('Payment Transactions'); ?>
					</a>
				</div>
			</div>
			<?php endif; ?>


	</div><!-- /.box-body -->
</div>
