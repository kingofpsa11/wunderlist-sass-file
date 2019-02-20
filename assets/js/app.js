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
  $('.addTask-input.chromeless').on("keydown", function (e) {
      if (e.keyCode == 13) {            
          const child = $('.taskItem:first').clone()
          child.removeClass('selected')
          $('.tasks:first').prepend(child)
          child.find('.taskItem-titleWrapper').text($(this).val())
          child.find('.taskItem-duedate').text('')
          $(this).val('')
      }
  });

  //Show hide finish tasks
  $('.groupHeader:last').click(function (e) {
    $('.tasks:last').toggle();
  })

  //Selected task    
  $('.tasks').on('click', '.taskItem', function () {      
    if (!$(this).is('.taskItem.selected')) {
      $('.taskItem.selected').removeClass('selected')
      $(this).addClass('selected')
    }
  });

  //Double task to display detail of task
  $('.tasks').on('dblclick', '.taskItem', function (e) {
    $('#detail').show()
  })

  //Hide detail of task
  $('.detail-close').click(function (e) { 
    e.preventDefault()
    $('#detail').hide()
  });

  //Collapsed nav bar
  $('.toggle-icon').on('click', function () {
    $('.navigation').toggleClass('collapsed');
  });

  $(window).resize(function () {
    if ($(window).innerWidth() <= 1000) {
      $('.navigation').addClass('collapsed')
    } else {
      $('.navigation').removeClass('collapsed')
    }
  });

  //Change right click context
  $('.tasks').on('contextmenu', '.taskItem', function (e) {
    e.preventDefault()
    const contextmenu = $('.context-menu')
    contextmenu.css({"left":e.clientX,"top":e.clientY})
    contextmenu.show()
  });
});