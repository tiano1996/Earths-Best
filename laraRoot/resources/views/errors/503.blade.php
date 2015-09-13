<html>
	<head>
        <meta charset="utf-8">
		<link href='http://fonts.useso.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato','Microsoft YaHei';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
			}
            .content .goback{
                color: #B0BEC5;
                text-decoration: none;
                display: block;
                text-align: left;
                padding-bottom: 50px;
            }
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
                <a href="/" class="goback">返回首页</a>
				<div class="title">Be right back.</div>
                <div class="body">
                    ----{{$error}}
                </div>
			</div>
		</div>
	</body>
</html>
