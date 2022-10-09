
function dowloadClick(){
    const doc = new jsPDF();
    doc.fromHTML(document.getElementById('content'),10, 10)
    doc.save('test.pdf')
}

function printClick(){
    const doc = new jsPDF();
    doc.fromHTML(document.getElementById('content'),10, 10)
    doc.autoPrint();
    doc.output('dataurlnewwindow');
}