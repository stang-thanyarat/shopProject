$("#search").click(async function () {
    if ($("#date").val() != "") {
        let url = `./controller/SalesGraph.php?category_id=${$("#category_id").val()}&date=${$("#date").val()}&limit=${$("#limit").val()}`
        const product = await (await fetch(url)).json()
        setUI(product)
    }
});


function setUI(data) {
    $("canvas#graphCanvas").remove();
    $("#ChartTable").append(`<canvas id="graphCanvas"></canvas>`);
    var name = [];
    var marks = [];
    for (var i in data) {
        name.push(data[i].product_name);
        marks.push(data[i].sales_amt);
    }
    const ctx = $("#graphCanvas");
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: name,
            datasets:
                [
                    {
                        label: 'ยอดขายสินค้า',
                        data: marks,
                        backgroundColor: ['rgb(180, 120, 120)',],
                        borderColor: ['rgb(120, 120, 120)',],
                        borderWidth: 1,
                    }
                ]
        },

        options: {
            indexAxis: 'y',
        }

    });
}

