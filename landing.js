const ctx = document.getElementById('myChart');
const names = ['Prototipos', 'Proyectos', 'Libros', 'Articulos', 'Tesis Dirigida'];
const ages = [24, 10, 54, 51, 15];

const myChart = new Chart(ctx , {
    type: 'pie',
    data: {
        labels: names,
        datasets:[{
            label: 'Valor',
            data: ages,
            backgroundColor:[
                '#8AA624', // carlos
                '#7ADAA5', // pedro
                '#B9375D', // maria
                '#3B38A0', // rosa
                '#F97A00'  // juan
            ],
            borderWidth: 3.5
        }]
    },
    options: {


        plugins: {
            legend: {
                display: false // 👈 oculta los nombres y barras de colores
            }
        }
    }
});
