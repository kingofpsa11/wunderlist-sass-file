$(document).ready(function () {

  //Load item in inbox
  $.get("tasks.php", {inbox:'inbox'},
    function (data, textStatus, jqXHR) {
      let content = data.split("---")
      $('.tasks:first').html(content[0])
      $('[rel="inbox"] .overdue-count').text(content[3])
      $('.tasks:last').html(content[2])
      $('[rel="inbox"] .count').text(content[1])
    },
    "html"
  );

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
        $.post("tasks.php", {task:$(this).val()});
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
    const detail = $('#detail')
    const detail_date = detail.find('.detail-date .section-title')
    let id = $(this).attr("rel")
    $.get("tasks.php", {id:id},
      function (data, textStatus, jqXHR) {
        // detail_date.text(data)
        console.log(data)
      },
      "text"
    );
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
  $(window).on('click', function () {    
    const contextmenu = $('.context-menu')
    contextmenu.hide()
  });

  //Check completed tasks
  $('.tasks:first').on("click", '.taskItem-checkboxWrapper', function (e) {
    e.stopPropagation()
    const taskItem = $(this).parents('.taskItem')    
    taskItem.appendTo($('.tasks:last'))
    taskItem.addClass("done")
    taskItem.find('.taskItem-checkboxWrapper').remove()
    $('.tasks:last .taskItem-checkboxWrapper:first').clone().prependTo(taskItem.children('.taskItem-body'))
  });

  $('.tasks:last').on("click", '.taskItem-checkboxWrapper', function (e) {
    e.stopPropagation()
    const taskItem = $(this).parents('.taskItem')
    taskItem.appendTo($('.tasks:first'))
    taskItem.removeClass("done")
    taskItem.find('.taskItem-checkboxWrapper').remove()
    $('.tasks:first .taskItem-checkboxWrapper:first').clone().prependTo(taskItem.children('.taskItem-body'))
  })

});