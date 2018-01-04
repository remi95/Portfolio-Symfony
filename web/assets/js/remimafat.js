function readURL(input, target){
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            target.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(document).ready(function(){

    $(".button-collapse").sideNav();
    $('ul.tabs').tabs({
        'swipeable': true
    });

    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        }
    );


    $("#fos_user_profile_form_avatar_file").change(function(){
        var target = $("#avatar-preview");
        readURL(this, target);
    });
});