const crearGrafica = (canvasId, etiquetas, valores, colores) => {
    const ctx = document.getElementById(canvasId);
    if (!ctx) {
        console.warn(`No se encontró el canvas con id: "${canvasId}"`);
        return;
    }

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [{
                data: valores,
                backgroundColor: colores,
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: {
                legend: {
                    display: false
                }
            },
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                    min: 0,
                    max: 100,
                    grid: {
                        display: false
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#333333',
                        font: {
                            family: 'Raleway, sans serif',
                            size: 15,
                            weight: '600'
                        }
                    }
                }
            }
        }
    });
};

document.addEventListener('DOMContentLoaded', () => {
  crearGrafica('admingrafic1',
    ['Proyectos Personales', 'Proyectos de Alumnos', 'Articulos', 'Prototipos', 'Propiedad Industrial', 'Propiedad autoral', 'Memorias', 'Libros', 'Capítulos de Libros', 'Tesis Dirigidas', 'Otro Tipo'],
    [24, 10, 54, 51, 15, 20, 40, 1, 33, 23, 2],
    ['#8AA624', '#7ADAA5', '#B9375D', '#3B38A0', '#F97A00', '#8ABB6C', '#FF9B2F', '#5E936C', '#EA5B6F', '#FFCB61', '#004030']
);

crearGrafica('admingrafic2',
    ['Proyectos Personales', 'Proyectos de Alumnos', 'Articulos', 'Prototipos', 'Propiedad Industrial', 'Propiedad autoral', 'Memorias', 'Libros', 'Capítulos de Libros', 'Tesis Dirigidas', 'Otro Tipo'],
    [20, 40, 50, 60, 70, 10, 15, 5, 30, 10, 2],
    ['#8AA624', '#7ADAA5', '#B9375D', '#3B38A0', '#F97A00', '#8ABB6C', '#FF9B2F', '#5E936C', '#EA5B6F', '#FFCB61', '#004030']
);

crearGrafica('admingrafics3',
    ['Proyectos Personales', 'Proyectos de Alumnos', 'Articulos', 'Prototipos', 'Propiedad Industrial', 'Propiedad autoral', 'Memorias', 'Libros', 'Capítulos de Libros', 'Tesis Dirigidas', 'Otro Tipo'],
    [33, 66, 88, 32, 55, 22, 15, 5, 30, 10, 8],
    ['#8AA624', '#7ADAA5', '#B9375D', '#3B38A0', '#F97A00', '#8ABB6C', '#FF9B2F', '#5E936C', '#EA5B6F', '#FFCB61', '#004030']
);

crearGrafica('admingrafics4',
    ['Proyectos Personales', 'Proyectos de Alumnos', 'Articulos', 'Prototipos', 'Propiedad Industrial', 'Propiedad autoral', 'Memorias', 'Libros', 'Capítulos de Libros', 'Tesis Dirigidas', 'Otro Tipo'],
    [33, 66, 88, 32, 55, 22, 15, 5, 30, 10, 8],
    ['#8AA624', '#7ADAA5', '#B9375D', '#3B38A0', '#F97A00', '#8ABB6C', '#FF9B2F', '#5E936C', '#EA5B6F', '#FFCB61', '#004030']
);
  


});
