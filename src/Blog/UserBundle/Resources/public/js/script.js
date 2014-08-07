/**
 * Created by rlatif on 06.08.14.
 */

function performAjaxVerification(username) {
    var url = "/app_dev.php/user/ajax/" + username;
    $.getJSON(url).done(function (json) {
        if (!json.available) {
            var msg = "Username is not available";
            alert(msg);
        }
    });

}
var checkUsername = function () {
    $("input#UserCreation_login").focusout(function () {
        performAjaxVerification($(this).val());
    });
};
$(checkUsername());