{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('play_store_url', 'Play_store_url:') !!}
			{!! Form::text('play_store_url') !!}
		</li>
		<li>
			{!! Form::label('app_store_url', 'App_store_url:') !!}
			{!! Form::text('app_store_url') !!}
		</li>
		<li>
			{!! Form::label('fb_link', 'Fb_link:') !!}
			{!! Form::text('fb_link') !!}
		</li>
		<li>
			{!! Form::label('twt_link', 'Twt_link:') !!}
			{!! Form::text('twt_link') !!}
		</li>
		<li>
			{!! Form::label('insta_link', 'Insta_link:') !!}
			{!! Form::text('insta_link') !!}
		</li>
		<li>
			{!! Form::label('youtube_link', 'Youtube_link:') !!}
			{!! Form::text('youtube_link') !!}
		</li>
		<li>
			{!! Form::label('about_app', 'About_app:') !!}
			{!! Form::textarea('about_app') !!}
		</li>
		<li>
			{!! Form::label('e-mail', 'E-mail:') !!}
			{!! Form::text('e-mail') !!}
		</li>
		<li>
			{!! Form::label('notification_setting_text', 'Notification_setting_text:') !!}
			{!! Form::text('notification_setting_text') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}