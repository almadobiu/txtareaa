
<?php 

include('../conexao.php');

$id = $_GET['id'];

$query = "SELECT * FROM posts where id=$id ";

$sql = mysql_query($query) or die(mysql_error());
$dados = mysql_fetch_array($sql);

$titulo     =  isset($_POST['titulo']) ? $_POST['titulo'] : null;

$conteudo   = isset($_POST['conteudo']) ? $_POST['conteudo'] : null;

$categoria  = isset($_POST['categoria']) ? $_POST['categoria'] : null;

$msg = '';

if ( empty($titulo) ) {
  $msg += "Campo titulo obrigatório <br>";
}
if ( empty($conteudo) ) {
  $msg += "Campo conteúdo obrigatório <br>";

}

if ( !empty($titulo) && !empty($conteudo) && !empty($id)) {
  //cria a query para ser executada no banco
  $query = " UPDATE posts SET titulo = '$titulo', conteudo='$conteudo', idCategoria=$categoria where id=$id ";  
    //die($query);
  if (mysql_query($query) or mysql_error()) {
    $msg = "Matéria Atualizada com sucesso!";
  }

}



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="../lib/css/prettify.css"></link>
    <link rel="stylesheet" type="text/css" href="../src/bootstrap-wysihtml5.css"></link>

    <style type="text/css" media="screen">
      .btn.jumbo {
        font-size: 20px;
        font-weight: normal;
        padding: 14px 24px;
        margin-right: 10px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
      }
    </style>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30181385-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
          <ul class="nav nav-sidebar">
            <li><a href="post.php">Posts</a></li>
            <li><a href="">Item 2</a></li>
            <li><a href="">Item 3</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Posts</h1>

          <p> <?php echo $msg; ?></p>
          
          <form class="form-horizontal" method="post" >
            <fieldset>

            <!-- Form Name -->
            <legend>Cadastro de Post</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="titulo">Titulo</label>  
              <div class="col-md-4">
              <input id="titulo" name="titulo" value="<?php echo $dados['titulo'] ?>" type="text" placeholder="Titulo" class="form-control input-md">
                 
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="conteudo">Conteúdo</label>
              <div class="col-md-4">                     
                <textarea class="form-control" id="conteudo" name="conteudo"> <?php echo $dados['conteudo']; ?></textarea>
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="categoria">Categoria</label>
              <div class="col-md-4">
                <select id="categoria" name="categoria" class="form-control">
                  <option value="1">Projetos</option>
                  <option value="2">Eventos</option>
                </select>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="postar"></label>
              <div class="col-md-4">
                <button id="postar" name="postar" class="btn btn-primary">Postar</button>
              </div>
            </div>

            </fieldset>
            </form>
          
  
        
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>-->
    <!-- Just to make our placeholder images work. Don't actually copy the next line! 
     <script src="../assets/js/vendor/holder.min.js"></script> 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../js/ie10-viewport-bug-workaround.js"></script>

    <script src="../lib/js/wysihtml5-0.3.0.js"></script>
    <script src="../lib/js/jquery-1.7.2.min.js"></script>
    <script src="../lib/js/prettify.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <script src="../src/bootstrap-wysihtml5.js"></script>

<script>
  $('#conteudo').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
  $(prettyPrint);
</script>
  </body>
</html>
