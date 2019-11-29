{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('client_id', 'Client_id:') !!}
			{!! Form::text('client_id') !!}
		</li>
		<li>
			{!! Form::label('clintable_id', 'Clintable_id:') !!}
			{!! Form::text('clintable_id') !!}
		</li>
		<li>
			{!! Form::label('clintable_type', 'Clintable_type:') !!}
			{!! Form::text('clintable_type') !!}
		</li>
		<li>
			{!! Form::label('is_read', 'Is_read:') !!}
			{!! Form::text('is_read') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}