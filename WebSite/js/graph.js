function generateBarGraph(canvasId, colorTo, colorFrom, lbls, data, xText, yText) {
    let colors = []
    let step = 1.0 / parseFloat(lbls.length);
    graph = document.getElementById(canvasId);

    Chart.defaults.interaction = false;

    for (let t = 0.0; t <= 1.0; t += step) {
        colors.push(colorLerp(colorFrom, colorTo, t));
    }

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                }
            }
        },
    };

    chart = new Chart(graph, {
        type: 'bar',
        data: {
            labels: lbls,
            datasets: [{
                display: false,
                label: "",
                data: data,
                backgroundColor: colors
            }]
        },
        options: {
            scales: {
                x: {
                    min: 10,
                    title: {
                        display: true,
                        text: xText,
                        color: '#000',
                        font: {
                            family: 'Lato',
                            size: 20,
                            weight: 'bold',
                            lineHeight: 1.2,
                        },
                        padding: { top: 20, left: 0, right: 0, bottom: 0 }
                    }
                },
                y: {
                    min: 0,
                    title: {
                        display: true,
                        text: yText,
                        color: '#000',
                        font: {
                            family: 'Lato',
                            size: 20,
                            weight: 'bold',
                            lineHeight: 1.2,

                        },
                        padding: { top: 20, left: 0, right: 0, bottom: 0 }
                    }
                }
            },
            elements: {
                bar: {
                    borderColor: '#000',
                    borderWidth: 2
                }
            },

            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: false
                }
            }
        }
    });
    graph.style.height = "500px";
}