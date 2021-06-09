<?php

use App\Core\Auth;

require __DIR__ . '/../layouts/head.php'; ?>


<div class="col-lg-12">
	<div class="row">
		<div class="col-md-3">

			<input class="input-ginx-md" type="search" placeholder="Search..">
		</div>
		<!-- <a href="<?= route('/project/add') ?>" class="btn btn-secondary btn-sm text-rigth">
			<i class="fa fa-plus"></i> Add Project
		</a> -->
		<div class="col-md-9 "><button style="font-size: 12px; border-radius: 17px; box-shadow: 4px 2px 7px 2px #ccc;" class="btn btn-inverse float-right" onclick="addProject()"><i class="fa fa-plus"></i> Add Project</button></div>
	</div>
</div>
<br style="clear:both;">
<br style="clear:both;">
<br style="clear:both;">
<div class="col-lg-12">
	<?= msg('RESPONSE_MSG'); ?>
	<div class="card p-4">
		<!-- Light table -->
		<div class="row"></div>
		<div class="table-responsive">
			<table class="table align-items-center table-striped table-bordered" id="projectTable">
				<thead class="thead-light">
					<tr>
						<th scope="col" class="sort" data-sort="name">
							<div class="dropdown-inverse dropdown open dropdown-toggle">
								<input type="checkbox" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
									<a class="dropdown-item waves-light waves-effect" href="#">All</a>
									<a class="dropdown-item waves-light waves-effect" href="#">Another action</a>
									<a class="dropdown-item waves-light waves-effect" href="#">Something else here</a>
								</div>
							</div>
						</th>
						<th scope="col" class="sort" data-sort="budget"></th>
						<th scope="col" class="sort" data-sort="status">

						</th>
						<th scope="col">
							<div class="float-right">
								<div class="dropdown-inverse dropdown open  dropdown-ginx-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="dropdown-toggle" id="dropdown-4"><i class="fa fa-filter"></i></span>
									<div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
										<a class="dropdown-item waves-light waves-effect" href="#">Action</a>
										<a class="dropdown-item waves-light waves-effect" href="#">Another action</a>
										<a class="dropdown-item waves-light waves-effect" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<div class="float-right">
								<div class="dropdown-inverse dropdown open  dropdown-ginx-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="dropdown-toggle" id="dropdown-4">Lens</span>
									<div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
										<a class="dropdown-item waves-light waves-effect" href="#">Action</a>
										<a class="dropdown-item waves-light waves-effect" href="#">Another action</a>
										<a class="dropdown-item waves-light waves-effect" href="#">Something else here</a>
									</div>
								</div>
							</div>

						</th>
					</tr>
					<tr class="tbl-tr-ginx-md">
						<th scope="col" class="sort" data-sort="name">PROJECT CODE</th>
						<th scope="col" class="sort" data-sort="budget">PROJECT NAME</th>
						<th scope="col" class="sort" data-sort="status">PROJECT DESCRIPTION</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody class="list">
					<?php foreach ($project_datas as $projects) : ?>
						<tr>
							<td><input type="checkbox" style="margin-right: 22%;"> <a href="<?= route('/project/detail', $projects->id) ?>"><?= $projects->project_code ?></a></td>
							<td><?= $projects->project_name ?></td>
							<td><?= $projects->description ?></td>
							<td style="text-align: right;">


								<a class="td-a-ginx-md" href="#" onclick="event.preventDefault(); document.getElementById('delete-project-form-' + '<?= $projects->id ?>').submit();">
									<i class="fa fa-eye"></i>
								</a>

								<a class="td-a-ginx-md" style="font-size: 18px;" href="#" onclick="event.preventDefault(); document.getElementById('delete-project-form-' + '<?= $projects->id ?>').submit();">
									<i class="fa fa-edit"></i>
								</a>

								<a class="td-a-ginx-md" style="font-size: 19px;" href="<?= route('/project/delete', $projects->id) ?>" onclick="event.preventDefault(); document.getElementById('delete-project-form-' + '<?= $projects->id ?>').submit();">
									<i class="far fa-trash-alt"></i>
								</a>




								<form id="delete-project-form-<?= $projects->id ?>" action="<?= route('/project/delete', $projects->id) ?>" method="POST" style="display:none;">
									<?= csrf() ?>
								</form>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>

			</table>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('#projectTable').DataTable({
			"searching": false,
			"paging": false
		});
	});

	function addProject() {
		window.location = "<?= route('/project/add') ?>";
	}
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>