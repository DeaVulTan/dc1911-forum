<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ошибка</title>
		<style type='text/css'>
			body {
				background: #f9f9f9;
				margin: 0;
				padding: 30px 20px;
				font-family: "Helvetica Neue", helvetica, arial, sans-serif;
			}

			#error {
				max-width: 800px;
				background: #fff;
				margin: 0 auto;
			}

			h1 {
				background: #151515;
				color: #fff;
				font-size: 22px;
				font-weight: 500;
				padding: 10px;
			}

				h1 span {
					color: #7a7a7a;
					font-size: 14px;
					font-weight: normal;
				}

			#content {
				padding: 20px;
				line-height: 1.6;
			}

			#reload_button {
				background: #151515;
				color: #fff;
				border: 0;
				line-height: 34px;
				padding: 0 15px;
				font-family: "Helvetica Neue", helvetica, arial, sans-serif;
				font-size: 14px;
				border-radius: 3px;
			}
		</style>
	</head>
	<body>
		<div id='error'>
			<h1>Ошибка <span>(500 Ошибка)</span></h1>
			<div id='content'>
				К сожалению, но это временная техническая ошибка, которая означает, что мы не можем отобразить этот сайт прямо сейчас.
				<br><br>
				<?php if ( isset( $message ) and $message ): ?>
					<em><?php echo $message; ?></em><br><br>
				<?php endif; ?>
				Вы можете попробовать еще раз, нажав на кнопку ниже, или повторить попытку позже.
				<br><br>
				<button onclick="window.location.reload();" id='reload_button'>Попробовать еще раз</button>
			</div>
		</div>
	</body>
</html>