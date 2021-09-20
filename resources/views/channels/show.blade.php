@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
			<div class="col-md-12">
                <h3>{{$channel->name}}</h3>
            </div>
            <br>
			<div class="col-md-12" id="data">

			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	Echo.private(`topic.{{$channel->slug}}`)
		.listen('NewMessage', (e) => {
			console.log(e);
			var data = JSON.parse(e.data);
			var html = ``;
			for (var i in data) {
				html +=
                `<div class="card">
                    <div class="card-header">`+i+`</div>

                    <div class="card-body">
                        <div class="text-center">`+data[i]+`</div>
                    </div>
                </div>`;
			}

			var div = document.getElementById('data');

			div.innerHTML += html;
		});
</script>
@endsection
