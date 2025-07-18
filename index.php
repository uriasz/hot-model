<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>HotSite Modelo</title>
</head>

<body>
  <?php require_once 'components/cabecalho/cabecalho.php'; ?>

  <img src="assets/banner.png" alt="Banner da Campanha" class="banner-campanha" />

  <div class="container">
    <nav class="menu">
      <!-- Caixa de destaque que será animada -->
      <div class="highlight"></div>

      <!-- Botões que carregam seções diferentes Adaptar de acordo com a campanha,incluir ou excluir seções de acordo com a necessidade -->
      <button onclick="carregarSecao(this, 'conteudo/o-que-e.php')" class="menu-btn">O QUE É</button>
      <button onclick="carregarSecao(this, 'conteudo/perspectiva.php')" class="menu-btn">PERSPECTIVA</button>
      <button onclick="carregarSecao(this, 'conteudo/onde.php')" class="menu-btn">ONDE</button>
    </nav>
  </div>

  <img src="assets/hr-line.png" alt="Divisor" class="line" />

  <div class="container">
    <div class="content">
      <!-- Área onde o conteúdo dinâmico será carregado -->
      <section id="conteudo" class="secao"></section>
    </div>
  </div>

    <div class="patrocinadores-container">
        <?php include 'components/patrocinadores/patrocinadores.php'; ?>
    </div>
    
    <!-- Carrega a galeria de imagens caso n exista uma na página, comentar essa linha, caso necessario, ajustar galeria no respectivo caminho -->
    <div id="galeria" class="galeria">
      <?php require_once 'components/galeria/galeria.php'; ?>
    </div>
    
    <div class="noticias-container">
        <?php include 'components/noticias/noticias.php'; ?>
    </div>
    <div class="footer">
        <?php include 'components/footer/footer.php'; ?>
    <script>
    // Função que carrega uma seção e move a caixa verde (highlight) para o botão clicado
    function carregarSecao(botao, nomeArquivo) {
        // Seleciona a área de conteúdo
        const area = document.getElementById('conteudo');

        // Mostra mensagem de carregamento
        area.innerHTML = "<p>Carregando...</p>";

        // Seleciona o elemento da caixa verde de destaque
        const highlight = document.querySelector('.highlight');

        // Obtém o valor da distância do botão em relação ao container (menu)
        const botaoOffsetLeft = botao.offsetLeft;

        // Define a posição horizontal da highlight com base no botão
        highlight.style.left = `${botaoOffsetLeft}px`;

        // Define a largura da caixa verde igual à largura do botão clicado
        highlight.style.width = `${botao.offsetWidth}px`;

        // Requisição para carregar o conteúdo da seção desejada
        fetch(nomeArquivo + "?t=" + new Date().getTime()) // Adiciona timestamp para evitar cache
        .then(response => response.text()) // Converte a resposta para texto
        .then(conteudo => {
            area.innerHTML = conteudo; // Insere o conteúdo na área de destino
        })
        .catch(erro => {
            area.innerHTML = "<p>Erro ao carregar conteúdo.</p>"; // Mensagem de erro
            console.error(erro); // Log do erro no console
        });
    }

    // Ao carregar a página, ativa automaticamente o primeiro botão e sua seção
    document.addEventListener('DOMContentLoaded', () => {
        const primeiroBotao = document.querySelector('.menu button');
        carregarSecao(primeiroBotao, 'conteudo/o-que-e.php');
    });

    // Função para rolar suavemente até a seção indicada no botão
    function gotoSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        } else {
            console.error('Seção não encontrada:', sectionId);
        }
    }

    </script>
</body>
</html>