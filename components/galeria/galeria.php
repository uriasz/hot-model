
<?php
  $imagens = [];
  $diretorio = __DIR__ . '/imagens';
  foreach (glob($diretorio . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE) as $arquivo) {
    $imagens[] = basename($arquivo);
  }
?>
<head>
    <link rel="stylesheet" href="components/galeria/styles.css">
</head>

<section class="card-section">
    <!-- atualizar para "programação" ou o que couber melhor -->
    <h1>Galeria</h1>

    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Pesquisar" />
      <button onclick="filtrarCards()" class="search-btn">
        <img src="assets/search.svg" alt="Search Icon" />
      </button>
    </div>

    <div class="cards-container" id="cardsContainer">
      <!-- Cards serão inseridos via JavaScript -->
    </div>

    <div id="imageModal" class="modal">
        <span class="close" id="closeModal">&times;</span>
        <img class="modal-content" id="modalImg" alt="">
    </div>
</section>

<script>
    // Recebe a lista de imagens do PHP
    const imagens = <?php echo json_encode($imagens); ?>;

    // Cria dinamicamente os cards com imagens
    function criarCard(nomeImagem) {
        const card = document.createElement('div');
        card.className = 'card';

        const img = document.createElement('img');
        img.src = 'components/galeria/imagens/' + nomeImagem;
        img.alt = nomeImagem;
        img.className = 'card-img';

        // Legenda oculta para filtro
        const legenda = document.createElement('span');
        legenda.textContent = nomeImagem;
        legenda.style.display = 'none';

        card.appendChild(img);
        card.appendChild(legenda);

        // Evento para abrir modal
        card.onclick = function() {
            document.getElementById('modalImg').src = img.src;
            document.getElementById('imageModal').style.display = 'flex';
        };

        return card;
    }

    // Fecha o modal ao clicar no X ou fora da imagem
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('imageModal').style.display = 'none';
        };
        document.getElementById('imageModal').onclick = function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        };

        // Adiciona os cards no container
        const container = document.getElementById('cardsContainer');
        imagens.forEach(nomeImagem => {
            const card = criarCard(nomeImagem);
            container.appendChild(card);
        });

        // Busca automática ao digitar
        document.getElementById('searchInput').addEventListener('input', filtrarCards);
    });

    // Filtro simples para busca de cards pelo nome da imagem
    function filtrarCards() {
        const termo = document.getElementById('searchInput').value.toLowerCase();
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            const legenda = card.querySelector('span').textContent.toLowerCase();
            card.style.display = legenda.includes(termo) ? 'flex' : 'none';
        });
    }
</script>