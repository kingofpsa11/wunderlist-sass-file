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
      console.log(actionBar.classList.toggle('show'))
    }
  
    // Task Item Double click
    document.getElementsByClassName('tasks')[0].addEventListener('dblclick', displayTask)
    function displayTask (e) {
      var taskitems = document.getElementsByClassName('taskItem')
      // console.log(taskitems);
      for (let index = 0; index < taskitems.length; index++) {
        const element = taskitems[index]
        if (element.classList.contains('selected')) {
          element.classList.remove('selected')
        }
      }
  
      if (e.target.parentNode.classList.contains('taskItem')) {
        e.target.parentNode.classList.add('selected')
        document.getElementById('detail').style.width = '367px'
      } else {
        e.target.parentNode.parentNode.classList.add('selected')
        document.getElementById('detail').style.width = '367px'
      }
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
      document.getElementById('lists').classList.toggle('collapsed')
    }
  }
  