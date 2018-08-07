<?php
require_once "JBBCode/Parser.php";

$parser = new JBBCode\Parser();
$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
$parser->addBBCode("quote", '<blockquote><p>{param}</p></blockquote>');
$parser->addBBCode("code", '<code>{param}</code>', false, false, 1);

?>

(Colocar no inicio da pagina)
	
	
	<!-- Noticias -->
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel">
					<div class="panel-title" id="titulo">Noticias</div>
					<div class="panel-body">
						<div id="content-form" class="col-sm-12">
							<?php
							$liste_news = unserialize(file_get_contents('noticias/news.txt'));
							if(!empty($liste_news)) {
								foreach($liste_news as $id => $news) {
									$news = array_map('htmlspecialchars', $news);
							?>
							<div class="panel panel-default noticia">
									<div class="panel-heading noticia"><p><strong><?php echo $news['titre'] ?></strong> - <em>Por <?php echo $news['auteur'] ?></em></p></div>
								<div class="panel-body noticia">
										<p><?php $parser->parse($news['contenu']); echo $parser->getAsHtml(); ?></p>
								</div>
							</div>
							<?php
								}
							}
							else {
								echo '<div class="alert alert-dismissible alert-danger"><i class="fa fa-exclamation-circle"></i> Não existem noticias de momento</div>';
							}
							?>
						</div>
					   
					</div>
				</div>
			</div>
		<div>
		
		(Colocar onde quer que apareça a noticia)
		
		
		
		

            
	<script>
		$(function() {
			$("#wysibb").wysibb();
		})
	</script>
	
	(Colocar no final da pagina)
	