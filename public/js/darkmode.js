if (Mode === 'dark') {
    enableDarkMode();
    $('#toggle').html('<i class="fad fa-lightbulb-on text-2xl"></i>');
    $('#toggle').val('light');
    $('#logo').removeClass('hidden');
}

$('#toggle').click(function(){
    Mode = localStorage.getItem('Mode');
    if($('#toggle').val() == 'dark'){
        $('#toggle').html('<i class="fad fa-lightbulb-on text-2xl"></i>');
        $('#toggle').val('light');
        $('#logo').removeClass('hidden');
        enableDarkMode();
    } else if($('#toggle').val() == 'light') {
        $('#toggle').html('<i class="fad fa-lightbulb-slash text-2xl"></i>');
        $('#toggle').val('dark');
        $('#logo').addClass('hidden');
        console.log('Darkmode Disabled');
        disableDarkMode();
    }
})