<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<!--
												<header class="panel-heading">
														<label class="color">Plugin for <strong>Bootstrap3</strong></label>
												</header>
												-->
												<div class="panel-tools fully " align="right" data-toolscolor="#6CC3A0">
														<ul class="tooltip-area">
																<li>
																	<a href="<?= site_url('entity/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
																</li>
																<li>
																	<a href="<?= site_url('entity/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
																</li>
																<li>
																	<a href="<?= site_url('entity/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
																</li>
																<li></li>
																<li>
																	<a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a>
																</li>
																<li>
																	<a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a>
																</li>
																<li>
																	<a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a>
																</li>																
														</ul>
														
														
												</div>
												<div class="panel-body">
														<form>
																<table class="table table-bordered table-striped" id="table-example">
																		<thead>
																				<tr>
																					<th width="80px" class="text-center">No</th>
																					<th class="text-center">Company Name</th>
																					<th class="text-center">Address</th>
																					<th class="text-center">Phone</th>
																					<th class="text-center">Fax</th>
																					<th class="text-center">Logo</th>
																					<th class="text-center">Action</th>
																				</tr>
																		</thead>
																		<tbody align="center">
																		<?php
																				$start = 0;
																				foreach ($entity_data as $entity)
																				{
																		?>
																				<tr class="odd gradeX">
																						<td><?= ++$start ?></td>
																						<td><?= $entity->company_name ?></td>
																						<td><?= $entity->address ?></td>
																						<td><?= $entity->phone ?></td>
																						<td><?= $entity->fax ?></td>
																						<td><?=$entity->logo ?></td>
																						<td>
																							<span class="tooltip-area">
																									<a href="<?= site_url('entity/read/'.$entity->id)?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i>
																									</a>
																									<a href="<?= site_url('entity/read/'.$entity->id)?>" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye"></i>
																									</a>
																									<a href="<?= site_url('entity/delete/'.$entity->id)?>""  class="btn btn-default btn-sm" title="Delete" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
																									</a>
																							</span>
																						</td>
																				</tr>
																		<?php
																				}
																		?>		
																				
																		</tbody>
																</table>
														</form>
												</div>
										</section>
										
								</div>

						</div>