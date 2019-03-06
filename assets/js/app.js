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
        $('form[name="frmTask"]').submit()
      }
  });

  //Show hide finish tasks
  $('.groupHeader:last').click(function (e) {
    $('.tasks:last').toggle();
  })

  //Check completed tasks
  $('.tasks').on("click", '.taskItem-checkboxWrapper', function (e) {    
    e.stopPropagation()
    // console.log($(this).find('form'))
    $(this).find('form').submit()
  });

  //Selected task    
  $('.tasks').one('click', '.taskItem', function () {      
    // if (!$(this).is('.taskItem.selected')) {
    //   $('.taskItem.selected').removeClass('selected')
    //   $(this).addClass('selected')
    // }
    $(this).find('form').submit()
  });
  
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

  //Click active sidebarItem
  $('.lists-scroll').on('click', '.sidebarItem',function () {
    if (!$(this).is('.sidebarItem.active')) {
      $('.sidebarItem.active').removeClass('active')
      $(this).addClass('active')
    }
  });

  //Date picker detail_date
  $('.detail-date').on('click', function () {
    $('.detail-date-input').datepicker({
      showButtonPanel: true,
      onSelect: function () {
        let detail_date = $(this).datepicker("getDate")
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]
        
        let detail_date_el = $('#detail .detail-date')
        let day = days[detail_date.getDay()]
        let month = months[detail_date.getMonth()]
        let date = detail_date.getDate()
        
        $('#detail .detail-date .section-title').contents().first()[0].textContent = "Due on " + day + ", " + month + " " + date
        detail_date_el.addClass("date")

        let now = new Date()
        if (detail_date.getFullYear() < now.getFullYear()) {
          detail_date_el.addClass("overdue")
        } else if (detail_date.getFullYear() == now.getFullYear()) {
          if (detail_date.getMonth() < now.getMonth()) {
            detail_date_el.addClass("overdue")
          } else if (detail_date.getMonth() == now.getMonth()) {
            if (detail_date.getDate() < now.getDate()) {
              detail_date_el.addClass("overdue")
            } else {
              detail_date_el.removeClass("overdue")
              if (detail_date.getDate() == now.getDate()) {
                $('#detail .detail-date .section-title').contents().first()[0].textContent = "Due Today"
              }
            }
          } else {
            detail_date_el.removeClass("overdue")
          }
        } else {
          detail_date_el.removeClass("overdue")
        }
        
       }
    });
    $('.detail-date-input').show().focus().hide();
  });

});