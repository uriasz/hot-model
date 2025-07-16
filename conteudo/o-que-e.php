<div class="o-que-e">

    <!-- Alterar o conteúdo desta seção de acordo com a campanha -->
    <h1 class="titulo">O QUE É?</h1>
    <h2 class="sub-titulo">Subtitulo</h2>
    

    <div class="descricao-container">

    <!-- Descrição 1, primeira coluna da seção "o que é" -->
        <p class="descricao1">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur iaculis mattis velit vel interdum. 
            Fusce et metus non enim interdum lobortis. Cras interdum nisi ut semper iaculis. 
            Nam ultricies sollicitudin tellus vel aliquam. Curabitur sit amet purus sapien. 
            Cras lacus nisl, feugiat vitae erat a, suscipit imperdiet .
        </p>

    <!-- Descrição 2, segunda coluna da seção "o que é" -->
        <p class="descricao2">
           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur iaculis mattis velit vel interdum. 
            Fusce et metus non enim interdum lobortis. Cras interdum nisi ut semper iaculis. 
            Nam ultricies sollicitudin tellus vel aliquam. Curabitur sit amet purus sapien. 
            Cras lacus nisl, feugiat vitae erat a, suscipit imperdiet .
        </p>
    </div>

    <!-- Botões de ação -->
    <div class="btn-container">
        <img src="assets/big-arrow.png" alt="Seta Grande" class="seta-grande">
        <button class="btn-info" onclick="gotoSection('galeria')">Saiba Mais</button>
    </div>
    
    <!-- Imagem de resumo -->
    <img src="assets/mocking-img1.png" alt="Imagem de Resumo" class="img-resumo">
</div>

<script>
    function gotoSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        } else {
            console.error('Seção não encontrada:', sectionId);
        }
    }
</script>

<style>
    .o-que-e {
        position: relative;
        right: 6%;
        font-family: sans-serif;
        font-weight: semibold;
        height: 500px;
        margin-right: 10%;
    }

    .titulo {
        font-size: 48px;
        font-weight: bold;
    }

    .sub-titulo {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 2em;
    }

    .descricao-container {
        display: flex;
        flex-direction: row;
        margin-bottom: 20px;
        gap: 80px;
        margin-bottom: 10%;
    }

    .btn-container {
        display: flex;
        justify-content: flex-end;
        gap: 20px;
        margin-bottom: 20px;
        gap: 60px;
    }

    .btn-info {
        background-color: #19CCB2;
        padding: 10px 20px;
        border-style:solid;
        border-width: 1px;
        border-radius: 10px;
        cursor: pointer;
        width: 236px;
        height: 52px;
        font-size: 20px;
        font-weight: medium;
    }

    .seta-grande {
        display: flex;
        align-self: center;
        height: 26px;
    }

    .img-resumo {
        width: 307px;
        height: 474px;
        margin-top: 20px;
        position: relative;
        left: 137%;
        bottom: 500px;
        border-radius: 10px;
        border: 1px solid;
    }
</style>