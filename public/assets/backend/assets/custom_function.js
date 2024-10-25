function toastError(message,time=3000) {
	$.toast({
                  heading: 'Error',
                  text: message,
                  position: 'top-right',
                  loaderBg: '#ff6849',
                  icon: 'error',
                  hideAfter: time
   });
}
function toastInfo(message = 'No Info',time = 3000) {
	
        $.toast({
            heading: 'Info',
            text:message,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: time,
            stack: 6
    });
}