$("#category_id").change(async function () {
    if ($("#category_id").val() !== "all") {
        let url = `./controller/SalesGraph.php?category_id=${$("#category_id").val()}`
        if($("#date").val() !== ''){
            url += `&date=${$("#date").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/SalesGraph.php'
        if($("#date").val() !== ''){
            url += `&date=${$("#date").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    }
});

$("#date").change(async function(){
    if ($("#date").val() !== "") {
        let url = `./controller/SalesGraph.php?date=${$("#date").val()}`
        if($("#category_id").val() !== 'all'){
            url += `&category_id=${$("#category_id").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/SalesGraph.php'
        if($("#category_id").val() !== 'all'){
            url += `&date=${$("#category_id").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    }
})

async function start() {
    let url = './controller/SalesGraph.php'
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
            marks.push(data[i].sales_amt);
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
