<!DOCTYPE html>
 <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de noticias em php">
        <meta name="keywords" content="jQuery, Ajax, Javascript, HTML5, CSS3, Bootstrap">
        <meta name="author" content="Leennard">    
        <title>Admin • Deletar noticias</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  href="css/style.css" media="all">
        <link rel="stylesheet" href="css/wbbtheme.css">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.wysibb.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header class="col-sm-12">
                    <h1>Deletar noticia</h1>
                    <p><a href="" class="btn btn-default"><i class="fa fa-arrow-left"></i> Ir para o inicio</a></p><br/>
                </header>

                <div id="content-form" class="col-sm-12">
                    <?php
                    if(!isset($_GET['id'])) {
                        header('Location: ');
                        exit();
                    }
                    $news = unserialize(file_get_contents('noticias.txt'));
                    $id = (int) $_GET['id'];

                    if(isset($news[$id])) {
                        unset($news[$id]);

                        //Then we save the whole
                        file_put_contents('noticias.txt', serialize($news));

                        echo '<div class="alert alert-dismissible alert-success"><i class="fa fa-check"></i> A noticia foi <strong>deletada</strong>!</div>';
                    }
                    else {
                        echo '<div class="alert alert-dismissible alert-warning"><i class="fa fa-exclamation-triangle"></i> A notticia <strong>não existe</strong>!</div>';
                    }
                    echo '<br />';
                    echo '<a href="" class="btn btn-default">Voltar </a>';
                    ?>
                </div>
                
                <footer class="col-sm-12">
                    <p>Sisetma de noticias txtt</p>
                </footer>
            </div>
        </div>    
    </body>
</html>