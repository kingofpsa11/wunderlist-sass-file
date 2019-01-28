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
      document.getElementById('lists').classList.toggle('collapsed')
    }
  }
  