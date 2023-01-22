function loadPDF() {
    if ($('#firstdate').val() && $('#firstdate').val() != "" && $('#lastdate').val() && $('#lastdate').val() != "") {
        let path = `./service/PDF/template/budget.php?startDate=${$('#firstdate').val() && $('#firstdate').val() != "" ? $('#firstdate').val() : ""}&endDate=${$('#lastdate').val() && $('#lastdate').val() != "" ? $('#lastdate').val() : ""}&summary=1000000&debt=250000`
        window.location = path
    }
}