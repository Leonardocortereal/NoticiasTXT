<?php
require_once "JBBCode/Parser.php";

$parser = new JBBCode\Parser();
$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
$parser->addBBCode("quote", '<blockquote><p>{param}</p></blockquote>');
$parser->addBBCode("code", '<code>{param}</code>', false, false, 1);

?>
<!DOCTYPE html>
 <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de noticias em txt">
        <meta name="keywords" content="jQuery, Ajax, Javascript, HTML5, CSS3, Bootstrap">
        <meta name="author" content="Leennard">
            
        <title>Home • Noticias</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  href="css/style.css" media="all">
        <link rel="stylesheet" href="css/wbbtheme.css">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.wysibb.min.js"></script>
        <script>
            $(function() {
                $("#wysibb").wysibb();
            })
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header class="col-sm-12">
                    <h1><i class="fa fa-newspaper-o"></i> Lista de noticias</h1>
                    <p><a href="adicionar_noticia.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar noticia</a></p><br/>
                </header>

                <div id="content-form" class="col-sm-12">
                    <?php
                    $liste_news = unserialize(file_get_contents('noticias.txt'));
                    if(!empty($liste_news)) {
                        foreach($liste_news as $id => $news) {
                            $news = array_map('htmlspecialchars', $news);
                    ?>
                    <div class="panel panel-default">
                            <div class="panel-heading"><p><strong><?php echo $news['titre'] ?></strong> - <em>Por <?php echo $news['auteur'] ?></em></p></div>
                        <div class="panel-body">
                                <p><?php $parser->parse($news['contenu']); echo $parser->getAsHtml(); ?></p>
                                <i><a href="" class="text-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></a>
                                &nbsp;
                                <a href="editar_noticia.php?id=<?php echo $id ?>"><i class="fa fa-pencil-square-o"></i></a></i>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    else {
                        echo '<div class="alert alert-dismissible alert-danger"><i class="fa fa-exclamation-circle"></i> Não existem noticias de momento</div>';
                    }
                    echo '<a href="adicionar_noticia.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Noticia</a>';
                    ?>
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">AVISO!</h4>
                      </div>
                      <div class="modal-body">
                        Tem certeza que quer deletar esta noticia?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="deletar_noticia.php?id=<?php echo $id ?>" return confirm type="button" class="btn btn-danger">Deletar</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.Modal -->
                
                <footer class="col-sm-12">
                    <p>Sistema de noticias em txt</p>
                </footer>
            </div>
        </div>    
    </body>
</html>