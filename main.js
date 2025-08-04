
    
    const crearGrafica = (canvasId, etiquetas, valores, colores) => {
    const ctx = document.getElementById(canvasId);
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: etiquetas,
            datasets: [{
                data: valores,
                backgroundColor: colores,
                borderWidth: 1.5
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
};

crearGrafica('grafica1',
    ['Proyectos Personales', 'Proyectos de Alumnos', 'Articulos', 'Prototipos', 'Propiedad Industrial', 'Propiedad autoral', 'Memorias', 'Libros', 'Capítulos de Libros', 'Tesis Dirigidas', 'Otro Tipo'],
    [24, 10, 54, 51, 15, 20, 40, 1, 33, 23, 2],
    ['#8AA624', '#7ADAA5', '#B9375D', '#3B38A0', '#F97A00', '#8ABB6C', '#FF9B2F', '#5E936C', '#EA5B6F', '#FFCB61', '#004030']
);

crearGrafica('grafica2',
    ['Proyectos Personales', 'Proyectos de Alumnos', 'Articulos', 'Prototipos', 'Propiedad Industrial', 'Propiedad autoral', 'Memorias', 'Libros', 'Capítulos de Libros', 'Tesis Dirigidas', 'Otro Tipo'],
    [20, 40, 50, 60, 70, 10, 15, 5, 30, 10, 2],
    ['#8AA624', '#7ADAA5', '#B9375D', '#3B38A0', '#F97A00', '#8ABB6C', '#FF9B2F', '#5E936C', '#EA5B6F', '#FFCB61', '#004030']
);

crearGrafica('grafica3',
    ['Proyectos Personales', 'Proyectos de Alumnos', 'Articulos', 'Prototipos', 'Propiedad Industrial', 'Propiedad autoral', 'Memorias', 'Libros', 'Capítulos de Libros', 'Tesis Dirigidas', 'Otro Tipo'],
    [33, 66, 88, 32, 55, 22, 15, 5, 30, 10, 8],
    ['#8AA624', '#7ADAA5', '#B9375D', '#3B38A0', '#F97A00', '#8ABB6C', '#FF9B2F', '#5E936C', '#EA5B6F', '#FFCB61', '#004030']
);