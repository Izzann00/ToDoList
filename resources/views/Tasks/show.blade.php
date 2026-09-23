@extends('layouts.app')

@section('title')

    Llista de Tasques | ToDo List

@endsection

@section('content')

	<style>

		.body {
			width: 85%;
			margin: 0 auto;
			padding: 30px 10px;
			text-align: justify;
		}

		.text-size {
			margin:10px;
			font-size:1.5em;
		}

		@media(max-width:600px){
			.text-size {
				margin:0px;
				font-size:1.35em;
				margin-top:1em;
			}
		}

	</style>

	<div class="container pt-5" style="margin-bottom:100px;">
		<div class="row mb-2">
			<div class="col-md-12">
					<h1 class="text-center">
						{{ $task->title }}
					</h1>
				<div class="body">

					<p class="text-size">
						<strong>Descripció:</strong>
						<br>
						{{ $task->description }}
					</p>
					<a href="/tasks/index" class="btn btn-primary">
						Tornar
					</a>

				</div>
			</div>
		</div>
	</div>

@endsection