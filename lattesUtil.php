<?php

class lattesUtil {
    
    public static function carregaLattes($urlLattes){
        if (filter_var($urlLattes, FILTER_VALIDATE_URL) === false)
            return false;
        else return utf8_encode(file_get_contents($urlLattes));
    }

    public static function textoInformadoAutor($htmlLattes) {
       
        $htmlLattes = explode('<h2 class="nome"', $htmlLattes);
        $htmlLattes = explode('class="texto">', $htmlLattes[1]);
        $htmlLattes = explode('>', $htmlLattes[1]);

        if (is_string($htmlLattes[0]))
            return addslashes(trim(strip_tags($htmlLattes[0])));
        else
            return false;
    }

    public static function formacaoAcademica($htmlLattes) {

        $htmlLattes = explode('<h1>Forma&ccedil;&atilde;o acad&ecirc;mica/titula&ccedil;&atilde;o</h1>', $htmlLattes);
        $htmlLattes = explode('</div><br class="clear" /></div><br class="clear" /><div class="title-wrapper">', $htmlLattes[1]);

        if (is_string($htmlLattes[0]))
            return addslashes(trim(strip_tags($htmlLattes[0])));
        else
            return false;
    }

    public static function projetoPesquisa($htmlLattes) {

        $htmlLattes = explode('<h1>Projetos de pesquisa</h1>', $htmlLattes);
        $htmlLattes = explode('</div><br class="clear" /></div><br class="clear" /><div class="title-wrapper">', $htmlLattes[1]);

        if (is_string($htmlLattes[0]))
            return addslashes(trim(strip_tags($htmlLattes[0])));
        else
            return false;
    }

    public static function areaAtuacao($htmlLattes) {

        $htmlLattes = explode('<h1>&Aacute;reas de atua&ccedil;&atilde;o</h1>', $htmlLattes);
        $htmlLattes = explode('</div><br class="clear" /></div><br class="clear" /><div class="title-wrapper">', $htmlLattes[1]);

        if (is_string($htmlLattes[0]))
            return addslashes(trim(strip_tags($htmlLattes[0])));
        else
            return false;
    }
    
    public static function premiosTitulos($htmlLattes) {
		
        $htmlLattes = explode('<h1>Pr&', $htmlLattes);
        $htmlLattes = explode('data-cell">', $htmlLattes[1]);       
        $htmlLattes = explode('</div><br class="clear" /></div><br class="clear" /><div class="title-wrapper">', $htmlLattes[1]);

        if (is_string($htmlLattes[0]))
            return addslashes(trim(strip_tags($htmlLattes[0])));
        else
            return false;
    }
    
	public static function producoes($htmlLattes) {
		
        $htmlLattes = explode('<h1>Produ&ccedil;&otilde;es', $htmlLattes);
        $htmlLattes = explode('</div><br class="clear" /></div><br class="clear" /><div class="title-wrapper">', $htmlLattes[1]);

        if (is_string($htmlLattes[0]))
            return addslashes(trim(strip_tags($htmlLattes[0],"<script>")));
        else
            return false;
    }
    
    public static function participacoes($htmlLattes) {
		
        $htmlLattes = explode('<h1>Eventos', $htmlLattes);  
        $htmlLattes = explode('</div><br class="clear" /></div><br class="clear" /><div class="title-wrapper">', $htmlLattes[1]);

        if (is_string($htmlLattes[0]))
            return addslashes(trim(strip_tags($htmlLattes[0])));
        else
            return false;
    }
     
}

?>
