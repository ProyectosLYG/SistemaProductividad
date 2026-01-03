document.addEventListener('DOMContentLoaded', () =>{
    const resumen = document.querySelector('#resumenCapitulo');
    const limite = document.querySelector('#limite-letras');

    resumen.addEventListener('input', resumenCapitulo);

    function resumenCapitulo(e){
        limite.textContent = e.target.value.length + '/850';
    }
});