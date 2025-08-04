document.addEventListener('DOMContentLoaded', () =>{
    const resumen = document.querySelector('#resumen_libro');
    const limite = document.querySelector('#limite-letras');

    resumen.addEventListener('input', resumenLibro);

    function resumenLibro(e){
        limite.textContent = e.target.value.length + '/850';
    }
});