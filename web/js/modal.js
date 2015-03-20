$('#modalButton').click(function (){
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
});

// serialize form, render response and close modal
function submitForm($form) {
    $.post(
        $form.attr("action"), // serialize Yii2 form
        $form.serialize()
    )
        .done(function(result) {
            $form.parent().html(result.message);
            $('#modal').modal('hide');
        })
        .fail(function() {
            console.log("server error");
            $form.replaceWith('<button class="newType">Fail</button>').fadeOut()
        });
    return false;
}
/*

function postForm($form) {
    $.post(
        $form.attr("action"),
        $form.serialize()
    )
        .done(function(result) {
            if (typeof(result) === "string") {
                // form is invalid, html returned
                $form.parent().html(result);
            } else {
                // form is valid and saved, json returned
                if (result.redirect) {
                    window.location = result.redirect; // ok, that's weird, but who cares?..
                };
            }
        })
        .fail(function() {
            console.log("server error");
        });
    return false;
}*/
