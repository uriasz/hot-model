<?php
// Exemplo de array de notícias (substitua pela consulta ao banco)
$noticias = [
    [
        'manchete' => 'Manchete da notícia',
        'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur iaculis mattis velit vel interdum. Fusce et metus non enim interdum lobortis. Cras interdum nisi ut semper iaculis. Nam ultricies sollicitudin tellus vel aliquam. Curabitur sit amet purus sapien.',
        'fonte' => 'Fonte da notícia/veículo',
        'link' => 'https://exemplo.com/noticia1'
    ],

    [
        'manchete' => 'Manchete da notícia2',
        'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur iaculis mattis velit vel interdum. Fusce et metus non enim interdum lobortis. Cras interdum nisi ut semper iaculis. Nam ultricies sollicitudin tellus vel aliquam. Curabitur sit amet purus sapien.',
        'fonte' => 'Fonte da notícia/veículo',
        'link' => 'https://exemplo.com/noticia1'
    ],
    // Adicione mais notícias aqui...
];
?>

<link rel="stylesheet" href="components/noticias/styles.css">

<div class="noticias-container">
    <h2 class="noticias-titulo" id="titulo-noticia">O PROJETO NA MÍDIA</h2>
    <div class="carrossel-noticias">
        <button class="carrossel-seta" id="prevNoticia">&#8592;</button>
        <div class="noticia-card" id="noticiaCard">
            <!-- Conteúdo da notícia será inserido via JS -->
        </div>
        <button class="carrossel-seta" id="nextNoticia">&#8594;</button>
    </div>
</div>

<script>
const noticias = <?php echo json_encode($noticias); ?>;
let atual = 0;

function renderNoticia(idx) {
    const card = document.getElementById('noticiaCard');
    const titulo = document.getElementById('titulo-noticia');
    // Adiciona fade-out
    card.classList.add('fade-out');
    titulo.classList.add('fade-out');
    setTimeout(() => {
        const noticia = noticias[idx];
        card.innerHTML = `
            <h3 class="noticia-manchete">${noticia.manchete}</h3>
            <p class="noticia-descricao">${noticia.descricao}</p>
            <p class="noticia-fonte">${noticia.fonte}</p>
            <a class="noticia-link" href="${noticia.link}" target="_blank">LEIA NA ÍNTEGRA</a>
        `;
        // Remove fade-out e adiciona fade-in
        card.classList.remove('fade-out');
        card.classList.add('fade-in');
        titulo.classList.remove('fade-out');
        titulo.classList.add('fade-in');
        setTimeout(() => {
            card.classList.remove('fade-in');
            titulo.classList.remove('fade-in');
        }, 400);
    }, 400);
}

document.getElementById('prevNoticia').onclick = function() {
    atual = (atual - 1 + noticias.length) % noticias.length;
    renderNoticia(atual);
};
document.getElementById('nextNoticia').onclick = function() {
    atual = (atual + 1) % noticias.length;
    renderNoticia(atual);
};

document.addEventListener('DOMContentLoaded', function() {
    renderNoticia(atual);
});
</script>