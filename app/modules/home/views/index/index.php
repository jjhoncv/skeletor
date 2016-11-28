<!DOCTYPE html>
<html>
  <head>
    <title>Demo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="&lt;?php echo $_SERVER['SERVER_NAME']?&gt;/static/libs/dist/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="&lt;?php echo $_SERVER['SERVER_NAME']?&gt;/static/css/dist/fonts.css">
    <link rel="stylesheet" href="&lt;?php echo $_SERVER['SERVER_NAME']?&gt;/static/css/dist/index.css">
    <script type="text/javascript">
      var yOSON = {
        "module": "home",
        "controller": "index",
        "action": "index",
        "baseHost": "",
        "statHost": "",
        "eHost": "",
        "statVers": "",
        "AppCore": {},
        "AppSandbox": {},
        "AppSchema": {
          "modules": {},
            "requires": {}
        }
      };
    </script>
  </head>
  <body>
    <p><?php echo $_SERVER['SERVER_NAME']?></p>
    <nav class="navbar navbar-default">
      <div class="container">
        <ul class="nav navbar-nav">
          <li class="active"><a>Login</a></li>
        </ul>
      </div>
    </nav>
    <div class="container"></div>
  </body>
  <script src="&lt;?php echo $_SERVER['SERVER_NAME']?&gt;/static/libs/dist/jquery/dist/jquery.js" type="text/javascript"></script>
  <script src="&lt;?php echo $_SERVER['SERVER_NAME']?&gt;/static/libs/dist/yosonjs/dist/yoson.js" type="text/javascript"></script>
  <script src="&lt;?php echo $_SERVER['SERVER_NAME']?&gt;/static/js/dist/scripts/index.js" type="text/javascript"></script>
  <script src="&lt;?php echo $_SERVER['SERVER_NAME']?&gt;/static/js/dist/libs/yosonjs-utils.js" type="text/javascript"></script>
</html>