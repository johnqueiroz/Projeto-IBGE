function soma(numero1, numero2) {
    return numero1 + numero2
}

function subtracao(numero1, numero2) {
    return numero1 - numero2
}

function divisao(numero1, numero2) {
    return numero1 / numero2
}

function multiplicacao(numero1, numero2) {
    return numero1 * numero2
}

function fatorial(num)
{
    if (num === 0)
      { return 1 }
    else
      { return num * fatorial( num - 1 ) }
}

function potencia(num1,num2){
    return Math.pow(num1, num2)
}

function raizquadrada(num1) {
    return Math.sqrt(num1)
}

function logaritmo(num1) {
    return Math.log10(num1)
}


document.getElementById('calcular_soma').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('soma_valor1').value)
    let valor2 = Number(document.getElementById('soma_valor2').value)   

    document.getElementById('soma_resultado').value = soma(valor1, valor2)
})

document.getElementById('calcular_subtracao').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('subtracao_valor1').value)
    let valor2 = Number(document.getElementById('subtracao_valor2').value)   

    document.getElementById('subtracao_resultado').value = subtracao(valor1, valor2)
})

document.getElementById('calcular_multiplicacao').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('multiplicacao_valor1').value)
    let valor2 = Number(document.getElementById('multiplicacao_valor2').value)   

    document.getElementById('multiplicacao_resultado').value = multiplicacao(valor1, valor2)
})

document.getElementById('calcular_divisao').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('divisao_valor1').value)
    let valor2 = Number(document.getElementById('divisao_valor2').value)   

    document.getElementById('divisao_resultado').value = divisao(valor1, valor2)
})

document.getElementById('calcular_potencia').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('potencia_valor1').value)
    let valor2 = Number(document.getElementById('potencia_valor2').value)   

    document.getElementById('potencia_resultado').value = potencia(valor1, valor2)
})

document.getElementById('calcular_raiz').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('raiz_valor1').value)  

    document.getElementById('raiz_resultado').value = raizquadrada(valor1)
})

document.getElementById('calcular_logaritmo').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('logaritmo_valor1').value)

    document.getElementById('logaritmo_resultado').value = logaritmo(valor1)
})

document.getElementById('calcular_fatorial').addEventListener("click", function() {
    let valor1 = Number(document.getElementById('fatorial_valor1').value)

    document.getElementById('fatorial_resultado').value = fatorial(valor1)
})

document.getElementById('comfirmaConta').addEventListener('click', function() {
    let email = document.getElementById('login').value
    let senha = document.getElementById('senha').value

    //tem q ter padrao == qualquer coisa@alguma coisa.com
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        alert("email valido")
    }
    else{
        alert("email invalido")
    }

    // pode ser letras,o '_' e numeros apenas e tem que ter no minimo 5
    if (/\w{5,}/.test(senha)){
        alert('senha dentro dos padroes')
    }
    else{
        alert('senha fora dos padroes')
    }
})