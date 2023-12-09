$(document).ready(function() {
    $(".errorMsg").hide();
    $("#ip").hide();
    $.get("get_ip.php", function(data, status) {
        if (data.startsWith("premiumrequired")) {
            window.location.replace("https://infotoast.org/tools/");
        } else if (data.startsWith("dbconn")) {
            let theMessage = "ERROR: Could not connect to database! Please email frank@infotoast.org if you recieve this error.";
            $(".errorMsg").show().text(theMessage);
        } else if (data.startsWith("noresults")) {
            let theMessage = "ERROR: Search received no results.";
            $(".errorMsg").show().text(theMessage);
        } else {
            $("#theIP").text(data);
            $("#ip").attr("value", data);
        }
    });
    $("#copybutton").click(function() {
        let ip = $("#ip");
        ip.show().select();
        navigator.clipboard.writeText(ip.attr("value"));
        ip.hide();
        $("#copybutton").text("Copied!");
        setTimeout(function() {
            $("#copybutton").text("Copy");
        }, 700);
    });
});
