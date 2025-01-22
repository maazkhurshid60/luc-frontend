$(document).ready(function () {
    function handleFormSubmission(formSelector) {
        $(formSelector).on('submit', function (e) {
            e.preventDefault();

            $(formSelector + ' .error-message').empty(); // Clear any previous errors
            $(formSelector + ' .success-message').remove(); // Clear success messages

            let formData = {
                name: $(formSelector + ' #nameinput').val(),
                email: $(formSelector + ' #inputEmail4').val(),
                subject: $(formSelector + ' #subjectsInput').val(),
                service: $(formSelector + ' #services').val(),
                phone: $(formSelector + ' #mobile_code').val(),
                message: $(formSelector + ' #textArea').val(),
                type: $(formSelector + ' #formType').val(),
                _token: $(formSelector + ' input[name="_token"]').val()
            };

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.response === 'success') {
                        $(formSelector).append(
                            '<div class="success-message text-success text-center mt-3">' +
                            response.message + '</div>');
                        $(formSelector)[0].reset();
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorList = '<ul>';
                    $.each(errors, function (key, value) {
                        errorList += '<li>' + value[0] + '</li>';
                    });
                    errorList += '</ul>';
                    $(formSelector + ' .error-message').html(errorList);
                }
            });
        });
    }

    handleFormSubmission('#quoteForm');
    handleFormSubmission('#contactForm');
    handleFormSubmission('#projectForm');
});
