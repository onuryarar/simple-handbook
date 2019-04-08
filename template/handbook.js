$(document).ready(function (event) {
    $("#bookList tr").click(function (event) {
        var index = event.currentTarget.rowIndex
        if (index > 0) {
            var bufferVal = "";
            event.currentTarget.childNodes.forEach(value => {
                $("#formExp").each(function () {
                    $(this).find(":input#" + value.id).val(value.innerHTML)
                    if (bufferVal === "")
                        bufferVal += event.currentTarget.rowIndex + ",";

                    bufferVal += value.innerHTML
                    if (value.id != "address")
                        bufferVal += ",";
                })
            })
            $("#formExp #buffer").val(bufferVal)
        }
    });
})