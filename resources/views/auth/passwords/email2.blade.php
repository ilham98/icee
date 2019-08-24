<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
	<style type="text/css">
		.header {
			background: #fff176;
			text-align: center;
			padding: 20px 0;
			color: #f57f17;
			margin-bottom: 20px;
		}

		.btn {
			margin-top: 20px;
			border: 1px solid #2196f3;
			color: #2196f3;
			padding: 10px 20px;
			text-decoration: none;
		}

		.btn:hover {
			background: #f0f0f0;
		}

		* {
			font-family: sans-serif;
			margin: 0;
		}

		body {
			display: flex;
		}

		.body {
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="body">
		<div class="header">
			<h1>ICEE</h1>
			<h2>International Center For English Excellence</h2>
		</div>
		<div class="body-2">
			<div>
				<p style="text-align: center;">Use the button below to reset your password.</p>
				<p style="text-align: center; margin-top: 20px; margin-bottom: 20px"><a href="{{ $url }}" class="btn">Reset Your Password</a></p>
				
			</div>
		</div>
	</div>
</body>
</html>