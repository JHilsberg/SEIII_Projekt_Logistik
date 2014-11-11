/**
 * Created by robert on 04.11.14.
 */

function openLoginDialog(){
    bootbox.dialog({
        message: "<p><?php echo echo Form::text('username'); ?></p>",
        title: "Login",
        buttons: {
            success: {
                label: "Login",
                className: "btn-success",
                callback: function() {

                }
            },
            main: {
                label: "Cancel",
                className: "btn-primary",
                callback: function() {

                }
            }
        }
    });
}