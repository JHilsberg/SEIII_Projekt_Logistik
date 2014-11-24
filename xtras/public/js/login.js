/**
 * Created by robert on 04.11.14.
 */

function openLogoutDialog(){
    bootbox.dialog({
        message: "Sie haben sich erfolgreich abgemeldet!",
        title: "Logout",
        buttons: {
            success: {
                label: "OK",
                className: "btn-success",
                callback: function() {

                }
            }
        }
    });

}