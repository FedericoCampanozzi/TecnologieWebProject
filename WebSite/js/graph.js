function generateBarGraph(canvasId, colorTo, colorFrom, lbls, arr_data, xText, yText) {
    let colors = []
    let step = 1.0 / parseFloat(lbls.length);
    graph = document.getElementById(canvasId);

    Chart.defaults.interaction = false;

    for (let t = 0.0; t <= 1.0; t += step) {
        colors.push(colorLerp(colorFrom, colorTo, t));
    }

    let data_cfg = {
        labels: lbls,
        datasets: [{
            display: false,
            label: "",
            data: arr_data,
            backgroundColor: colors
        }]
    };

    let config_cfg = {
        type: 'bar',
        data: data_cfg,
        options: {
            scales: {
                x: {
                    min: 0,
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
    };

    chart = new Chart(graph, config_cfg);
}