@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
			<h3>{{$channel->name}}</h3>
			<div id="data">

			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	Echo.private(`topic.{{$channel->slug}}`)
		.listen('.Namespace\\Event\\NewMessage', (e) => {
			console.log(e);
			var data = JSON.parse(e.data);
			var html = ``;
			for (var i in data) {
				html += `<div class="block">
					<span class="name">`+i+`</span>
					<hr>
					<br>
					<p class="message">`+data[i]+`</p>
				</div>`;
			}

			var div = document.getElementById('data');

			div.innerHTML += html;
		});
        var echoInstance = Echo.join(`topic.{{$channel->slug}}`)

        console.log("Channel Members: ", echoInstance.subscription.members)



</script>
@endsection
