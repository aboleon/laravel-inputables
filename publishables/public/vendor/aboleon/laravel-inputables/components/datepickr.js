// data-config="enableTime=true,noCalendar=true,dateFormat=d/m/H H:i,minDate=today"
function setDatepicker() {
    let datepickers = document.querySelectorAll('.datepicker');
    if (datepickers.length > 0) {
        datepickers.forEach(function (picker) {
            if (!picker.classList.contains('flatpickr-input')) {
                const config = {
                    dateFormat: 'd/m/Y',
                    time_24hr: true
                };

                if (!picker.id) {
                    picker.id = 'dtpck-' + (Math.random().toString(36).substring(7));
                }

                let custom_config = picker.getAttribute('data-config');
                if (custom_config && custom_config.length) {
                    custom_config = custom_config.split(',');
                    custom_config.forEach(function (item) {
                        const values = item.split('=');
                        let setValue;
                        switch (values[1]) {
                            case 'true':
                            case '1':
                                setValue = true;
                                break;
                            case 'false':
                            case '0':
                                setValue = false;
                                break;
                            default:
                                setValue = values[1];
                        }
                        config[values[0]] = setValue;
                    });
                }
                new Flatpickr(picker, config); // Assuming Flatpickr is available
            }
        });
    }
}
setTimeout(function () {
    setDatepicker();
}, 500);