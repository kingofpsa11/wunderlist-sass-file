$(document).ready(function () {

  //Load item in inbox
  $.get("tasks.php", {inbox:'inbox'},
    function (data, textStatus, jqXHR) {
      let content = data.split("---")
      $('.tasks:first').html(content[0])
      $('.tasks:last').html(content[2])

      $('[rel="inbox"] .overdue-count').text(content[3])
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
        $('#detail .display-view:first-child').text(data['title'])

        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]
        
        let detail_date = new Date(data['detail_date'])
        let day = days[detail_date.getDay()]
        let month = months[detail_date.getMonth()]
        let date = detail_date.getDate()
        if (data['detail_date'] !== null) {
          $('#detail .detail-date .section-title').contents().first()[0].textContent = "Due on " + day + ", " + month + " " + date  
        }
        if (detail_date.toDateString() < new Date().toDateString()) {
          $('#detail .detail-date').addClass("overdue")
        }

        let reminder_date = new Date(data['detail_reminder_date'])
        month = months[reminder_date.getMonth()]
        let hour = reminder_date.getHours()
        let minute = reminder_date.getMinutes()
        day = days[reminder_date.getDay()]
        date = reminder_date.getDate()
        if (data['detail_reminder_date'] !== null) {
          $('#detail .detail-reminder .section-title').text("Remind me at " + hour + ":" + minute)
        $('#detail .detail-reminder .section-description').text(day + ", " + month + " "  + date)
        }
        if (reminder_date.getTime() < new Date().getTime()) {
          $('#detail .detail-reminder').addClass("overdue")
        }
      },
      "json"
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

    //Check completed tasks
    const taskItem = $(this)
    contextmenu.on('click', '.context-menu-item:first',function (e) {
      taskItem.appendTo($('.tasks:last'))
      taskItem.addClass("done")
      taskItem.find('.taskItem-checkboxWrapper').remove()
      $('.tasks:last .taskItem-checkboxWrapper:first').clone().prependTo(taskItem.children('.taskItem-body'))

      let id = taskItem.attr("rel")
      $.post("tasks.php", {rel_id_done:id})
    });
  });
  $(window).on('click', function () {    
    const contextmenu = $('.context-menu')
    contextmenu.hide()
  });

  //Click on context menu
  $('.context-menu').on('click', '.context-menu-item:first', function (e) { 
    e.preventDefault()

  });

  //Check completed tasks
  $('.tasks:first').on("click", '.taskItem-checkboxWrapper', function (e) {
    e.preventDefault()
    const taskItem = $(this).parents('.taskItem')    
    taskItem.appendTo($('.tasks:last'))
    taskItem.addClass("done")
    taskItem.find('.taskItem-checkboxWrapper').remove()
    $('.tasks:last .taskItem-checkboxWrapper:first').clone().prependTo(taskItem.children('.taskItem-body'))

    let id = taskItem.attr("rel")
    $.post("tasks.php", {rel_id_done:id})
  });

  

  $('.tasks:last').on("click", '.taskItem-checkboxWrapper', function (e) {
    e.stopPropagation()
    const taskItem = $(this).parents('.taskItem')
    taskItem.appendTo($('.tasks:first'))
    taskItem.removeClass("done")
    taskItem.find('.taskItem-checkboxWrapper').remove()
    $('.tasks:first .taskItem-checkboxWrapper:first').clone().prependTo(taskItem.children('.taskItem-body'))

    let id = taskItem.attr("rel")
    $.post("tasks.php", {rel_id_doing:id});
  })

});