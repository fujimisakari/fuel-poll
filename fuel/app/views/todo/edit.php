<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Todo Site</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		header{
		}
		a{
			color: #883ced;
		}
		a:hover{
			color: #af4cf0;
		}
		.btn.btn-primary{color:#ffffff!important;background-color:#883ced;background-repeat:repeat-x;background-image:-khtml-gradient(linear, left top, left bottom, from(#fd6ef7), to(#883ced));background-image:-moz-linear-gradient(top, #fd6ef7, #883ced);background-image:-ms-linear-gradient(top, #fd6ef7, #883ced);background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fd6ef7), color-stop(100%, #883ced));background-image:-webkit-linear-gradient(top, #fd6ef7, #883ced);background-image:-o-linear-gradient(top, #fd6ef7, #883ced);background-image:linear-gradient(top, #fd6ef7, #883ced);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fd6ef7', endColorstr='#883ced', GradientType=0);text-shadow:0 -1px 0 rgba(0, 0, 0, 0.25);border-color:#883ced #883ced #003f81;border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);}
		body { margin: 0px 0px 40px 0px; }
	</style>
</head>
<body>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Edit Task</h1>
				<a href="<?php echo Router::get('todo_index'); ?>">back</a>
				<br />
				<br />
				<hr>
				<?php echo Form::open(array('action' => $task->edit_url(), 'method' => 'post')); ?>
				<div>
					<label>Category</label>
					<?php echo Form::select('category_id', $task->category_id, $select_category_list); ?>
				</div>
				<br />
				<div>
					<label>Title</label>
					<?php echo Form::input('title', $task->title); ?>
				</div>
				<br />
				<div>
					<label>Note</label>
					<?php echo Form::textarea('note', $task->note); ?>
				</div>
				<br />
				<?php echo Form::submit('post'); ?>
				<?php echo Form::close(); ?>
			</div>
		</div>
		<hr/>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo Fuel::VERSION; ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
