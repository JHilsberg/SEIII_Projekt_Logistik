/**
 * Created by robert on 16.12.14.
 */
function openDataBaseSuccessEN(){
    bootbox.dialog({
        message: "Your data were stored successfully",
        title: "Insert complete",
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

function openDataBaseSuccessDE(){
    bootbox.dialog({
        message: "Ihre Daten wurden gespeichert.",
        title: "Speicherung erfolgreich",
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