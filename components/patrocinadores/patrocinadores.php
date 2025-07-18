<link rel="stylesheet" href="components/patrocinadores/styles.css">


<!-- Carrega a logo dos patrocinadores contidas na pasta "components/patrocinadores/imagens" -->
<div class="patrocinadores-container">
    <h2 class="patrocinadores-titulo">Patrocinadores / Parcerias</h2>
    <div class="patrocinadores-logos">
        <?php
            $dirPatrocinadores = __DIR__ . '/imagens';
            foreach (glob($dirPatrocinadores . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE) as $arquivo) {
                $nomeArquivo = basename($arquivo);
                echo '<img src="components/patrocinadores/imagens/' . $nomeArquivo . '" alt="Patrocinador" class="patrocinador-logo">';
            }
        ?>
    </div>
</div>
        