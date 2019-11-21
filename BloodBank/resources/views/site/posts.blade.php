{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title') !!}
		</li>
		<li>
			{!! Form::label('image', 'Image:') !!}
			{!! Form::text('image') !!}
		</li>
		<li>
			{!! Form::label('content', 'Content:') !!}
			{!! Form::textarea('content') !!}
		</li>
		<li>
			{!! Form::label('category_id', 'Category_id:') !!}
			{!! Form::text('category_id') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}