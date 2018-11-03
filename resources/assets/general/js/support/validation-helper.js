$(document).ready(function () {
    $('[data-format-phone="us"]').mask('(000) 000-0000');
    $('[data-toggle="tooltip"]').tooltip();
    $('input[data-type-check="url"]').on('change, keyup', function () {
        let $_this = $(this);
        if (!isValidURL($_this.val())){
            $_this.closest('.form-group').addClass("has-error");
            $_this.closest('.form-group').find(".form-control").addClass("is-invalid");
            $('[data-field="website"]').html('The Business Website is invalid format.');
            $('#update-info-company').attr('disabled', 'disabled');
        }
        else {
            $_this.closest('.form-group').removeClass("has-error");
            $_this.closest('.form-group').find(".form-control").removeClass("is-invalid");
            $('[data-field="website"]').empty();
            $('#update-info-company').attr('disabled', false);
        }
    });
});

window.isValidURL = function(string) {
    let res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    if (res == null)
        return false;
    else
        return true;
};