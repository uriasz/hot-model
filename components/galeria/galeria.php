
<head>
    <link rel="stylesheet" href="components/galeria/styles.css">
 </head>
 
 <section class="card-section">
    <h1>SECTION TITLE</h1>

    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Pesquisar" />
      <button onclick="filtrarCards()" class="search-btn">
        <img src="assets/search.svg" alt="Search Icon" />
      </button>
    </div>

    <div class="cards-container" id="cardsContainer">
      <!-- Cards serão inseridos via JavaScript -->
    </div>
  </section>

  <script>
    // 🔧 Cria dinamicamente os cards na seção
    function criarCard(conteudo) {
      const card = document.createElement('div');
      card.className = 'card';
      card.textContent = conteudo;
      return card;
    }

    // 💡 Adiciona múltiplos cards no container
    const container = document.getElementById('cardsContainer');
    for (let i = 1; i <= 30; i++) {
      const card = criarCard(`Card ${i}`);
      container.appendChild(card);
    }

    // 🔍 Filtro simples para busca de cards
    function filtrarCards() {
      const termo = document.getElementById('searchInput').value.toLowerCase();
      const cards = document.querySelectorAll('.card');
      cards.forEach(card => {
        const conteudo = card.textContent.toLowerCase();
        card.style.display = conteudo.includes(termo) ? 'flex' : 'none';
      });
    }
  </script>