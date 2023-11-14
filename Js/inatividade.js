let tempoInatividade = 0;

document.addEventListener("DOMContentLoaded", function () {
    iniciarContagemInatividade();
});

function iniciarContagemInatividade() {
    // Reinicia a contagem quando ocorre uma interação do usuário
    document.addEventListener("mousemove", reiniciarContagem);
    document.addEventListener("keydown", reiniciarContagem);

    // Inicia um intervalo para verificar a inatividade a cada minuto
    setInterval(verificarInatividade, 60000); // 60000 milissegundos = 1 minuto
}

function reiniciarContagem() {
    tempoInatividade = 0;
    console.log("Contagem reiniciada.");
}

function verificarInatividade() {
    tempoInatividade++;
    console.log(`Tempo de inatividade: ${tempoInatividade}`);

    // Define o limite de inatividade para 10 minutos (10 minutos * 60 segundos)
    const limiteInatividade = 10;

    if (tempoInatividade >= limiteInatividade) {
        // Redireciona para index.php após 10 minutos de inatividade
        window.location.href = "../login/index.php";
        console.log("Redirecionamento por inatividade.");
    }
}
