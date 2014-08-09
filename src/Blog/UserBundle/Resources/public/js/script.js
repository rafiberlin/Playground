/**
 * Created by rafiberlin on 06.08.14.
 */

function performAjaxVerification(username) {
    var spanId = "performAjaxVerification";
    var hideError = function () {
        $("#" + spanId).delay(1000).fadeOut("slow", function () {
            $(this).remove();
        });
    };
    if (username) {
        var url = "/app_dev.php/user/ajax/" + username;
        $.getJSON(url, function (data) {
            //data contains the folowing JSON: {available:true|false}
            if (!data.available) {
                var errorMsg = "<span id='" + spanId + "'>Username not available</span>";
                $("input#UserCreation_login").after(errorMsg);
                hideError();
            }
            ;
        });
    };
};
var checkUsername = function () {
    $("input#UserCreation_login").focusout(function () {
        performAjaxVerification($(this).val());
    });
};
$(checkUsername());