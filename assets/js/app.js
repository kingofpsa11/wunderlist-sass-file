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
        // $('form[name="frmTask"]').submit()
        let listId = $('.sidebarItem.active').attr("rel")
        let title = $(this).val()
        let taskItem = $('ol.tasks:first .taskItem:first').clone();
        $(this).val('')

        $.post("Request.php", {addTask: title, listId: listId},
          function (data) {
            taskItem.find('.taskItem-titleWrapper').text(title)
            taskItem.find('.taskItem-duedate').text('')
            console.log(taskItem.find('.taskItem-duedate').text(''))
            taskItem.attr("rel",data)
            $('ol.tasks:first').append(taskItem)
          },
          "text"
        )

      }
  });

  //Show hide finished tasks
  $('.groupHeader:last').click(function (e) {
    $('.tasks:last').toggle();
  })

  //Check completed tasks
  $('.tasks').on("click", '.taskItem-checkboxWrapper', function (e) {
    e.stopPropagation()
    let taskItem = $(this).parents('.taskItem')
    let id = taskItem.attr('rel')
    let status = taskItem.hasClass('done') ? 0 : 1
    $.post("Request.php", {checkTask: id, status: status},
      function (data) {
        if (taskItem.hasClass("done")) {
          taskItem.removeClass("done")
          taskItem.find('.taskItem-checkboxWrapper').replaceWith(data)
          taskItem.appendTo($('ol:first'))
        } else {
          taskItem.addClass("done")
          taskItem.find('.taskItem-checkboxWrapper').replaceWith(data)
          taskItem.appendTo($('ol:last'))
        }
      },
      "html"
    );
  });

  //Selected task    
  $('.tasks').on('click', '.taskItem', function () {
    let id = $(this).attr('rel')

    if (!$(this).hasClass('selected')) {
      $('.selected').removeClass('selected')
      $(this).addClass('selected')

    $.get("Request.php", {taskId:id},
      function (data) {
        
        //duedate
        convertDate(data['due_date'])

        //reminder date
        $('.detail-reminder .section-title').text(data['reminder_date'])
        
        //subtasks
        const ul = $('.subtasks ul')
        ul.html('')
        if (data['sub_tasks'].length > 0) {
          let subtasks = data['sub_tasks']
          $.get("Request.php", {li:''},
            function (data) {
              const liItem = $(data)
              for (let index = 0; index < subtasks.length; index++) {
                const subtask = subtasks[index]
                let el = liItem.clone()
                el.find('.display-view span').text(subtask[0])
                if (subtask[1] == 0) {
                  el.addClass("done")
                  el.find('.checkBox').addClass('checked')
                }
                ul.append(el)
              }
            },
            "text"
          )
        }
      },
      "json"
    );
    }
  });

  $('.tasks').on('dblclick', '.taskItem',function () {
    $('#detail').show()
  });
  
  //Display progress bar
  if ($('.taskItem').hasClass("selected")) {
    let count = $('.subtasks li').length
    let countDone = $('.subtasks li').has('.checked').length
    let width = countDone/count * 100 + "%"
    $('.taskItem.selected').find('.taskItem-progress-bar').css("width", width)
  }

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
  $('.tasks').one('contextmenu', '.taskItem', function (e) {
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
        let taskItem_id = $('.selected').attr("rel")
        $.post("Request.php", {detail_date_id: taskItem_id, detail_date: detail_date},
          function () {
            convertDate(detail_date)
            $('.selected .taskItem-duedate').text(convertDateToVn(detail_date))
          }
        );
      }
    })
    $('.detail-date-input').show().focus().hide()
  });

  //Display date in taskItem
  $('.taskItem').each(function() {
    let duedate = $(this).find('.taskItem-duedate').text()
    if (duedate != '') {
      duedate = convertDateToVn(duedate)
    $(this).find('.taskItem-duedate').text(duedate)  
    }
  })

  function convertDate(timestamp) {
    if (timestamp != null) {
      timestamp = new Date(timestamp*1000)
      let dateString
      let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      let days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]
      
      let day = days[timestamp.getDay()]
      let month = months[timestamp.getMonth()]
      let date = timestamp.getDate()

      dateString = day + ', ' + month + ' ' + date
      $('#detail .detail-date .section-title').text("Due on " + dateString)
    } else {
      $('#detail .detail-date .section-title').text("Set due date")
    }
  }

  // let detail_date = $('#detail .detail-date .section-title').text()
  // console.log(detail_date)
  // if (detail_date != '') {
  //   let dateString = convertDate(detail_date)
  //   $('#detail .detail-date .section-title').text("Due on " + dateString) 
  // }

  function convertDateToVn(timestamp) {
    timestamp = new Date(timestamp*1000)
    let dateString
    let date = timestamp.getDate()
    let month = timestamp.getMonth() + 1
    let year = timestamp.getFullYear()

    dateString = ("0" + date).slice(-2)   + '.' + ("0" + month).slice(-2) + '.' + year
    return dateString;
  }
  
  function changeLanguage(lang) {
    $.post("Request.php", {lang:lang},
      function (data) {
        let setting = $('#settings .tabs ul')
        setting.find("[rel='general'] .tab-label").text(data["general"])
        setting.find("[rel='account'] .tab-label").text(data["account"])
        setting.find("[rel='shortcuts'] .tab-label").text(data["shortcuts"])
        setting.find("[rel='smart_lists'] .tab-label").text(data["smart_lists"])
        setting.find("[rel='notification'] .tab-label").text(data["notification"])
        setting.find("[rel='about'] .tab-label").text(data["about"])
      },
      "json"
    );
  }
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
  
  //Add a subtask
  $('.section-item.subtask-add .section-content').on("click", function () {
    $(this).children('.section-title').addClass('hidden');
    $(this).children('.section-edit').removeClass('hidden');
    $(this).find('textarea').focus();
  })
  
  //Edit a subtask
  $('.subtasks ul').on('click', '.subtask .section-content',function () {
    $(this).find('.display-view').addClass('hidden')
    $(this).find('.edit-view').removeClass('hidden')
    let value = $(this).find('.display-view span').text()
    $(this).find('pre').text(value)
    $(this).find('textarea').val(value)
    $(this).find('textarea').focus()
  })

  $('.subtasks ul').on("focusout", "textarea", function () {
    $(this).parents('.content-fakable').children('.display-view').removeClass('hidden')
    $(this).parents('.content-fakable').children('.edit-view').addClass('hidden')
  })  

  //addSubTask - Save a subtask by press Enter
  $('.subtasks textarea').on("keypress", function (e) {
    if (e.keyCode == 13) {
      let taskItem_id = $('.selected').attr('rel')
      let subtaskTitle = $(this).val()
      let ul = $(this).parents('.subtasks').children('ul')
      if ($(this).val() != '') {
        $.post("Request.php", {id: taskItem_id, addSubTask: subtaskTitle},
          function (data) {
            data = $(data)
            data.find('.display-view span').text(subtaskTitle)
            ul.append(data)
          },
          "html"
        );
        $(this).val('')
      } else {
        $(this).val($(this).html())
        $(this).trigger("focusout");
      }
    }
  })

  //Check complete subtask
  $('.subtasks').on("click", '.checkBox',function () {
    let taskId = $('.selected').attr("rel")
    let title = $(this).parent(".subtask").find("display-view").text()
    let checkBox = $(this)
    $.post("Request.php", {changeStatusSubtask: taskId, subtaskTitle: title},
      function () {
        checkBox.toggleClass("checked")
        checkBox.parents('.subtask').toggleClass("done")
      }
    );
  });

  //Click to logout
  $('.logout').on('click', function (e) {
    document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    window.location.href = "http://localhost/wunderlist-sass-file/login.php"
  })

  //change language
  $('#edit-language').on("change", function () {
    changeLanguage($('#edit-language').val())
  })
  changeLanguage($('#edit-language').val())

});