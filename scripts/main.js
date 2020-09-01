$(window).ready(function (){
    
    $.datetimepicker.setLocale('en');
    $('.datetime').datetimepicker({
        format: 'Y-m-d H:i',
        dayOfWeekStart : 1,
        startDate: '2020-01-01',
        defaultDate: '2020-01-01'
    });
    
    $('.date').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        formatDate: 'Y-m-d',
        defaultDate: '2020-01-01'
    });
   
    
});

function showConfirmDialog(module, removeId) {
    var r = confirm("Are you sure you want to cancel appointment?");
    if (r === true) {
        window.location.replace("index.php?module=" + module + "&action=delete&id=" + removeId);
    }
}

function showErrorDialog() {
    var r = confirm("Only one appointment at a time! Finish the previous appointment to start new!");
    
}

