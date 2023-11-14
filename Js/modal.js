document.addEventListener("DOMContentLoaded", function() {
    // Chama a função ao carregar a página
    atualizarQuantidadeLembretes();
});

const modal = document.querySelector("dialog");

function abrirModal() {
    modal.showModal();
    atualizarListaLembretes(); // Atualizar a lista ao abrir o modal
}

function adicionar() {
    let text = document.getElementById("lembrete").value;

    if(text != ""){
        // Obter a lista atual de lembretes do localStorage ou criar uma nova array
        let lembretes = JSON.parse(localStorage.getItem("lembretes")) || [];

        // Adicionar o novo lembrete à array
        lembretes.push(text);

        // Salvar a array atualizada de lembretes no localStorage
        localStorage.setItem("lembretes", JSON.stringify(lembretes));

        // Atualizar a lista e a quantidade na página
        atualizarListaLembretes();
        atualizarQuantidadeLembretes();
    }else{
        alert("Digite algo.")
    }


}

function remover(index) {
    let lembretes = JSON.parse(localStorage.getItem("lembretes")) || [];
    
    // Remover o lembrete pelo índice
    lembretes.splice(index, 1);

    // Salvar a array atualizada de lembretes no localStorage
    localStorage.setItem("lembretes", JSON.stringify(lembretes));

    // Atualizar a lista e a quantidade na página
    atualizarListaLembretes();
    atualizarQuantidadeLembretes();
}

function atualizarListaLembretes() {
    let lista = document.getElementById("lista-lembrete");
    lista.innerHTML = ""; // Limpar a lista antes de preenchê-la novamente

    // Obter a lista de lembretes do localStorage
    let lembretes = JSON.parse(localStorage.getItem("lembretes")) || [];

    // Adicionar cada lembrete à lista na página
    lembretes.forEach(function (lembrete, index) {
        // Incluir um botão para remover cada lembrete
        lista.innerHTML += `<li class="itemLi" >${lembrete} <button class="remover" onclick="remover(${index})">Remover</button></li>`;
    });
}

function atualizarQuantidadeLembretes() {
    let quantidade = JSON.parse(localStorage.getItem("lembretes"))?.length || 0;
    document.getElementById("quantidadeLembretes").innerHTML = `<b>${quantidade}</b>`;
}