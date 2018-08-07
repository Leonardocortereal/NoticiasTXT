<!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de noticias em txt">
        <meta name="keywords" content="jQuery, Ajax, Javascript, HTML5, CSS3, Bootstrap">
        <meta name="author" content="Leennard">
            
        <title>Admin • Editar noticias</title>

        <!-- CSS/Font-Awesome/Style -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  href="css/style.css" media="all">
        <!-- JS/jQuery/Bootstrap -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- Load WysiBB JS and Theme -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/jquery.wysibb.min.js"></script>
        <!-- FOR FRENCH LANGUAGE <script src="js/lang/fr.js"></script> FOR FRENCH LANGUAGE -->
        <link rel="stylesheet" href="css/wbbtheme.css" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Init WysiBB BBCode editor -->
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
                    <h1>Editar noticias</h1>
                    <p><a href="" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar ao inicio</a></p><br/>
                </header>

                <div id="content-form" class="col-sm-12">
                    <?php
                    if(!isset($_GET['id'])) {
                        header('Location: ');
                        exit();
                    }

                    $news = unserialize(file_get_contents('noticias.txt'));
                    $newsAmodifier = (int) $_GET['id'];
                    if(isset($_POST['titre']) && isset($_POST['contenu'])) {
                        $news[$newsAmodifier]['titre'] = $_POST['titre'];
                        $news[$newsAmodifier]['contenu'] = $_POST['contenu'];
                        file_put_contents('noticias.txt', serialize($news));
                        echo '<div class="alert alert-dismissible alert-success"><h4><i class="fa fa-check"></i> Sucesso!</h4><p>A noticia foi editada!';
                        echo '<br />';
                        echo '<a href="" class="alert-link">Voltar </a></p></div>';
                    } else {
                    ?>
                    <form action="" class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="auteur"><i class="fa fa-user-o"></i> Autor</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="auteur" id="auteur" value="<?php echo $news[$newsAmodifier]['auteur'] ?>" placeholder="<?php echo $news[$newsAmodifier]['auteur'] ?>" disabled="" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="titre"><i class="fa fa-font"></i> Titulo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="titre" id="titre" value="<?php echo $news[$newsAmodifier]['titre'] ?>" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="contenu"><i class="fa fa-comment-o"></i> Conteudo</label>
                            <div class="col-sm-10">
                                <textarea name="contenu" id="contenu" class="form-control" rows="8"><?php echo $news[$newsAmodifier]['contenu'] ?></textarea>
                            </div>
                        </div>
                        <input class="btn btn-primary pull-right" type="submit" value="Aplicar mudanças">
                    </form>
                    <?php
                    }
                    ?>
                </div>
                
                <footer class="col-sm-12">
                    <p>Sistema de noticias em txt</p>
                </footer>
            </div>
        </div>    
    </body>
</html>