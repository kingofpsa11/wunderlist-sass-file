$(document).ready(function () {    
    //Display user settings
    $('.user').click(function (e) { 
        e.preventDefault();
        $('#user-popover').toggle();
    });

    //Display modal
    $('#account-settings').click(function (e) { 
        e.preventDefault();
        $('#modal').show();
        $('#user-popover').hide();
    });

    //Click button Done hide modal
    $('button.full').click(function (e) { 
        e.preventDefault();
        $('#modal').hide();
    });

    //Display more tab
    $('.tab.last-tab').click(function (e) { 
        e.preventDefault();        
        $('.actionBar-top').toggleClass('show');
    });

    //Add more task
    $('.addTask-input.chromeless').keydown(function (e) {
        if (e.keyCode == 13) {            
            $('.taskItem').first().clone().appendTo($('.tasks').first());
            $(this).val('')
        }
    });
});