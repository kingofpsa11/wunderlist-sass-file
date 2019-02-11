window.onload = function () {
    // Modal
    var modal = document.getElementById('modal')
    var accountSettings = document.getElementById('account-settings')
    accountSettings.addEventListener('click', displayModal)
    function displayModal () {
      modal.style.display = 'block'
    }
    var doneBtn = document.getElementsByClassName('close')[0]
  
    doneBtn.addEventListener('click', hideModal)
    function hideModal () {
      modal.style.display = 'none'
    }
  
    // User settings
    var user = document.getElementsByClassName('user')[0]
  
    user.addEventListener('click', dropdownArrow)
    function dropdownArrow () {
      document.getElementById('user-popover').classList.toggle('show')
    }
  
    document.onclick = function (event) {
      if (!event.target.matches('.user, .user-name,.svg,.avatar img')) {
        var dropdowns = document.getElementById('user-popover')
        if (dropdowns.classList.contains('show')) {
          dropdowns.classList.remove('show')
        }
      }
      var modalWrapper = document.getElementsByClassName('dialog-wrapper')[0]
      if (event.target === modalWrapper) {
        modal.style.display = 'none'
      }
    }
  
    // More settings
    var moreBtn = document.getElementsByClassName('last-tab')[0]
    moreBtn.addEventListener('click', moreList)
    function moreList () {
      var actionBar = document.getElementsByClassName('actionBar-top')[0]
      actionBar.classList.toggle('show')
    }
  
    // Task Item click change color
    let listTask = document.getElementsByClassName('taskItem')
    for(let index = 0; index < listTask.length; index++) {
      const el = listTask[index]
      el.addEventListener('click', blueTask)
      function blueTask() {
        const selectedItem = document.querySelector('.taskItem.selected')
        if(typeof selectedItem != 'undefined' && selectedItem !== null) {
          if (selectedItem !== this) {
            selectedItem.classList.remove('selected')
            this.classList.add('selected')
          }
        } else {
          this.classList.add('selected')
        }        
      }
      el.addEventListener('dblclick', displayTask)
    }

    // Task Item Double click
    function displayTask () {
      document.getElementById('detail').style.width = '367px'
    }
  
    window.addEventListener('click', hiddenDetail)
    function hiddenDetail (e) {
      if (!e.target.parentNode.classList.contains('taskItem') && !e.target.parentNode.parentNode.classList.contains('taskItem')) {
        e.target.parentNode.classList.remove('selected')
        document.getElementById('detail').style.width = '0px'
      }
    }
  
    // Collapsed Navigation
    document.getElementsByClassName('toggle-icon')[0].addEventListener('click', toggleNav)
    function toggleNav () {
      console.log(document.getElementById('lists').classList)
      document.getElementById('lists').classList.toggle('collapsed')
    }

    //Input task
    const inputTask = document.getElementsByClassName('addTask-input')[0]
    const tasks = document.getElementsByClassName('tasks')
    inputTask.addEventListener('keypress', function (e) {
      if (e.keyCode === 13) {        
        const child = tasks[0].firstElementChild.cloneNode(true)
        child.getElementsByClassName('taskItem-titleWrapper')[0].innerHTML = this.value
        this.value = ''
        child.getElementsByClassName('taskItem-duedate')[0].innerHtml = 'Today'
        tasks[0].appendChild(child)
      }      
    })

    //Hidden done task
    const btnShow = document.getElementsByClassName('groupHeader')[1]
    btnShow.addEventListener('click', function () {
      document.querySelectorAll('.task-list ol')[1].classList.toggle('hidden')
    })

    //Check task
    const chb = document.getElementsByClassName('taskItem-checkboxWrapper')
    for (let i = 0; i < chb.length; i++) {
      const element = chb[i];
      element.addEventListener('click', function() {
        const moveTask = this.parentNode.parentNode
        const listTaskInbox = document.querySelectorAll('.task-list ol')[0]
        const listTaskDone = document.querySelectorAll('.task-list ol')[1]
        listTaskInbox.removeChild(moveTask)
        moveTask.classList.add('done')
        moveTask.classList.remove('selected')
        listTaskDone.appendChild(moveTask)        
        // var parent = moveTask.parentNode;
        // console.log(Array.prototype.indexOf.call(parent.children, moveTask))
        // console.log(Array.from(moveTask.parentNode.children).indexOf(moveTask))
      })      
    }
    //Check task
    // const checkboxs = document.getElementsByClassName('taskItem-checkboxWrapper')
    // for (let index = 0; index < checkboxs.length; index++) {
    //   const element = checkboxs[index]
    //   element.addEventListener('click', function () {
    //     parent = element.parentNode.parentNode
    //     parent.parentNode.removeChild(parent);
    //   })
    // }
    
  }