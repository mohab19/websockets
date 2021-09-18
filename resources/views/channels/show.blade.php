<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>{{$channel->name}}</title>
		<style media="screen">
			.body {
				text-align: center;
				margin: 20px 50px 0px;
				padding: 50px 20px;
			}
			.block {
				padding: 15px;
				background: #e3e0e0;
				border-radius: 5px;
				text-align: left;
				width: 50%;
			}
			.block .name {
				padding: 5px 10px;
				background: #C3C3C3;
			}
		</style>
	</head>
	<body>
		<div class="body">
			<h3>{{$channel->name}}</h3>
			<div id="data">

			</div>
		</div>
		<script src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript">
            Echo.channel(`{{$channel->slug}}`)
                .listen('NewMessage', (e) => {
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
        </script>
	</body>
</html>
