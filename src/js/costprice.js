$("#start"),$("#end").change(async function(){
    if ($("#start").val(),$("#end").val() !== "") {
        let url = `./controller/CostPrice.php?date=${$("#start").val()}&${$("#end").val("")}`
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/CostPrice.php'
        const product = await (await fetch(url)).json()
        setUI(product)
    }
})

async function start() {
    let url = './controller/CostPrice.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
}

$(document).ready(function () {
    start()
});


function setUI(data) {
    $("canvas#graphCanvas").remove();
    $("#ChartTable").append(`<canvas id="graphCanvas"></canvas>`);
    {
        var name = [];
        var marks = [];
        for (var i in data) {
            name.push(data[i].product_name);
            marks.push(data[i].cost_price);
        }
        var chartdata = {
            labels: name,
            datasets: [
                {
                    label: 'การขาย',
                    backgroundColor: '#49e2ff',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: marks
                }
            ]
        };

        var graphTarget = $("#graphCanvas");
        var barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
        });
    }
}
