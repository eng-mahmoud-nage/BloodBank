{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('e-mail', 'E-mail:') !!}
			{!! Form::text('e-mail') !!}
		</li>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('subject', 'Subject:') !!}
			{!! Form::text('subject') !!}
		</li>
		<li>
			{!! Form::label('messege', 'Messege:') !!}
			{!! Form::textarea('messege') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}