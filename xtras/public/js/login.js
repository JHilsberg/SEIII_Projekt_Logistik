/**
 * Created by robert on 04.11.14.
 */

function openLogoutDialogEN(){
    bootbox.dialog({
        message: "You have been successfully logged out.",
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

function openLogoutDialogDE(){
    bootbox.dialog({
        message: "Sie haben sich erfolgreich abgemeldet!",
        title: "Abmeldung",
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