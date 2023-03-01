$("#search").click(async function () {
    if ($("#start").val() !== "" && $("#end").val() !== "") {
        let url = `./controller/Costprice2.php?product_id=${$("#product_id").val()}&start=${$("#start").val()}&end=${$("#end").val()}`
        const product = await (await fetch(url)).json()
        setUI(product)
    }
});

async function start() {
    let url = './controller/CostPrice2.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
}

function setUI(data) {
    $("canvas#graphCanvas").remove();
    $("#ChartTable").append(`<canvas id="graphCanvas" style="height:70vh; width:80vw;"></canvas>`);
    var name = [];
    var marks = [];
    for (var i in data) {
        name.push(data[i].product_name);
        marks.push(data[i].cost_price);
    }
    const ctx = $("#graphCanvas");
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: name,
            datasets:
                [
                    {
                        barPercentage: 0.5,
                        barThickness: 50,
                        maxBarThickness: 50,
                        minBarLength: 2,
                        label: 'ราคาทุน',
                        data: marks,
                        backgroundColor: ['rgb(180, 120, 120)',],
                        borderColor: ['rgb(120, 120, 120)',],
                        borderWidth: 1,
                    }
                ]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 20
                        }
                    }
                }
            }
        }
    });

    Chart.defaults.font.size = 14;
}