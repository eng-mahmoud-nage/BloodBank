{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title') !!}
		</li>
		<li>
			{!! Form::label('content', 'Content:') !!}
			{!! Form::textarea('content') !!}
		</li>
		<li>
			{!! Form::label('donation_request_id', 'Donation_request_id:') !!}
			{!! Form::text('donation_request_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}