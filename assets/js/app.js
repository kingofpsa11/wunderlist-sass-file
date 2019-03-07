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
        let detail_date = $(this).datepicker("getDate").getTime()/1000
        $('input[name="duedate"]').attr("value",detail_date)
        $('form[name="frmDueDate"').submit()
      }
    })
    $('.detail-date-input').show().focus().hide()
  });

  function convertDate(timestamp) {
    timestamp = new Date(timestamp*1000)
    let dateString
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]
    
    let day = days[timestamp.getDay()]
    let month = months[timestamp.getMonth()]
    let date = timestamp.getDate()

    dateString = day + ', ' + month + ' ' + date
    return dateString;
  }

  let detail_date = $('#detail .detail-date .section-title').text()
  let dateString = convertDate(detail_date)  
  $('#detail .detail-date .section-title').text("Due on " + dateString)

  function convertDateToVn(timestamp) {
    timestamp = new Date(timestamp*1000)
    let dateString
    let date = timestamp.getDate()
    let month = timestamp.getMonth() + 1
    let year = timestamp.getFullYear()

    dateString = ("0" + date).slice(-2)   + '.' + ("0" + month).slice(-2) + '.' + year
    return dateString
  }

  $('.taskItem-duedate').each(function () {
    let date = $(this).text()
    date = convertDateToVn(date)
    $(this).text(date)
  })
  
  // if (detail_date.getFullYear() < now.getFullYear()) {
  //   detail_date_el.addClass("overdue")
  // } else if (detail_date.getFullYear() == now.getFullYear()) {
  //   if (detail_date.getMonth() < now.getMonth()) {
  //     detail_date_el.addClass("overdue")
  //   } else if (detail_date.getMonth() == now.getMonth()) {
  //     if (detail_date.getDate() < now.getDate()) {
  //       detail_date_el.addClass("overdue")
  //     } else {
  //       detail_date_el.removeClass("overdue")
  //       if (detail_date.getDate() == now.getDate()) {
  //         $('#detail .detail-date .section-title').contents().first()[0].textContent = "Due Today"
  //       }
  //     }
  //   } else {
  //     detail_date_el.removeClass("overdue")
  //   }
  // } else {
  //   detail_date_el.removeClass("overdue")
  // }
  
  
  //Click to logout
  $('.logout').on('click', function (e) {
    document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    window.location.href = "http://localhost/wunderlist-sass-file/login.php"
  })
});