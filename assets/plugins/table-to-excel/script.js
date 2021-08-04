function excelExport() {
    TableToExcel.convert(document.getElementById("myTable"), {
        name: "table1.xlsx",
        sheet: {
            name: "Sheet 1"
        }
    });
}