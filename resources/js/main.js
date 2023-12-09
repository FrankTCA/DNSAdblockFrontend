$(document).ready(function() {
    $(".errorMsg").hide();
    $("#ip").hide();
    $.get("get_ip.php", function(data, status) {
        if (status !== 200) {
            if (data.startsWith("premiumrequired")) {
                window.location.replace("https://infotoast.org/tools/");
            } else if (data.startsWith("dbconn")) {
                let theMessage = "ERROR: Could not connect to database! Please email frank@infotoast.org if you recieve this error.";
                $(".errorMsg").show().text(theMessage);
            } else if (data.startsWith("noresults")) {
                let theMessage = "ERROR: Search received no results.";
                $(".errorMsg").show().text(theMessage);
            }
        } else {
            $("#theIP").text(data);
            $("#ip").val(data);
        }
    });
    $("#copybutton").click(function() {
        let ip = $("#ip");
        ip.show().select().setSelectionRange(0, 99999);
        navigator.clipboard.writeText(ip.val());
        ip.hide();
        $("#copybutton").text("Copied!");
        setTimeout(function() {
            $("#copybutton").text("Copy");
        }, 700);
    });
});
