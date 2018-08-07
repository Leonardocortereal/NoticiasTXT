<!DOCTYPE html>
 <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de noticas em txt adaptado por Leennard">
        <meta name="keywords" content="jQuery, Ajax, Javascript, HTML5, CSS3, Bootstrap">
        <meta name="author" content="Leennard">
        <title>Admin • Adicionar Noticias</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  href="css/style.css" media="all">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/jquery.wysibb.min.js"></script>
        <link rel="stylesheet" href="css/wbbtheme.css" />
        <script>
            $(function() {
                var wbbOpt = {
                    buttons: "bold,italic,underline,|,img,link,|,code,quote"
                }
                $("#contenu").wysibb(wbbOpt);
            })
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header class="col-sm-12">
                    <h1>Interface de edição de noticias</h1>
                    <p><a href="noticias.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Ir para o inicio</a></p><br/>
                </header>

                <div id="content-form" class="col-sm-12">
                    <?php
                    if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['pseudo'])) {
                         //On définit les variables
                        $titre = $_POST['titre'];
                         $contenu = $_POST['contenu'];
                         $pseudo = $_POST['pseudo'];
                        $news = unserialize(file_get_contents('noticias.txt'));
                        $news[] = array('titre' => $titre, 'auteur' => $pseudo, 'contenu' => $contenu);
                        file_put_contents('noticias.txt', serialize($news));
                        
                        echo '<div class="alert alert-dismissible alert-success"><h4><i class="fa fa-check"></i> Parabéns!</h4><p>A Noticia foi adicionada!';
                        echo '<br/>';
                        echo '<a href="noticias.php" class="alert-link">Voltar ao inicio</a></p></div>';
                    }
                    else {
                    ?>
                    <form action="" class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="pseudo"><i class="fa fa-user-o"></i> Seu username</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="Nome Do Autor" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="titre"><i class="fa fa-font"></i> Titulo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="titre" id="titre" placeholder="Titulo da noticia" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="contenu"><i class="fa fa-comment-o"></i> Conteudo da noticia</label>
                            <div class="col-sm-10">
                                <textarea name="contenu" id="contenu" class="form-control" rows="8"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-plus"></i> Adicionar noticia</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
                
                <footer class="col-sm-12">
                    <p>Sistema de noticias txt</p>
                </footer>
            </div>
        </div>    
    </body>
</html>