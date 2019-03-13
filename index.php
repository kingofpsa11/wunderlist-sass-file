<?php
session_start();

include 'Request.php';

// $_SESSION['tasks'] = [[
//     'id' => 1,
//     'title' => 'Task1',
//     'duedate' => 1553014800,
//     'reminder_date' => '2019-02-26 12:10:00',
//     'status' => 1,
//     'list_id' => 1,
//     'subtasks' => []
// ],
// [
//     'id' => 2,
//     'title' => 'Task2',
//     'duedate' => 1553014800,
//     'reminder_date' => '2019-02-20 11:10:00',
//     'status' => 1,
//     'list_id' => 2,
//     'subtasks' => []
// ],
// [
//     'id' => 3,
//     'title' => 'Task3',
//     'duedate' => 1553014800,
//     'reminder_date' => '2019-02-27 09:10:00',
//     'status' => 1,
//     'list_id' => 1,
//     'subtasks' => []
// ],
// [
//     'id' => 4,
//     'title' => 'Task4',
//     'duedate' => 1553014800,
//     'reminder_date' => '2019-02-28 08:10:00',
//     'status' => 0,
//     'list_id' => 1,
//     'subtasks' => []
// ],
// [
//     'id' => 5,
//     'title' => 'Task5',
//     'duedate' => 1553014800,
//     'reminder_date' => '2019-01-28 07:10:00',
//     'status' => 0,
//     'list_id' => 0,
//     'subtasks' => []
// ]];
// $_SESSION['lists'] = [
//     [
//         'id' => 1,
//         'title' => 'inbox',
//     ],
//     [
//         'id' => 2,
//         'title' => 'list'
//     ]
// ];
// print_r($_SESSION);

if (!isset($_COOKIE['email']) && !isset($_COOKIE['password'])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This - Wunderlist</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>    
    <script src="assets/js/app.js"></script>
    

</head> 
<body class="wlapp-parent chrome animate platform-windows application-main background-06 focus-browser">
    <ul class="context-menu">
        <li class="context-menu-item menuItem" title="Mark as Completed">
            <span class="context-menu-icon">
                <svg class="completed" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="completed"> <path d="M7.48412073,16.9975 C7.36412073,16.9975 7.24412073,16.9375 7.14412073,16.8575 C5.66412073,15.3575 4.00412073,14.0375 2.24412073,12.9175 C2.00412073,12.7775 1.92412073,12.4575 2.08412073,12.2375 C2.22412073,11.9975 2.54412073,11.9375 2.76412073,12.0775 C4.42412073,13.1175 5.98412073,14.3375 7.38412073,15.6975 C10.3441207,10.8175 13.3841207,6.9175 17.1441207,3.1375 C17.3441207,2.9575 17.6641207,2.9575 17.8641207,3.1375 C18.0441207,3.3375 18.0441207,3.6575 17.8641207,3.8575 C14.0041207,7.6975 10.9441207,11.6775 7.92412073,16.7575 C7.84412073,16.8775 7.70412073,16.9775 7.56412073,16.9975 L7.48412073,16.9975 Z" id="H"></path> </g> </g> </svg>
            </span>
            <span class="label">Mark as Completed</span>
        </li>
        <li class="context-menu-item menuItem" title="Mark as Starred">
            <span class="context-menu-icon">
                <svg class="star" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="star"> <path d="M4.74,18 C4.64,18 4.54,17.96 4.46,17.9 C4.28,17.76 4.2,17.54 4.28,17.34 L6.16,11.5 L1.2,7.9 C1.04,7.78 0.96,7.56 1.02,7.34 C1.1,7.14 1.28,7 1.5,7 L7.64,7 L9.52,1.16 C9.66,0.76 10.34,0.76 10.48,1.16 L12.38,7 L18.5,7 C18.72,7 18.9,7.14 18.98,7.34 C19.04,7.56 18.96,7.78 18.8,7.9 L13.84,11.5 L15.72,17.34 C15.8,17.54 15.72,17.76 15.54,17.9 C15.38,18.02 15.14,18.02 14.96,17.9 L10,14.3 L5.04,17.9 C4.96,17.96 4.84,18 4.74,18 L4.74,18 Z M10,13.18 C10.1,13.18 10.2,13.2 10.3,13.28 L14.3,16.18 L12.78,11.46 C12.7,11.26 12.78,11.04 12.96,10.92 L16.96,8 L12,8 C11.8,8 11.6,7.86 11.54,7.66 L10,2.94 L8.46,7.66 C8.4,7.86 8.22,8 8,8 L3.04,8 L7.04,10.92 C7.22,11.04 7.3,11.26 7.22,11.46 L5.7,16.18 L9.7,13.28 C9.8,13.2 9.9,13.18 10,13.18 L10,13.18 Z"></path> </g> </g> </svg>
            </span>
            <span class="label">Mark as Starred</span>
        </li>
        <li class="context-menu-item menuItem separator">
            <span class="context-menu-icon">
            </span>
            <span class="label"></span>
        </li>
        <li class="context-menu-item menuItem" title="Due Today">
            <span class="context-menu-icon">
                <svg class="today" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="today"> <path d="M2.5,7 C2.22,7 2,6.78 2,6.5 L2,3.5 C2,2.68 2.68,2 3.5,2 L16.5,2 C17.32,2 18,2.68 18,3.5 L18,6.5 C18,6.78 17.78,7 17.5,7 L2.5,7 Z M3,6 L17,6 L17,3.5 C17,3.22 16.78,3 16.5,3 L3.5,3 C3.22,3 3,3.22 3,3.5 L3,6 Z M3.5,18 C2.68,18 2,17.32 2,16.5 L2,8.5 C2,8.22 2.22,8 2.5,8 C2.78,8 3,8.22 3,8.5 L3,16.5 C3,16.78 3.22,17 3.5,17 L16.5,17 C16.78,17 17,16.78 17,16.5 L17,8.5 C17,8.22 17.22,8 17.5,8 C17.78,8 18,8.22 18,8.5 L18,16.5 C18,17.32 17.32,18 16.5,18 L3.5,18 Z" id="E"></path> </g> </g> </svg>
            </span>
            <span class="label">Due Today</span>
        </li>
        <li class="context-menu-item menuItem" title="Due Tomorrow">
            <span class="context-menu-icon">
                <svg class="today" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="today"> <path d="M2.5,7 C2.22,7 2,6.78 2,6.5 L2,3.5 C2,2.68 2.68,2 3.5,2 L16.5,2 C17.32,2 18,2.68 18,3.5 L18,6.5 C18,6.78 17.78,7 17.5,7 L2.5,7 Z M3,6 L17,6 L17,3.5 C17,3.22 16.78,3 16.5,3 L3.5,3 C3.22,3 3,3.22 3,3.5 L3,6 Z M3.5,18 C2.68,18 2,17.32 2,16.5 L2,8.5 C2,8.22 2.22,8 2.5,8 C2.78,8 3,8.22 3,8.5 L3,16.5 C3,16.78 3.22,17 3.5,17 L16.5,17 C16.78,17 17,16.78 17,16.5 L17,8.5 C17,8.22 17.22,8 17.5,8 C17.78,8 18,8.22 18,8.5 L18,16.5 C18,17.32 17.32,18 16.5,18 L3.5,18 Z" id="E"></path> </g> </g> </svg>
            </span>
            <span class="label">Due Tomorrow</span>
        </li>
        <li class="context-menu-item menuItem" title="Remove Due Date">
            <span class="context-menu-icon">
                <svg class="today" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="today"> <path d="M2.5,7 C2.22,7 2,6.78 2,6.5 L2,3.5 C2,2.68 2.68,2 3.5,2 L16.5,2 C17.32,2 18,2.68 18,3.5 L18,6.5 C18,6.78 17.78,7 17.5,7 L2.5,7 Z M3,6 L17,6 L17,3.5 C17,3.22 16.78,3 16.5,3 L3.5,3 C3.22,3 3,3.22 3,3.5 L3,6 Z M3.5,18 C2.68,18 2,17.32 2,16.5 L2,8.5 C2,8.22 2.22,8 2.5,8 C2.78,8 3,8.22 3,8.5 L3,16.5 C3,16.78 3.22,17 3.5,17 L16.5,17 C16.78,17 17,16.78 17,16.5 L17,8.5 C17,8.22 17.22,8 17.5,8 C17.78,8 18,8.22 18,8.5 L18,16.5 C18,17.32 17.32,18 16.5,18 L3.5,18 Z" id="E"></path> </g> </g> </svg>
            </span>
            <span class="label">Remove Due Date</span>
        </li>
        <li class="context-menu-item menuItem separator">
            <span class="context-menu-icon"></span>
            <span class="label"></span>
        </li>
        <li class="context-menu-item menuItem" title="Create a new list from To-do">
            <span class="context-menu-icon">
                <svg class="plus-small" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <path d="M10,10l0,6.5c-0.003,0.053 -0.008,0.103 -0.024,0.155c-0.038,0.116 -0.12,0.217 -0.226,0.278c-0.047,0.027 -0.094,0.042 -0.146,0.056c-0.052,0.008 -0.051,0.008 -0.104,0.011c-0.053,-0.003 -0.103,-0.008 -0.155,-0.024c-0.15,-0.05 -0.271,-0.171 -0.321,-0.321c-0.016,-0.052 -0.021,-0.102 -0.024,-0.155l0,-6.5l-6.5,0c-0.046,-0.002 -0.058,-0.001 -0.104,-0.011c-0.103,-0.022 -0.197,-0.076 -0.268,-0.154c-0.169,-0.188 -0.169,-0.482 0,-0.67c0.035,-0.038 0.077,-0.072 0.122,-0.098c0.078,-0.045 0.161,-0.062 0.25,-0.067l6.5,0l0,-6.5c0.005,-0.089 0.022,-0.172 0.067,-0.25c0.126,-0.219 0.406,-0.31 0.636,-0.207c0.048,0.022 0.093,0.05 0.132,0.085c0.078,0.071 0.132,0.165 0.154,0.268c0.01,0.046 0.009,0.058 0.011,0.104l0,6.5l6.5,0c0.046,0.002 0.058,0.001 0.104,0.011c0.103,0.022 0.197,0.076 0.268,0.154c0.169,0.188 0.169,0.482 0,0.67c-0.035,0.038 -0.077,0.072 -0.122,0.098c-0.078,0.045 -0.161,0.062 -0.25,0.067l-6.5,0Z"></path> </g> </svg>
            </span>
            <span class="label">Create a new list from To-do</span>
        </li>
        <li class="context-menu-item menuItem" title="Move to-do to...">
            <span class="context-menu-icon">
                <svg class="move" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="Page-1" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Move" sketch:type="MSArtboardGroup" stroke-linecap="round"> <path d="M3,14.5 L16,14.5" id="Line" sketch:type="MSShapeGroup"></path> <path d="M3,17.5 L16,17.5" id="Line" sketch:type="MSShapeGroup"></path> <path d="M9.5,2.5 L9.5,11.5" id="Line" sketch:type="MSShapeGroup"></path> <path d="M4.5,6.5 L9.5,11.5" id="Line" sketch:type="MSShapeGroup"></path> <path d="M14.5,6.5 L9.5,11.5" id="Line" sketch:type="MSShapeGroup"></path> </g> </g> </svg>
            </span>
            <span class="label">Move to-do to...</span>
            <span class="chevron"> <svg class="folder-arrow" width="15px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="folder-arrow"> <path d="M13.61,16.8575 C13.79,16.6575 13.79,16.3375 13.61,16.1375 L7.45,9.9975 L13.61,3.8575 C13.79,3.6575 13.79,3.3375 13.61,3.1375 C13.41,2.9575 13.09,2.9575 12.89,3.1375 L6.39,9.6375 C6.21,9.8375 6.21,10.1575 6.39,10.3575 L12.89,16.8575 C12.99,16.9575 13.13,16.9975 13.25,16.9975 C13.37,16.9975 13.51,16.9575 13.61,16.8575 Z" id="w"></path> </g> </g> </svg> </span>
        </li>
        <li class="context-menu-item menuItem" title="Email Selected To-do">
            <span class="context-menu-icon">
                <svg class="email" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="email"> <path d="M4.5,17 C3.12,17 2,15.88 2,14.5 L2,5.5 C2,4.12 3.12,3 4.5,3 L15.5,3 C16.88,3 18,4.12 18,5.5 L18,14.5 C18,15.88 16.88,17 15.5,17 L4.5,17 Z M4.5,4 C3.68,4 3,4.68 3,5.5 L3,14.5 C3,15.32 3.68,16 4.5,16 L15.5,16 C16.32,16 17,15.32 17,14.5 L17,5.5 C17,4.68 16.32,4 15.5,4 L4.5,4 Z M10,11.5 C9.88,11.5 9.74,11.46 9.64,11.36 L4.14,5.86 C3.96,5.66 3.96,5.34 4.14,5.14 C4.34,4.96 4.66,4.96 4.86,5.14 L10,10.3 L15.14,5.14 C15.34,4.96 15.66,4.96 15.86,5.14 C16.04,5.34 16.04,5.66 15.86,5.86 L10.36,11.36 C10.26,11.46 10.12,11.5 10,11.5 L10,11.5 Z" id="X"></path> </g> </g> </svg>
            </span>
            <span class="label">Email Selected To-do</span>
        </li>
        <li class="context-menu-item menuItem" title="Print Selected To-do">
            <span class="context-menu-icon">
                <svg class="print" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g> <path d="M4.5,6 C3.12,6 2,7.12 2,8.5 L2,14.5 C2,14.78 2.22,15 2.5,15 L5,15 L5,17.5 C5,17.78 5.22,18 5.5,18 L14.5,18 C14.78,18 15,17.78 15,17.5 L15,15 L17.5,15 C17.78,15 18,14.78 18,14.5 L18,8.5 C18,7.12 16.88,6 15.5,6 L4.5,6 Z M17,14 L15,14 L15,12 L15.5,12 C15.78,12 16,11.78 16,11.5 C16,11.22 15.78,11 15.5,11 L4.5,11 C4.22,11 4,11.22 4,11.5 C4,11.78 4.22,12 4.5,12 L5,12 L5,14 L3,14 L3,8.5 C3,7.68 3.68,7 4.5,7 L15.5,7 C16.32,7 17,7.68 17,8.5 L17,14 Z M14,12 L14,17 L6,17 L6,12 L14,12 Z" id="Z"></path> <path d="M5.5,5 C5.78,5 6,4.78 6,4.5 L6,3 L14,3 L14,4.5 C14,4.78 14.22,5 14.5,5 C14.78,5 15,4.78 15,4.5 L15,2.5 C15,2.22 14.78,2 14.5,2 L5.5,2 C5.22,2 5,2.22 5,2.5 L5,4.5 C5,4.78 5.22,5 5.5,5 L5.5,5 Z" id="Path"></path> </g> </g> </svg>
            </span>
            <span class="label">Print Selected To-do</span>
        </li>
        <li class="context-menu-item menuItem separator">
            <span class="context-menu-icon"></span>
            <span class="label"></span>
        </li>
        <li class="context-menu-item menuItem"  title="Copy To-do">
            <span class="context-menu-icon">
                <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" sketch:type="MSPage"> <g id="copy" sketch:type="MSArtboardGroup"> <path d="M12.7921708,6.5 L8.647,10.646 C8.451,10.842 8.451,11.158 8.647,11.353 C8.744,11.451 8.872,11.5 9,11.5 C9.128,11.5 9.256,11.451 9.354,11.353 L13.5,7.207 L13.5,10 C13.5,10.276 13.724,10.5 14,10.5 C14.276,10.5 14.5,10.276 14.5,10 L14.5,6.01573317 C14.5041978,5.88263558 14.4555311,5.7480518 14.354,5.646 C14.2519482,5.54446887 14.1173644,5.4958022 13.9841257,5.5 L10,5.5 C9.724,5.5 9.5,5.724 9.5,6 C9.5,6.276 9.724,6.5 10,6.5 L12.7921708,6.5 L12.7921708,6.5 Z M2.5,5.5 C2.224,5.5 2,5.276 2,5 L2,4.5 C2,3.121 3.121,2 4.5,2 L5,2 C5.276,2 5.5,2.224 5.5,2.5 C5.5,2.776 5.276,3 5,3 L4.5,3 C3.673,3 3,3.673 3,4.5 L3,5 C3,5.276 2.776,5.5 2.5,5.5 Z M5,18 L4.5,18 C3.121,18 2,16.879 2,15.5 L2,15 C2,14.724 2.224,14.5 2.5,14.5 C2.776,14.5 3,14.724 3,15 L3,15.5 C3,16.327 3.673,17 4.5,17 L5,17 C5.276,17 5.5,17.224 5.5,17.5 C5.5,17.776 5.276,18 5,18 Z M15.5,18 L15,18 C14.724,18 14.5,17.776 14.5,17.5 C14.5,17.224 14.724,17 15,17 L15.5,17 C16.327,17 17,16.327 17,15.5 L17,15 C17,14.724 17.224,14.5 17.5,14.5 C17.776,14.5 18,14.724 18,15 L18,15.5 C18,16.879 16.879,18 15.5,18 Z M17.5,5.5 C17.224,5.5 17,5.276 17,5 L17,4.5 C17,3.673 16.327,3 15.5,3 L15,3 C14.724,3 14.5,2.776 14.5,2.5 C14.5,2.224 14.724,2 15,2 L15.5,2 C16.879,2 18,3.121 18,4.5 L18,5 C18,5.276 17.776,5.5 17.5,5.5 Z M2.5,12.5 C2.224,12.5 2,12.276 2,12 L2,8 C2,7.724 2.224,7.5 2.5,7.5 C2.776,7.5 3,7.724 3,8 L3,12 C3,12.276 2.776,12.5 2.5,12.5 Z M17.5,12.5 C17.224,12.5 17,12.276 17,12 L17,8 C17,7.724 17.224,7.5 17.5,7.5 C17.776,7.5 18,7.724 18,8 L18,12 C18,12.276 17.776,12.5 17.5,12.5 Z M12,3 L8,3 C7.724,3 7.5,2.776 7.5,2.5 C7.5,2.224 7.724,2 8,2 L12,2 C12.276,2 12.5,2.224 12.5,2.5 C12.5,2.776 12.276,3 12,3 Z M12,18 L8,18 C7.724,18 7.5,17.776 7.5,17.5 C7.5,17.224 7.724,17 8,17 L12,17 C12.276,17 12.5,17.224 12.5,17.5 C12.5,17.776 12.276,18 12,18 Z" id="Copy" sketch:type="MSShapeGroup"></path> </g> </g> </svg>
            </span>
            <span class="label">Copy To-do</span>
        </li>
        <li class="context-menu-item menuItem" title="Delete To-do">
            <span class="context-menu-icon">
            <svg class="trash" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="trash"> <path d="M12,3.5 C12,2.4 11.1,1.5 10,1.5 C8.9,1.5 8,2.4 8,3.5 L5.5,3.5 C4.68,3.5 4,4.18 4,5 L4,7 C4,7.28 4.22,7.5 4.5,7.5 L15.5,7.5 C15.78,7.5 16,7.28 16,7 L16,5 C16,4.18 15.32,3.5 14.5,3.5 L12,3.5 Z M10,2.5 C10.56,2.5 11,2.94 11,3.5 L9,3.5 C9,2.94 9.44,2.5 10,2.5 L10,2.5 Z M15,6.5 L5,6.5 L5,5 C5,4.72 5.22,4.5 5.5,4.5 L14.5,4.5 C14.78,4.5 15,4.72 15,5 L15,6.5 Z M14.5,8.5 C14.22,8.5 14,8.72 14,9 L14,16 C14,16.28 13.78,16.5 13.5,16.5 L6.5,16.5 C6.22,16.5 6,16.28 6,16 L6,9 C6,8.72 5.78,8.5 5.5,8.5 C5.22,8.5 5,8.72 5,9 L5,16 C5,16.82 5.68,17.5 6.5,17.5 L13.5,17.5 C14.32,17.5 15,16.82 15,16 L15,9 C15,8.72 14.78,8.5 14.5,8.5 L14.5,8.5 Z M9,9 C9,8.72 8.78,8.5 8.5,8.5 C8.22,8.5 8,8.72 8,9 L8,15 C8,15.28 8.22,15.5 8.5,15.5 C8.78,15.5 9,15.28 9,15 L9,9 Z M12,9 C12,8.72 11.78,8.5 11.5,8.5 C11.22,8.5 11,8.72 11,9 L11,15 C11,15.28 11.22,15.5 11.5,15.5 C11.78,15.5 12,15.28 12,15 L12,9 Z" id="j"></path> </g> </g> </svg>
            </span>
            <span class="label">Delete To-do</span>
        </li>        
    </ul>
    <div class="main-interface">
        <div id="modal">
            <!-- <ul class="reminders dialog-wrapper"></ul> -->
            <div class="dialog-wrapper">
                <div id="settings" class="dialog preferences show">
                    <div class="content">
                        <div class="tabs">
                            <ul>
                                <li>
                                    <a>
                                        <span class="icon settings-general"></span>
                                        <span class="tab-label">
                                            General
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon settings-account"></span>
                                        <span class="tab-label">
                                            Account
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon settings-shortcuts"></span>
                                        <span class="tab-label">
                                            Shortcuts
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon settings-smart-lists"></span>
                                        <span class="tab-label">
                                            Smart Lists
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon settings-notification"></span>
                                        <span class="tab-label">
                                            Notification
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon settings-about"></span>
                                        <span class="tab-label">
                                            About
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="settings-content-inner-wrapper">
                            <div class="settings-content-inner-general">
                                <div class="separator">
                                    <div class="cols">
                                        <div class="col-60 text-right">Language</div>
                                        <div class="col-40">
                                            <span class="select">
                                                <select id="edit-language" class="tabStart">
                                                    <option value="en">English</option>
                                                    <option value="pt">Portugues(Brazil)</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="col-60 text-right">Date Format</div>
                                        <div class="col-40">
                                            <span class="select">
                                                <select id="edit-date-format" class="tabStart">
                                                    <option value="DD.MM.YYYY" selected="">DD.MM.YYYY</option>
                                                    <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                                                    <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                                                    <option value="YYYY/MM/DD">YYYY/MM/DD</option>
                                                    <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="col-60 text-right">Date Format</div>
                                        <div class="col-40">
                                            <div>
                                                <input type="radio" name="edit-time-format" value="12 hour" id="edit-time-format-12">
                                                <label for="edit-time-format-12" style="font-size:13px;">12 Hours</label>
                                                <input type="radio" name="edit-time-format" value="24 hour" id="edit-time-format-24">
                                                <label for="edit-time-format-24" style="font-size:13px;">24 Hours</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="col-60 text-right">Start of the Week</div>
                                        <div class="col-40">
                                            <span class="select">
                                                <select id="edit-start-of-week" class="tabStart">
                                                    <option value="sat">Saturday</option>
                                                    <option value="sun">Sunday</option>
                                                    <option value="mon">Monday</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator">
                                    <div class="cols">
                                        <div class="col-60 text-right">Enable sound for checking-off a to-do</div>
                                        <div class="col-40">
                                            <div class="checkbox">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="col-60 text-right">Enable sound for checking-off a to-do</div>
                                        <div class="col-40">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="" id="">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator">
                                    <div class="cols">
                                        <div class="col-60 text-right">Add To-dos</div>
                                        <div class="col-40">
                                            <span class="select">
                                                <select id="edit-new-task-location" class="tabStart">
                                                    <option value="top">Top of List</option>
                                                    <option value="bottom">Bottom of List</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="col-60 text-right">Confirm before deleting to-dos</div>
                                        <div class="col-40">
                                            <div class="checkbox">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="col-60 text-right">Star moves to-do to top</div>
                                        <div class="col-40">
                                            <div class="checkbox">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator">
                                    <div class="cols">
                                        <div class="col-60 text-right">Enable smart due dates</div>
                                        <div class="col-40">
                                            <div class="checkbox">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="col-60 text-right">Remove smart due date text in to-dos</div>
                                        <div class="col-40">
                                            <div class="checkbox">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator">
                                    <div class="cols">
                                        <div class="col-60 text-right">Print completed to-dos</div>
                                        <div class="col-40">
                                            <div class="checkbox">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator">
                                    <div class="cols">
                                        <div class="col-60 text-right">Show Subtask progress on to-dos</div>
                                        <div class="col-40">
                                            <div class="checkbox">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                            <div class="col-60 text-right">Enable context menus</div>
                                            <div class="col-40">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="" id="">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-footer">
                        <div class="cols">
                            <div class="col-40"></div>
                            <div class="col-40"></div>
                            <div class="col-20">
                                <button class="full blue close">
                                    Done
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navigation" id="lists">
            <div class="lists-inner">
                <div id="search-toolbar">
                    <a class="toggle-icon">
                        <svg class="list-toggle" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <path d="M0.5,3.5l19,0" style="fill:none;stroke-width:1px;stroke:white;"></path> <path d="M0.5,9.53l19,0" style="fill:none;stroke-width:1px;stroke:white;"></path> <path d="M0.5,15.5l19,0" style="fill:none;stroke-width:1px;stroke:white;"></path> </g> </svg>
                    </a>
                    <div class="search-input-wrapper">
                        <input type="text" class="chromeless search-input">
                    </div>
                    <span class="search-icon-wrapper">
                        <svg class="search rtl-flip" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g> <path d="M8.5025,15 C4.9225,15 2.0025,12.08 2.0025,8.5 C2.0025,4.92 4.9225,2 8.5025,2 C12.0825,2 15.0025,4.92 15.0025,8.5 C15.0025,12.08 12.0825,15 8.5025,15 L8.5025,15 Z M8.5025,3 C5.4625,3 3.0025,5.46 3.0025,8.5 C3.0025,11.54 5.4625,14 8.5025,14 C11.5425,14 14.0025,11.54 14.0025,8.5 C14.0025,5.46 11.5425,3 8.5025,3 L8.5025,3 Z M17.5025,18 C17.3825,18 17.2425,17.96 17.1425,17.86 L13.6425,14.36 C13.4625,14.16 13.4625,13.84 13.6425,13.64 C13.8425,13.46 14.1625,13.46 14.3625,13.64 L17.8625,17.14 C18.0425,17.34 18.0425,17.66 17.8625,17.86 C17.7625,17.96 17.6225,18 17.5025,18 L17.5025,18 Z" id="z"></path> </g> </g> </svg>
                    </span>
                </div>

                <div id="user-toolbar">
                    <a class="user">
                        <span class="user-avatar">
                            <div class="avatar medium" title="Joey Tribbiani">
                                <img src="icons/user-icon.png">
                            </div>
                        </span>
                        <span class="user-name">Joey Tribbiani</span>
                        <span class="user-arrow">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"> <g> <path d="M10.502,13c-0.132,0 -0.26,-0.053 -0.354,-0.146l-4.002,-4c-0.195,-0.195 -0.195,-0.512 0,-0.708c0.195,-0.195 0.512,-0.195 0.707,0l3.649,3.647l3.644,-3.647c0.195,-0.195 0.512,-0.195 0.707,0c0.195,0.195 0.195,0.512 0,0.708l-3.997,4c-0.094,0.093 -0.221,0.146 -0.354,0.146"></path> </g> </svg>
                        </span>
                        <div id="sync"></div>
                    </a>
                    <div class="stream-counts">
                        <a class="activities-count">
                            <svg class="bell" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="bell"> <path d="M15.2,10.14 C14.74,9.6 14.46,8.92 14.4,8.2 L14.28,6.94 C14.14,5.08 12.76,3.54 11,3.12 L11,3 C11,2.44 10.56,2 10,2 C9.44,2 9,2.44 9,3 L9,3.12 C7.24,3.54 5.86,5.08 5.72,6.94 L5.6,8.2 C5.54,8.92 5.28,9.6 4.8,10.16 L4.04,11.06 C3.38,11.88 3,12.9 3,13.94 L3,14.5 C3,14.78 3.22,15 3.5,15 L16.5,15 C16.78,15 17,14.78 17,14.5 L17,13.94 C17,12.9 16.62,11.88 15.96,11.06 L15.2,10.14 Z M16,14 L4,14 L4,13.94 C4,13.14 4.28,12.34 4.82,11.7 L5.58,10.8 C6.18,10.08 6.52,9.2 6.6,8.28 L6.7,7.02 C6.84,5.34 8.3,4 10,4 C11.7,4 13.16,5.34 13.3,7.02 L13.4,8.28 C13.48,9.2 13.84,10.08 14.42,10.8 L15.18,11.7 C15.72,12.34 16,13.14 16,13.94 L16,14 Z M12.3,16.1 C12.08,15.94 11.76,15.98 11.58,16.2 C10.82,17.22 9.18,17.22 8.4,16.2 C8.24,15.98 7.92,15.94 7.7,16.1 C7.48,16.26 7.44,16.58 7.62,16.8 C8.18,17.56 9.06,18 10,18 C10.94,18 11.82,17.56 12.38,16.8 C12.56,16.58 12.52,16.26 12.3,16.1 L12.3,16.1 Z" id="m"></path> </g> </g> </svg>
                        </a>
                        <a class="conversations-count">
                            <svg class="conversations rtl-flip" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="conversations"> <path d="M3.46,18 C3.28,17.98 3.1,17.86 3.04,17.68 C2.96,17.5 3,17.3 3.12,17.16 C4.1,16.08 4.3,14.12 3.54,13.12 C3.18,12.64 2.72,12 2.42,11.26 C2.14,10.52 2,9.76 2,9 C2,5.14 5.58,2 10,2 C14.42,2 18,5.14 18,9 C18,12.82 14.46,15.96 10.08,16 L10,16 C8.7,16 7.42,15.72 6.28,15.2 C6.02,15.08 5.92,14.78 6.04,14.54 C6.14,14.28 6.44,14.18 6.7,14.28 C7.68,14.74 8.8,14.98 9.92,15 L10,15 C13.86,15 17,12.3 17,9 C17,5.68 13.86,3 10,3 C6.14,3 3,5.68 3,9 C3,9.64 3.12,10.28 3.36,10.88 C3.6,11.52 4,12.08 4.34,12.52 C5.2,13.64 5.22,15.52 4.48,16.96 C5.2,16.84 5.92,16.56 6.52,16.1 C6.74,15.94 7.06,15.98 7.22,16.2 C7.38,16.42 7.34,16.74 7.12,16.9 C6.16,17.62 5,18 3.82,18 L3.46,18 Z" id="I"></path> </g> </g> </svg>
                        </a>
                    </div>
                </div>

                <div class="lists-scroll">
                    <ul class="pending-invites-collection">
                    </ul>
                    <ul class="filter-collection">
                        <li class="sidebarItem overdue active" rel="inbox">
                            <a>
                                <span class="list-icon">
                                    <svg class="inbox" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g> <path d="M10,15 C8.8,15 7.78,14.14 7.56,13 L2.5,13 C2.22,13 2,12.78 2,12.5 L2,3.5 C2,2.68 2.68,2 3.5,2 L16.5,2 C17.32,2 18,2.68 18,3.5 L18,12.5 C18,12.78 17.78,13 17.5,13 L12.44,13 C12.22,14.14 11.2,15 10,15 L10,15 Z M3,12 L8,12 C8.28,12 8.5,12.22 8.5,12.5 C8.5,13.32 9.18,14 10,14 C10.82,14 11.5,13.32 11.5,12.5 C11.5,12.22 11.72,12 12,12 L17,12 L17,3.5 C17,3.22 16.78,3 16.5,3 L3.5,3 C3.22,3 3,3.22 3,3.5 L3,12 Z M5.5,6 C5.22,6 5,5.78 5,5.5 C5,5.22 5.22,5 5.5,5 L14.5,5 C14.78,5 15,5.22 15,5.5 C15,5.78 14.78,6 14.5,6 L5.5,6 Z M5.5,8 C5.22,8 5,7.78 5,7.5 C5,7.22 5.22,7 5.5,7 L14.5,7 C14.78,7 15,7.22 15,7.5 C15,7.78 14.78,8 14.5,8 L5.5,8 Z M5.5,10 C5.22,10 5,9.78 5,9.5 C5,9.22 5.22,9 5.5,9 L14.5,9 C14.78,9 15,9.22 15,9.5 C15,9.78 14.78,10 14.5,10 L5.5,10 Z M3.5,18 C2.68,18 2,17.32 2,16.5 L2,14.5 C2,14.22 2.22,14 2.5,14 C2.78,14 3,14.22 3,14.5 L3,16.5 C3,16.78 3.22,17 3.5,17 L16.5,17 C16.78,17 17,16.78 17,16.5 L17,14.5 C17,14.22 17.22,14 17.5,14 C17.78,14 18,14.22 18,14.5 L18,16.5 C18,17.32 17.32,18 16.5,18 L3.5,18 Z" id="A"></path> </g> </g> </svg>
                                </span>
                                <span class="title">Inbox</span>
                                <span class="overdue-count"></span>
                                <span class="count"></span>
                            </a>
                        </li>
                        <li class="sidebarItem overdue animate-down visible" rel="today">
                            <a>
                                <span class="list-icon">
                                    <svg class="today" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="today"> <path d="M2.5,7 C2.22,7 2,6.78 2,6.5 L2,3.5 C2,2.68 2.68,2 3.5,2 L16.5,2 C17.32,2 18,2.68 18,3.5 L18,6.5 C18,6.78 17.78,7 17.5,7 L2.5,7 Z M3,6 L17,6 L17,3.5 C17,3.22 16.78,3 16.5,3 L3.5,3 C3.22,3 3,3.22 3,3.5 L3,6 Z M3.5,18 C2.68,18 2,17.32 2,16.5 L2,8.5 C2,8.22 2.22,8 2.5,8 C2.78,8 3,8.22 3,8.5 L3,16.5 C3,16.78 3.22,17 3.5,17 L16.5,17 C16.78,17 17,16.78 17,16.5 L17,8.5 C17,8.22 17.22,8 17.5,8 C17.78,8 18,8.22 18,8.5 L18,16.5 C18,17.32 17.32,18 16.5,18 L3.5,18 Z" id="E"></path> </g> </g> </svg>
                                </span>
                                <span class="title">Today</span>
                                <span class="overdue-count">1</span>
                                <span class="count">2</span>
                            </a>
                        </li>
                        <li class="sidebarItem overdue animate-down visible" rel="week">
                            <a>
                                <span class="list-icon">
                                    <svg class="week" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="week"> <path d="M2.5,7 C2.22,7 2,6.78 2,6.5 L2,3.5 C2,2.68 2.68,2 3.5,2 L16.5,2 C17.32,2 18,2.68 18,3.5 L18,6.5 C18,6.78 17.78,7 17.5,7 L2.5,7 Z M3,6 L17,6 L17,3.5 C17,3.22 16.78,3 16.5,3 L3.5,3 C3.22,3 3,3.22 3,3.5 L3,6 Z M3.5,18 C2.68,18 2,17.32 2,16.5 L2,8.5 C2,8.22 2.22,8 2.5,8 C2.78,8 3,8.22 3,8.5 L3,16.5 C3,16.78 3.22,17 3.5,17 L16.5,17 C16.78,17 17,16.78 17,16.5 L17,8.5 C17,8.22 17.22,8 17.5,8 C17.78,8 18,8.22 18,8.5 L18,16.5 C18,17.32 17.32,18 16.5,18 L3.5,18 Z M5.5,15 C5.22,15 5,14.78 5,14.5 L5,9.5 C5,9.22 5.22,9 5.5,9 C5.78,9 6,9.22 6,9.5 L6,14.5 C6,14.78 5.78,15 5.5,15 L5.5,15 Z M8.5,15 C8.22,15 8,14.78 8,14.5 L8,9.5 C8,9.22 8.22,9 8.5,9 C8.78,9 9,9.22 9,9.5 L9,14.5 C9,14.78 8.78,15 8.5,15 L8.5,15 Z M11.5,15 C11.22,15 11,14.78 11,14.5 L11,9.5 C11,9.22 11.22,9 11.5,9 C11.78,9 12,9.22 12,9.5 L12,14.5 C12,14.78 11.78,15 11.5,15 L11.5,15 Z M14.5,15 C14.22,15 14,14.78 14,14.5 L14,9.5 C14,9.22 14.22,9 14.5,9 C14.78,9 15,9.22 15,9.5 L15,14.5 C15,14.78 14.78,15 14.5,15 L14.5,15 Z" id="F"></path> </g> </g> </svg>
                                </span>
                                <span class="title">Week</span>
                                <span class="overdue-count">1</span>
                                <span class="count">2</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="lists-collection">
                        <li class="sidebarItem owner list draggable">
                            <a>
                                <span class="list-icon">
                                    <svg class="list rtl-flip" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="Web-svgs" stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="list"> <path d="M3,7 C2.44,7 2,6.56 2,6 L2,5 C2,4.44 2.44,4 3,4 L4,4 C4.56,4 5,4.44 5,5 L5,6 C5,6.56 4.56,7 4,7 L3,7 Z M4,5 L3,5 L3,6 L4,6 L4,5 Z M7.5,6 C7.22,6 7,5.78 7,5.5 C7,5.22 7.22,5 7.5,5 L17.5,5 C17.78,5 18,5.22 18,5.5 C18,5.78 17.78,6 17.5,6 L7.5,6 Z M3,12 C2.44,12 2,11.56 2,11 L2,10 C2,9.44 2.44,9 3,9 L4,9 C4.56,9 5,9.44 5,10 L5,11 C5,11.56 4.56,12 4,12 L3,12 Z M4,10 L3,10 L3,11 L4,11 L4,10 Z M7.5,11 C7.22,11 7,10.78 7,10.5 C7,10.22 7.22,10 7.5,10 L17.5,10 C17.78,10 18,10.22 18,10.5 C18,10.78 17.78,11 17.5,11 L7.5,11 Z M3,17 C2.44,17 2,16.56 2,16 L2,15 C2,14.44 2.44,14 3,14 L4,14 C4.56,14 5,14.44 5,15 L5,16 C5,16.56 4.56,17 4,17 L3,17 Z M4,15 L3,15 L3,16 L4,16 L4,15 Z M7.5,16 C7.22,16 7,15.78 7,15.5 C7,15.22 7.22,15 7.5,15 L17.5,15 C17.78,15 18,15.22 18,15.5 C18,15.78 17.78,16 17.5,16 L7.5,16 Z" id="K"> </path> </g> </g> </svg>
                                </span>
                                <span class="title">Inbox</span>
                                <span class="overdue-count"></span>
                                <span class="count"></span>
                            </a>
                        </li>
                        <li class="sidebarItem owner list draggable">
                            <a>
                                <span class="list-icon">
                                   <svg class="list rtl-flip" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="Web-svgs" stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="list"> <path d="M3,7 C2.44,7 2,6.56 2,6 L2,5 C2,4.44 2.44,4 3,4 L4,4 C4.56,4 5,4.44 5,5 L5,6 C5,6.56 4.56,7 4,7 L3,7 Z M4,5 L3,5 L3,6 L4,6 L4,5 Z M7.5,6 C7.22,6 7,5.78 7,5.5 C7,5.22 7.22,5 7.5,5 L17.5,5 C17.78,5 18,5.22 18,5.5 C18,5.78 17.78,6 17.5,6 L7.5,6 Z M3,12 C2.44,12 2,11.56 2,11 L2,10 C2,9.44 2.44,9 3,9 L4,9 C4.56,9 5,9.44 5,10 L5,11 C5,11.56 4.56,12 4,12 L3,12 Z M4,10 L3,10 L3,11 L4,11 L4,10 Z M7.5,11 C7.22,11 7,10.78 7,10.5 C7,10.22 7.22,10 7.5,10 L17.5,10 C17.78,10 18,10.22 18,10.5 C18,10.78 17.78,11 17.5,11 L7.5,11 Z M3,17 C2.44,17 2,16.56 2,16 L2,15 C2,14.44 2.44,14 3,14 L4,14 C4.56,14 5,14.44 5,15 L5,16 C5,16.56 4.56,17 4,17 L3,17 Z M4,15 L3,15 L3,16 L4,16 L4,15 Z M7.5,16 C7.22,16 7,15.78 7,15.5 C7,15.22 7.22,15 7.5,15 L17.5,15 C17.78,15 18,15.22 18,15.5 C18,15.78 17.78,16 17.5,16 L7.5,16 Z" id="K"> </path> </g> </g> </svg>
                                </span>
                                <span class="title">Work</span>
                                <span class="overdue-count"></span>
                                <span class="count"></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebarActions">
                    <a class="sidebarActions-addList">
                        <span class="sidebarActions-icons">
                            <svg class="plus-small" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <path d="M10,10l0,6.5c-0.003,0.053 -0.008,0.103 -0.024,0.155c-0.038,0.116 -0.12,0.217 -0.226,0.278c-0.047,0.027 -0.094,0.042 -0.146,0.056c-0.052,0.008 -0.051,0.008 -0.104,0.011c-0.053,-0.003 -0.103,-0.008 -0.155,-0.024c-0.15,-0.05 -0.271,-0.171 -0.321,-0.321c-0.016,-0.052 -0.021,-0.102 -0.024,-0.155l0,-6.5l-6.5,0c-0.046,-0.002 -0.058,-0.001 -0.104,-0.011c-0.103,-0.022 -0.197,-0.076 -0.268,-0.154c-0.169,-0.188 -0.169,-0.482 0,-0.67c0.035,-0.038 0.077,-0.072 0.122,-0.098c0.078,-0.045 0.161,-0.062 0.25,-0.067l6.5,0l0,-6.5c0.005,-0.089 0.022,-0.172 0.067,-0.25c0.126,-0.219 0.406,-0.31 0.636,-0.207c0.048,0.022 0.093,0.05 0.132,0.085c0.078,0.071 0.132,0.165 0.154,0.268c0.01,0.046 0.009,0.058 0.011,0.104l0,6.5l6.5,0c0.046,0.002 0.058,0.001 0.104,0.011c0.103,0.022 0.197,0.076 0.268,0.154c0.169,0.188 0.169,0.482 0,0.67c-0.035,0.038 -0.077,0.072 -0.122,0.098c-0.078,0.045 -0.161,0.062 -0.25,0.067l-6.5,0Z"></path> </g> </svg>
                        </span>
                        <span class="sidebarActions-label">Create list</span>
                    </a>
                </div>
            </div>
        </div>

        <div id="tasks">
            <div id="list-toolbar">
                <h1 class="title">Inbox</h1>
                <div class="actionBar">
                    <div class="actionBar-top">
                        <ul class="actionBar-top-sort active">
                        </ul>
                        <ul class="actionBar-top-more">
                            <li class="first-menu-item">
                                <a class="actionBar-top-duplicate-list disabled">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" sketch:type="MSPage"> <g id="duplicate" sketch:type="MSArtboardGroup"> <path d="M15.5,2 L7.5,2 C6.121,2 5,3.121 5,4.5 L5,6 L4.5,6 C3.121,6 2,7.121 2,8.5 C2,8.776 2.224,9 2.5,9 C2.776,9 3,8.776 3,8.5 C3,7.673 3.673,7 4.5,7 L5,7 L5,12.5 C5,13.879 6.121,15 7.5,15 L13,15 L13,15.5 C13,16.327 12.327,17 11.5,17 C11.224,17 11,17.224 11,17.5 C11,17.776 11.224,18 11.5,18 C12.879,18 14,16.879 14,15.5 L14,15 L15.5,15 C16.879,15 18,13.879 18,12.5 L18,4.5 C18,3.121 16.879,2 15.5,2 L15.5,2 Z M17,12.5 C17,13.327 16.327,14 15.5,14 L7.5,14 C6.673,14 6,13.327 6,12.5 L6,4.5 C6,3.673 6.673,3 7.5,3 L15.5,3 C16.327,3 17,3.673 17,4.5 L17,12.5 Z M2.5,14 C2.776,14 3,13.776 3,13.5 L3,11.5 C3,11.224 2.776,11 2.5,11 C2.224,11 2,11.224 2,11.5 L2,13.5 C2,13.776 2.224,14 2.5,14 Z M8.5,17 L6.5,17 C6.224,17 6,17.224 6,17.5 C6,17.776 6.224,18 6.5,18 L8.5,18 C8.776,18 9,17.776 9,17.5 C9,17.224 8.776,17 8.5,17 Z M4.5,17 C3.673,17 3,16.327 3,15.5 C3,15.224 2.776,15 2.5,15 C2.224,15 2,15.224 2,15.5 C2,16.879 3.121,18 4.5,18 C4.776,18 5,17.776 5,17.5 C5,17.224 4.776,17 4.5,17 Z M14.691,5.038 C14.63,5.013 14.565,5 14.5,5 L10.5,5 C10.224,5 10,5.224 10,5.5 C10,5.776 10.224,6 10.5,6 L13.293,6 L10.146,9.146 C9.951,9.342 9.951,9.658 10.146,9.853 C10.244,9.951 10.372,10 10.5,10 C10.628,10 10.756,9.951 10.853,9.853 L14,6.707 L14,9.5 C14,9.776 14.224,10 14.5,10 C14.776,10 15,9.776 15,9.5 L15,5.5 C15,5.435 14.987,5.37 14.962,5.309 C14.911,5.187 14.813,5.089 14.691,5.038" id="Fill-1" sketch:type="MSShapeGroup"></path> </g> </g> </svg>
                                    Duplicate List
                                </a>
                            </li>
                            <li class="last-menu-item ">
                                    <a class="actionBar-top-trash disabled">
                                        <svg class="trash" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="trash"> <path d="M12,3.5 C12,2.4 11.1,1.5 10,1.5 C8.9,1.5 8,2.4 8,3.5 L5.5,3.5 C4.68,3.5 4,4.18 4,5 L4,7 C4,7.28 4.22,7.5 4.5,7.5 L15.5,7.5 C15.78,7.5 16,7.28 16,7 L16,5 C16,4.18 15.32,3.5 14.5,3.5 L12,3.5 Z M10,2.5 C10.56,2.5 11,2.94 11,3.5 L9,3.5 C9,2.94 9.44,2.5 10,2.5 L10,2.5 Z M15,6.5 L5,6.5 L5,5 C5,4.72 5.22,4.5 5.5,4.5 L14.5,4.5 C14.78,4.5 15,4.72 15,5 L15,6.5 Z M14.5,8.5 C14.22,8.5 14,8.72 14,9 L14,16 C14,16.28 13.78,16.5 13.5,16.5 L6.5,16.5 C6.22,16.5 6,16.28 6,16 L6,9 C6,8.72 5.78,8.5 5.5,8.5 C5.22,8.5 5,8.72 5,9 L5,16 C5,16.82 5.68,17.5 6.5,17.5 L13.5,17.5 C14.32,17.5 15,16.82 15,16 L15,9 C15,8.72 14.78,8.5 14.5,8.5 L14.5,8.5 Z M9,9 C9,8.72 8.78,8.5 8.5,8.5 C8.22,8.5 8,8.72 8,9 L8,15 C8,15.28 8.22,15.5 8.5,15.5 C8.78,15.5 9,15.28 9,15 L9,9 Z M12,9 C12,8.72 11.78,8.5 11.5,8.5 C11.22,8.5 11,8.72 11,9 L11,15 C11,15.28 11.22,15.5 11.5,15.5 C11.78,15.5 12,15.28 12,15 L12,9 Z" id="j"></path> </g> </g> </svg>
                                        Delete
                                        <!-- <text class="delete-items-label">Delete Selected To-do</text> -->
                                    </a>
                                </li>
                            <li>
                                <a class="actionBar-top-copy-item hidden">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" sketch:type="MSPage"> <g id="copy" sketch:type="MSArtboardGroup"> <path d="M12.7921708,6.5 L8.647,10.646 C8.451,10.842 8.451,11.158 8.647,11.353 C8.744,11.451 8.872,11.5 9,11.5 C9.128,11.5 9.256,11.451 9.354,11.353 L13.5,7.207 L13.5,10 C13.5,10.276 13.724,10.5 14,10.5 C14.276,10.5 14.5,10.276 14.5,10 L14.5,6.01573317 C14.5041978,5.88263558 14.4555311,5.7480518 14.354,5.646 C14.2519482,5.54446887 14.1173644,5.4958022 13.9841257,5.5 L10,5.5 C9.724,5.5 9.5,5.724 9.5,6 C9.5,6.276 9.724,6.5 10,6.5 L12.7921708,6.5 L12.7921708,6.5 Z M2.5,5.5 C2.224,5.5 2,5.276 2,5 L2,4.5 C2,3.121 3.121,2 4.5,2 L5,2 C5.276,2 5.5,2.224 5.5,2.5 C5.5,2.776 5.276,3 5,3 L4.5,3 C3.673,3 3,3.673 3,4.5 L3,5 C3,5.276 2.776,5.5 2.5,5.5 Z M5,18 L4.5,18 C3.121,18 2,16.879 2,15.5 L2,15 C2,14.724 2.224,14.5 2.5,14.5 C2.776,14.5 3,14.724 3,15 L3,15.5 C3,16.327 3.673,17 4.5,17 L5,17 C5.276,17 5.5,17.224 5.5,17.5 C5.5,17.776 5.276,18 5,18 Z M15.5,18 L15,18 C14.724,18 14.5,17.776 14.5,17.5 C14.5,17.224 14.724,17 15,17 L15.5,17 C16.327,17 17,16.327 17,15.5 L17,15 C17,14.724 17.224,14.5 17.5,14.5 C17.776,14.5 18,14.724 18,15 L18,15.5 C18,16.879 16.879,18 15.5,18 Z M17.5,5.5 C17.224,5.5 17,5.276 17,5 L17,4.5 C17,3.673 16.327,3 15.5,3 L15,3 C14.724,3 14.5,2.776 14.5,2.5 C14.5,2.224 14.724,2 15,2 L15.5,2 C16.879,2 18,3.121 18,4.5 L18,5 C18,5.276 17.776,5.5 17.5,5.5 Z M2.5,12.5 C2.224,12.5 2,12.276 2,12 L2,8 C2,7.724 2.224,7.5 2.5,7.5 C2.776,7.5 3,7.724 3,8 L3,12 C3,12.276 2.776,12.5 2.5,12.5 Z M17.5,12.5 C17.224,12.5 17,12.276 17,12 L17,8 C17,7.724 17.224,7.5 17.5,7.5 C17.776,7.5 18,7.724 18,8 L18,12 C18,12.276 17.776,12.5 17.5,12.5 Z M12,3 L8,3 C7.724,3 7.5,2.776 7.5,2.5 C7.5,2.224 7.724,2 8,2 L12,2 C12.276,2 12.5,2.224 12.5,2.5 C12.5,2.776 12.276,3 12,3 Z M12,18 L8,18 C7.724,18 7.5,17.776 7.5,17.5 C7.5,17.224 7.724,17 8,17 L12,17 C12.276,17 12.5,17.224 12.5,17.5 C12.5,17.776 12.276,18 12,18 Z" id="Copy" sketch:type="MSShapeGroup"></path> </g> </g> </svg>
                                    <span class="label">Copy Selected To-do</span>
                                </a>
                            </li>
                            <li>
                                <a class="actionBar-top-paste-item hidden">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" sketch:type="MSPage"> <g id="paste" sketch:type="MSArtboardGroup"> <path d="M15.5,2 L4.5,2 C3.121,2 2,3.121 2,4.5 L2,15.5 C2,16.879 3.121,18 4.5,18 L15.5,18 C16.879,18 18,16.879 18,15.5 L18,4.5 C18,3.121 16.879,2 15.5,2 L15.5,2 Z M17,15.5 C17,16.327 16.327,17 15.5,17 L4.5,17 C3.673,17 3,16.327 3,15.5 L3,4.5 C3,3.673 3.673,3 4.5,3 L15.5,3 C16.327,3 17,3.673 17,4.5 L17,15.5 L17,15.5 Z M11.353,8.646 C11.158,8.451 10.842,8.451 10.646,8.646 L6.5,12.793 L6.5,10 C6.5,9.724 6.276,9.5 6,9.5 C5.724,9.5 5.5,9.724 5.5,10 L5.5,14 C5.5,14.065 5.513,14.13 5.538,14.191 C5.589,14.313 5.687,14.411 5.809,14.462 C5.87,14.487 5.935,14.5 6,14.5 L10,14.5 C10.276,14.5 10.5,14.276 10.5,14 C10.5,13.724 10.276,13.5 10,13.5 L7.207,13.5 L11.353,9.353 C11.549,9.158 11.549,8.842 11.353,8.646" id="Paste" sketch:type="MSShapeGroup"></path> </g> </g> </svg>
                                    <span class="label">Paste To-dos</span>
                                </a>
                            </li>
                            <li>
                                <a class="actionBar-top-email-all">
                                    <svg class="email" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="email"> <path d="M4.5,17 C3.12,17 2,15.88 2,14.5 L2,5.5 C2,4.12 3.12,3 4.5,3 L15.5,3 C16.88,3 18,4.12 18,5.5 L18,14.5 C18,15.88 16.88,17 15.5,17 L4.5,17 Z M4.5,4 C3.68,4 3,4.68 3,5.5 L3,14.5 C3,15.32 3.68,16 4.5,16 L15.5,16 C16.32,16 17,15.32 17,14.5 L17,5.5 C17,4.68 16.32,4 15.5,4 L4.5,4 Z M10,11.5 C9.88,11.5 9.74,11.46 9.64,11.36 L4.14,5.86 C3.96,5.66 3.96,5.34 4.14,5.14 C4.34,4.96 4.66,4.96 4.86,5.14 L10,10.3 L15.14,5.14 C15.34,4.96 15.66,4.96 15.86,5.14 C16.04,5.34 16.04,5.66 15.86,5.86 L10.36,11.36 C10.26,11.46 10.12,11.5 10,11.5 L10,11.5 Z" id="X"></path> </g> </g> </svg>
                                    Email List
                                </a>
                            </li>
                            <li class="disabled">
                                <a class="actionBar-top-email-selected disabled">
                                    <svg class="email" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="email"> <path d="M4.5,17 C3.12,17 2,15.88 2,14.5 L2,5.5 C2,4.12 3.12,3 4.5,3 L15.5,3 C16.88,3 18,4.12 18,5.5 L18,14.5 C18,15.88 16.88,17 15.5,17 L4.5,17 Z M4.5,4 C3.68,4 3,4.68 3,5.5 L3,14.5 C3,15.32 3.68,16 4.5,16 L15.5,16 C16.32,16 17,15.32 17,14.5 L17,5.5 C17,4.68 16.32,4 15.5,4 L4.5,4 Z M10,11.5 C9.88,11.5 9.74,11.46 9.64,11.36 L4.14,5.86 C3.96,5.66 3.96,5.34 4.14,5.14 C4.34,4.96 4.66,4.96 4.86,5.14 L10,10.3 L15.14,5.14 C15.34,4.96 15.66,4.96 15.86,5.14 C16.04,5.34 16.04,5.66 15.86,5.86 L10.36,11.36 C10.26,11.46 10.12,11.5 10,11.5 L10,11.5 Z" id="X"></path> </g> </g> </svg>
                                    <span class="email-items-label">Email Selected To-do</span>
                                </a>
                            </li>
                            <li>
                                <a class="actionBar-top-print-all">
                                    <svg class="print" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g> <path d="M4.5,6 C3.12,6 2,7.12 2,8.5 L2,14.5 C2,14.78 2.22,15 2.5,15 L5,15 L5,17.5 C5,17.78 5.22,18 5.5,18 L14.5,18 C14.78,18 15,17.78 15,17.5 L15,15 L17.5,15 C17.78,15 18,14.78 18,14.5 L18,8.5 C18,7.12 16.88,6 15.5,6 L4.5,6 Z M17,14 L15,14 L15,12 L15.5,12 C15.78,12 16,11.78 16,11.5 C16,11.22 15.78,11 15.5,11 L4.5,11 C4.22,11 4,11.22 4,11.5 C4,11.78 4.22,12 4.5,12 L5,12 L5,14 L3,14 L3,8.5 C3,7.68 3.68,7 4.5,7 L15.5,7 C16.32,7 17,7.68 17,8.5 L17,14 Z M14,12 L14,17 L6,17 L6,12 L14,12 Z" id="Z"></path> <path d="M5.5,5 C5.78,5 6,4.78 6,4.5 L6,3 L14,3 L14,4.5 C14,4.78 14.22,5 14.5,5 C14.78,5 15,4.78 15,4.5 L15,2.5 C15,2.22 14.78,2 14.5,2 L5.5,2 C5.22,2 5,2.22 5,2.5 L5,4.5 C5,4.78 5.22,5 5.5,5 L5.5,5 Z" id="Path"></path> </g> </g> </svg>
                                    Print List
                                </a>
                            </li>
                            <li class="disabled">
                                <a class="actionBar-top-print-selected">
                                    <svg class="print" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g> <path d="M4.5,6 C3.12,6 2,7.12 2,8.5 L2,14.5 C2,14.78 2.22,15 2.5,15 L5,15 L5,17.5 C5,17.78 5.22,18 5.5,18 L14.5,18 C14.78,18 15,17.78 15,17.5 L15,15 L17.5,15 C17.78,15 18,14.78 18,14.5 L18,8.5 C18,7.12 16.88,6 15.5,6 L4.5,6 Z M17,14 L15,14 L15,12 L15.5,12 C15.78,12 16,11.78 16,11.5 C16,11.22 15.78,11 15.5,11 L4.5,11 C4.22,11 4,11.22 4,11.5 C4,11.78 4.22,12 4.5,12 L5,12 L5,14 L3,14 L3,8.5 C3,7.68 3.68,7 4.5,7 L15.5,7 C16.32,7 17,7.68 17,8.5 L17,14 Z M14,12 L14,17 L6,17 L6,12 L14,12 Z" id="Z"></path> <path d="M5.5,5 C5.78,5 6,4.78 6,4.5 L6,3 L14,3 L14,4.5 C14,4.78 14.22,5 14.5,5 C14.78,5 15,4.78 15,4.5 L15,2.5 C15,2.22 14.78,2 14.5,2 L5.5,2 C5.22,2 5,2.22 5,2.5 L5,4.5 C5,4.78 5.22,5 5.5,5 L5.5,5 Z" id="Path"></path> </g> </g> </svg>
                                    <span class="print-items-label">Print Selected To-do</span>
                                </a>
                            </li>
                            <li class="disabled">
                                <a class="actionBar-top-do-not-disturb">
                                    <svg class="do-no-disturb" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="do-no-disturb"> <path d="M15.474,10.7635 C16.694,9.9435 17.494,8.5635 17.494,7.0035 C17.494,4.5235 15.474,2.5035 12.994,2.5035 C11.434,2.5035 10.054,3.3035 9.234,4.5235 L7.354,2.6435 C7.234,2.5035 7.034,2.4635 6.854,2.5235 C6.674,2.5835 6.534,2.7235 6.514,2.9235 L5.514,9.4235 C5.494,9.5835 5.534,9.7435 5.654,9.8435 L10.154,14.3435 C10.254,14.4435 10.374,14.4835 10.494,14.4835 L10.574,14.4835 L17.074,13.4835 C17.274,13.4635 17.414,13.3235 17.474,13.1435 C17.534,12.9635 17.494,12.7635 17.354,12.6435 L15.474,10.7635 Z M12.994,3.5035 C14.914,3.5035 16.494,5.0835 16.494,7.0035 C16.494,8.3835 15.694,9.5835 14.514,10.1635 C14.474,10.1635 14.414,10.1835 14.374,10.2235 C13.954,10.4035 13.474,10.5035 12.994,10.5035 C11.054,10.5035 9.494,8.9435 9.494,7.0035 C9.494,6.5235 9.594,6.0435 9.774,5.6235 C9.814,5.5835 9.834,5.5235 9.834,5.4835 C10.414,4.3035 11.614,3.5035 12.994,3.5035 L12.994,3.5035 Z M15.954,12.6435 L10.674,13.4635 L6.534,9.3235 L7.354,4.0435 L8.774,5.4635 C8.594,5.9435 8.494,6.4635 8.494,7.0035 C8.494,9.4835 10.514,11.5035 12.994,11.5035 C13.534,11.5035 14.054,11.4035 14.534,11.2235 L15.954,12.6435 Z M11.134,8.8635 C11.234,8.9635 11.374,9.0035 11.494,9.0035 C11.614,9.0035 11.754,8.9635 11.854,8.8635 L12.994,7.7035 L14.134,8.8635 C14.234,8.9635 14.374,9.0035 14.494,9.0035 C14.614,9.0035 14.754,8.9635 14.854,8.8635 C15.034,8.6635 15.034,8.3435 14.854,8.1435 L13.694,7.0035 L14.854,5.8635 C15.034,5.6635 15.034,5.3435 14.854,5.1435 C14.654,4.9635 14.334,4.9635 14.134,5.1435 L12.994,6.3035 L11.854,5.1435 C11.654,4.9635 11.334,4.9635 11.134,5.1435 C10.954,5.3435 10.954,5.6635 11.134,5.8635 L12.294,7.0035 L11.134,8.1435 C10.954,8.3435 10.954,8.6635 11.134,8.8635 L11.134,8.8635 Z M6.994,16.3035 C6.714,16.5635 6.294,16.5635 6.014,16.3035 L3.694,13.9835 C3.434,13.7035 3.434,13.2835 3.694,13.0035 L5.354,11.3435 C5.554,11.1435 5.554,10.8435 5.354,10.6435 C5.154,10.4435 4.854,10.4435 4.654,10.6435 L2.994,12.3035 C2.334,12.9635 2.334,14.0235 2.994,14.6835 L5.314,17.0035 C5.654,17.3435 6.074,17.5035 6.514,17.5035 C6.934,17.5035 7.374,17.3435 7.694,17.0035 L9.354,15.3435 C9.554,15.1435 9.554,14.8435 9.354,14.6435 C9.154,14.4435 8.854,14.4435 8.654,14.6435 L6.994,16.3035 Z" id="®"></path> </g> </g> </svg>
                                    <span class="un-mute">
                                        Do Not Disturb
                                    </span>
                                    <span class="status-label right on">
                                        On
                                    </span>
                                    <span class="status-label right off active">
                                        Off
                                    </span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="actionBar-bottom">
                        <a class="tab share first-tab disabled">
                            <svg class="share rtl-flip" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-disabled="true"> <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                    <g id="share">
                                        <path d="M11.5025,12 C13.7825,12 15.5025,8.84 15.5025,6 C15.5025,3.8 13.7025,2 11.5025,2 C9.3025,2 7.5025,3.8 7.5025,6 C7.5025,8.5 9.0225,12 11.5025,12 L11.5025,12 Z M11.5025,3 C13.1625,3 14.5025,4.34 14.5025,6 C14.5025,8.26 13.1225,11 11.5025,11 C9.8425,11 8.5025,8.26 8.5025,6 C8.5025,4.34 9.8425,3 11.5025,3 L11.5025,3 Z M4.5025,10 L6.0025,10 C6.2825,10 6.5025,9.78 6.5025,9.5 C6.5025,9.22 6.2825,9 6.0025,9 L4.5025,9 L4.5025,7.5 C4.5025,7.22 4.2825,7 4.0025,7 C3.7225,7 3.5025,7.22 3.5025,7.5 L3.5025,9 L2.0025,9 C1.7225,9 1.5025,9.22 1.5025,9.5 C1.5025,9.78 1.7225,10 2.0025,10 L3.5025,10 L3.5025,11.5 C3.5025,11.78 3.7225,12 4.0025,12 C4.2825,12 4.5025,11.78 4.5025,11.5 L4.5025,10 Z M18.2625,14.88 C18.0625,14 17.4025,13.28 16.5225,13.04 L14.2225,12.36 C14.0825,12.32 13.9625,12.26 13.8625,12.14 C13.6625,11.96 13.3425,11.96 13.1625,12.16 C12.9625,12.34 12.9625,12.66 13.1625,12.86 C13.3825,13.08 13.6425,13.24 13.9425,13.32 L16.2425,14 C16.7625,14.14 17.1625,14.58 17.2825,15.1 L17.4425,15.8 C16.9025,16.16 15.2025,17 11.5025,17 C7.7825,17 6.1025,16.14 5.5625,15.8 L5.7225,15.04 C5.8425,14.5 6.2625,14.06 6.8025,13.92 L9.0425,13.32 C9.3425,13.24 9.6225,13.08 9.8625,12.86 C10.0425,12.66 10.0425,12.34 9.8625,12.14 C9.6625,11.96 9.3425,11.96 9.1425,12.14 C9.0425,12.24 8.9225,12.32 8.7825,12.36 L6.5425,12.96 C5.6425,13.2 4.9625,13.92 4.7425,14.82 L4.5225,15.9 C4.4825,16.06 4.5225,16.24 4.6425,16.36 C4.7225,16.42 6.3625,18 11.5025,18 C16.6425,18 18.2825,16.42 18.3625,16.36 C18.4825,16.24 18.5225,16.06 18.4825,15.9 L18.2625,14.88 Z" id="W"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="tab-text">Share</span>
                        </a>
                        <a class="tab sore-az disabled">
                            <svg class="sort-az" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-disabled="false">
                                <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                    <g id="sort-az">
                                        <path d="M14.2,2.3 C14.12,2.12 13.94,2 13.76,2 L13.26,2 C13.06,2 12.88,2.12 12.8,2.3 L10.04,8.3 C9.94,8.54 10.04,8.84 10.3,8.96 C10.54,9.08 10.84,8.96 10.96,8.7 L11.74,7 L15.26,7 L16.04,8.7 C16.14,8.9 16.32,9 16.5,9 C16.58,9 16.64,8.98 16.7,8.96 C16.96,8.84 17.06,8.54 16.96,8.3 L14.2,2.3 Z M5.64,3.02 C5.56,3 5.48,3 5.4,3 C5.3,3.02 5.22,3.08 5.14,3.16 L3.14,5.14 C2.96,5.34 2.96,5.66 3.14,5.86 C3.34,6.04 3.66,6.04 3.86,5.86 L5,4.7 L5,8.5 C5,8.78 5.22,9 5.5,9 C5.78,9 6,8.78 6,8.5 L6,4.7 L7.14,5.86 C7.24,5.96 7.38,6 7.5,6 C7.62,6 7.76,5.96 7.86,5.86 C8.04,5.66 8.04,5.34 7.86,5.14 C5.68,2.98 5.8,3.08 5.64,3.02 L5.64,3.02 Z M14.8,6 L12.2,6 L13.5,3.16 L14.8,6 Z M6,15.3 L6,11.5 C6,11.22 5.78,11 5.5,11 C5.22,11 5,11.22 5,11.5 L5,15.3 L3.86,14.14 C3.66,13.96 3.34,13.96 3.14,14.14 C2.96,14.34 2.96,14.66 3.14,14.86 C5.28,17 5.2,16.96 5.4,17 C5.56,17.02 5.74,16.98 5.86,16.84 L7.86,14.86 C8.04,14.66 8.04,14.34 7.86,14.14 C7.66,13.96 7.34,13.96 7.14,14.14 L6,15.3 Z M15.94,11.26 C15.86,11.1 15.68,11 15.5,11 L11.5,11 C11.22,11 11,11.22 11,11.5 C11,11.78 11.22,12 11.5,12 L14.56,12 L11.08,17.22 C10.98,17.38 10.98,17.58 11.06,17.74 C11.14,17.9 11.32,18 11.5,18 L15.5,18 C15.78,18 16,17.78 16,17.5 C16,17.22 15.78,17 15.5,17 L12.44,17 L15.92,11.78 C16.02,11.62 16.02,11.42 15.94,11.26 L15.94,11.26 Z" id="sort"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="tab-text">Sort</span>
                        </a>
                        <a class="tab last-tab">
                            <svg class="folder-option" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                                <g id="Layer 1">
                                    <path d="M3.5,11c0.828,0 1.5,-0.672 1.5,-1.5c0,-0.828 -0.672,-1.5 -1.5,-1.5c-0.828,0 -1.5,0.672 -1.5,1.5c0,0.828 0.672,1.5 1.5,1.5Z"></path>
                                    <path d="M9.5,11c0.828,0 1.5,-0.672 1.5,-1.5c0,-0.828 -0.672,-1.5 -1.5,-1.5c-0.828,0 -1.5,0.672 -1.5,1.5c0,0.828 0.672,1.5 1.5,1.5Z"></path>
                                    <path d="M15.5,11c0.828,0 1.5,-0.672 1.5,-1.5c0,-0.828 -0.672,-1.5 -1.5,-1.5c-0.828,0 -1.5,0.672 -1.5,1.5c0,0.828 0.672,1.5 1.5,1.5Z"></path>
                                </g>
                            </svg>
                            <span class="tab-text">More</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="task-scroll">
                <div class="addTask">
                    <div class="addTask-meta"></div>
                    <a class="plus-wrapper">
                        <svg class="plus-small" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">
                            <g>
                                <path d="M10,10l0,6.5c-0.003,0.053 -0.008,0.103 -0.024,0.155c-0.038,0.116 -0.12,0.217 -0.226,0.278c-0.047,0.027 -0.094,0.042 -0.146,0.056c-0.052,0.008 -0.051,0.008 -0.104,0.011c-0.053,-0.003 -0.103,-0.008 -0.155,-0.024c-0.15,-0.05 -0.271,-0.171 -0.321,-0.321c-0.016,-0.052 -0.021,-0.102 -0.024,-0.155l0,-6.5l-6.5,0c-0.046,-0.002 -0.058,-0.001 -0.104,-0.011c-0.103,-0.022 -0.197,-0.076 -0.268,-0.154c-0.169,-0.188 -0.169,-0.482 0,-0.67c0.035,-0.038 0.077,-0.072 0.122,-0.098c0.078,-0.045 0.161,-0.062 0.25,-0.067l6.5,0l0,-6.5c0.005,-0.089 0.022,-0.172 0.067,-0.25c0.126,-0.219 0.406,-0.31 0.636,-0.207c0.048,0.022 0.093,0.05 0.132,0.085c0.078,0.071 0.132,0.165 0.154,0.268c0.01,0.046 0.009,0.058 0.011,0.104l0,6.5l6.5,0c0.046,0.002 0.058,0.001 0.104,0.011c0.103,0.022 0.197,0.076 0.268,0.154c0.169,0.188 0.169,0.482 0,0.67c-0.035,0.038 -0.077,0.072 -0.122,0.098c-0.078,0.045 -0.161,0.062 -0.25,0.067l-6.5,0Z"></path>
                            </g>
                        </svg>
                    </a>
                    <form action="index.php" method="post" name="frmTask">
                        <input type="text" class="addTask-input chromeless" placeholder="Add a to-do..." name="addTask" >
                        <input type="hidden" name="id" value="1">
                    </form>
                    <div class="nlp-feedback"></div>
                    <div class="positionHelper"></div>
                    <div class="end-positionHelper-target"></div>
                    <a class="speech-wrapper hidden"></a>
                </div>
                <div class="task-list inbox">
                    <!-- <h2 class="heading normal">
                        <a class="groupHeader">Inbox</a>
                    </h2> -->
                    <ol class="tasks">
                        <?php
                        if (isset($_SESSION['tasks'])) {
                            foreach ($_SESSION['tasks'] as $value) {
                                if ($value['status'] == 1) {
                        ?>
                        <li class="taskItem 
                            <?php 
                                if (isset($_GET['id']) && $_GET['id'] == $value['id']) {
                                    echo 'selected';
                                }  ?>
                        " rel="php">
                            <div class="taskItem-body">
                                <a class="taskItem-checkboxWrapper">
                                    <span>
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        width="20px" height="20px" viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;"
                                        xml:space="preserve">
                                        <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g>
                                            <g>
                                                <path d="M377.87,24.126C361.786,8.042,342.417,0,319.769,0H82.227C59.579,0,40.211,8.042,24.125,24.126
                                                    C8.044,40.212,0.002,59.576,0.002,82.228v237.543c0,22.647,8.042,42.014,24.123,58.101c16.086,16.085,35.454,24.127,58.102,24.127
                                                    h237.542c22.648,0,42.011-8.042,58.102-24.127c16.085-16.087,24.126-35.453,24.126-58.101V82.228
                                                    C401.993,59.58,393.951,40.212,377.87,24.126z M365.448,319.771c0,12.559-4.47,23.314-13.415,32.264
                                                    c-8.945,8.945-19.698,13.411-32.265,13.411H82.227c-12.563,0-23.317-4.466-32.264-13.411c-8.945-8.949-13.418-19.705-13.418-32.264
                                                    V82.228c0-12.562,4.473-23.316,13.418-32.264c8.947-8.946,19.701-13.418,32.264-13.418h237.542
                                                    c12.566,0,23.319,4.473,32.265,13.418c8.945,8.947,13.415,19.701,13.415,32.264V319.771L365.448,319.771z"/>
                                            </g>

                                    </svg>
                                    </span>
                                    <form action="index.php" method="post" name="<?php echo "frmDone" . $value['id'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                        <input type="hidden" name="status" value="<?php echo $value['status'] ?>">
                                    </form>
                                </a>
                                <div class="taskItem-titleWrapper"><?php echo $value['title'] ?></div>
                                <span class="taskItem-duedate overdue"><?php echo $value['duedate']?></span>
                                <form action="index.php" method="get" name="<?php echo "frm" . $value['id'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                </form>
                                <a class="taskItem-star">
                                    <span>
                                        <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <path d="M3.74,18 C3.64,18 3.54,17.96 3.46,17.9 C3.28,17.76 3.2,17.54 3.28,17.34 L5.16,11.5 L0.2,7.9 C0.04,7.78 -0.04,7.56 0.02,7.34 C0.1,7.14 0.28,7 0.5,7 L6.64,7 L8.52,1.16 C8.66,0.76 9.34,0.76 9.48,1.16 L11.38,7 L17.5,7 C17.72,7 17.9,7.14 17.98,7.34 C18.04,7.56 17.96,7.78 17.8,7.9 L12.84,11.5 L14.72,17.34 C14.8,17.54 14.72,17.76 14.54,17.9 C14.38,18.02 14.14,18.02 13.96,17.9 L9,14.3 L4.04,17.9 C3.96,17.96 3.84,18 3.74,18 L3.74,18 Z M9,13.18 C9.1,13.18 9.2,13.2 9.3,13.28 L13.3,16.18 L11.78,11.46 C11.7,11.26 11.78,11.04 11.96,10.92 L15.96,8 L11,8 C10.8,8 10.6,7.86 10.54,7.66 L9,2.94 L7.46,7.66 C7.4,7.86 7.22,8 7,8 L2.04,8 L6.04,10.92 C6.22,11.04 6.3,11.26 6.22,11.46 L4.7,16.18 L8.7,13.28 C8.8,13.2 8.9,13.18 9,13.18 L9,13.18 Z"></path> </g> </svg>
                                    </span>
                                </a>
                                <div class="taskItem-progress-bar"></div>
                            </div>
                        </li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ol>
                    <h2 class="heading normal">
                        <a class="groupHeader">Show completed to-dos</a>
                    </h2>
                    <ol class="tasks">
                        <?php
                            if (isset($_SESSION['tasks'])) {
                                foreach ($_SESSION['tasks'] as $value) {
                                    if ($value['status'] == 0) {
                            ?>
                            <li class="taskItem done 
                                <?php 
                                    if (isset($_GET['id']) && $_GET['id'] == $value['id']) {
                                        echo 'selected';
                                    }  ?>
                            " rel="php">
                            <div class="taskItem-body">
                                <a class="taskItem-checkboxWrapper">
                                    <span>
                                        <svg class="task-checked" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"> <g> <path d="M9.5,14c-0.132,0 -0.259,-0.052 -0.354,-0.146c-1.485,-1.486 -3.134,-2.808 -4.904,-3.932c-0.232,-0.148 -0.302,-0.457 -0.153,-0.691c0.147,-0.231 0.456,-0.299 0.69,-0.153c1.652,1.049 3.202,2.266 4.618,3.621c2.964,-4.9 5.989,-8.792 9.749,-12.553c0.196,-0.195 0.512,-0.195 0.708,0c0.195,0.196 0.195,0.512 0,0.708c-3.838,3.837 -6.899,7.817 -9.924,12.902c-0.079,0.133 -0.215,0.221 -0.368,0.24c-0.021,0.003 -0.041,0.004 -0.062,0.004"></path> <path d="M15.5,18l-11,0c-1.379,0 -2.5,-1.121 -2.5,-2.5l0,-11c0,-1.379 1.121,-2.5 2.5,-2.5l10,0c0.276,0 0.5,0.224 0.5,0.5c0,0.276 -0.224,0.5 -0.5,0.5l-10,0c-0.827,0 -1.5,0.673 -1.5,1.5l0,11c0,0.827 0.673,1.5 1.5,1.5l11,0c0.827,0 1.5,-0.673 1.5,-1.5l0,-9.5c0,-0.276 0.224,-0.5 0.5,-0.5c0.276,0 0.5,0.224 0.5,0.5l0,9.5c0,1.379 -1.121,2.5 -2.5,2.5"></path> </g> </svg>
                                    </span>
                                    <form action="index.php" method="post" name="<?php echo "frmDone" . $value['id'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                        <input type="hidden" name="status" value="<?php echo $value['status'] ?>">
                                    </form>
                                </a>
                                <div class="taskItem-titleWrapper"><?php echo $value['title']?></div>
                                <span class="taskItem-duedate overdue"><?php echo $value['duedate'] ?></span>
                                <form action="index.php" method="get" name="<?php echo "frm" . $value['id'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                </form>
                                <a class="taskItem-star">
                                    <span>
                                        <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <path d="M3.74,18 C3.64,18 3.54,17.96 3.46,17.9 C3.28,17.76 3.2,17.54 3.28,17.34 L5.16,11.5 L0.2,7.9 C0.04,7.78 -0.04,7.56 0.02,7.34 C0.1,7.14 0.28,7 0.5,7 L6.64,7 L8.52,1.16 C8.66,0.76 9.34,0.76 9.48,1.16 L11.38,7 L17.5,7 C17.72,7 17.9,7.14 17.98,7.34 C18.04,7.56 17.96,7.78 17.8,7.9 L12.84,11.5 L14.72,17.34 C14.8,17.54 14.72,17.76 14.54,17.9 C14.38,18.02 14.14,18.02 13.96,17.9 L9,14.3 L4.04,17.9 C3.96,17.96 3.84,18 3.74,18 L3.74,18 Z M9,13.18 C9.1,13.18 9.2,13.2 9.3,13.28 L13.3,16.18 L11.78,11.46 C11.7,11.26 11.78,11.04 11.96,10.92 L15.96,8 L11,8 C10.8,8 10.6,7.86 10.54,7.66 L9,2.94 L7.46,7.66 C7.4,7.86 7.22,8 7,8 L2.04,8 L6.04,10.92 C6.22,11.04 6.3,11.26 6.22,11.46 L4.7,16.18 L8.7,13.28 C8.8,13.2 8.9,13.18 9,13.18 L9,13.18 Z"></path> </g> </svg>
                                    </span>
                                </a>
                            </div>
                        </li>
                        <?php
                                    }
                                }
                            }
                        ?>
                    </ol>
                </div>
            </div>
        </div>
        <?php 
            if (isset($_GET['id'])) {
                foreach ($_SESSION['tasks'] as $value) {
                    if ($_GET['id'] == $value['id']) {?>
        <div id="detail" class="animated" style="display:<?php echo (isset($_GET['id']) ? 'block' : 'none') ; ?>">           
            <div class="inner">
                <div class="top">
                    <a class="detail-checkbox checkBox">
                        <span>
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="20px" height="20px" viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;"
                                xml:space="preserve">
                                <g>
                                    <path d="M377.87,24.126C361.786,8.042,342.417,0,319.769,0H82.227C59.579,0,40.211,8.042,24.125,24.126
                                        C8.044,40.212,0.002,59.576,0.002,82.228v237.543c0,22.647,8.042,42.014,24.123,58.101c16.086,16.085,35.454,24.127,58.102,24.127
                                        h237.542c22.648,0,42.011-8.042,58.102-24.127c16.085-16.087,24.126-35.453,24.126-58.101V82.228
                                        C401.993,59.58,393.951,40.212,377.87,24.126z M365.448,319.771c0,12.559-4.47,23.314-13.415,32.264
                                        c-8.945,8.945-19.698,13.411-32.265,13.411H82.227c-12.563,0-23.317-4.466-32.264-13.411c-8.945-8.949-13.418-19.705-13.418-32.264
                                        V82.228c0-12.562,4.473-23.316,13.418-32.264c8.947-8.946,19.701-13.418,32.264-13.418h237.542
                                        c12.566,0,23.319,4.473,32.265,13.418c8.945,8.947,13.415,19.701,13.415,32.264V319.771L365.448,319.771z"/>
                                </g>
                            </svg>
                        </span>
                    </a>
                    <a class="detail-star">
                        <span class="star-wrapper">
                            <svg width="100%" height="100%" viewBox="0 0 22 49" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                                <g>
                                    <path d="M11,20.48c-0.18,0 -0.36,0.08 -0.44,0.26l-1.68,5.26l-5.54,0c-0.18,0 -0.36,0.12 -0.42,0.3c-0.06,0.2 0.02,0.4 0.16,0.5l4.46,3.24l-1.68,5.26c-0.08,0.18 0,0.38 0.16,0.5c0.06,0.06 0.16,0.1 0.24,0.1c0.1,0 0.2,-0.04 0.28,-0.1l4.46,-3.24l4.46,3.24c0.08,0.06 0.18,0.08 0.28,0.08c0.08,0 0.18,-0.02 0.24,-0.08c0.16,-0.12 0.24,-0.32 0.16,-0.5l-1.68,-5.26l4.46,-3.24c0.14,-0.1 0.22,-0.3 0.16,-0.5c-0.08,-0.18 -0.24,-0.3 -0.42,-0.3l-5.52,0l-1.7,-5.26c-0.08,-0.18 -0.26,-0.26 -0.44,-0.26ZM11,22.66l1.2,3.64l0.22,0.7l4.54,0l-3.68,2.66l0.22,0.7l1.18,3.64l-3.68,-2.66l-3.68,2.66l1.18,-3.64l0.22,-0.7l-3.68,-2.66l4.56,0l0.22,-0.7l1.18,-3.64Z"> </path>
                                </g>
                            </svg>
                        </span>
                        <span class="starred-wrapper">
                            <svg width="100%" height="100%" viewBox="0 0 22 49" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                                <g>
                                    <path d="M0,0l0,48.48c0,0.28 0.22,0.42 0.48,0.34l10.04,-3.66c0.28,-0.1 0.7,-0.1 0.96,0l10.04,3.66c0.28,0.08 0.48,-0.06 0.48,-0.34l0,-48.48l-22,0ZM14.56,30.06l1.68,5.26c0.08,0.18 0,0.38 -0.16,0.5c-0.14,0.1 -0.36,0.1 -0.52,0l-4.46,-3.24l-4.46,3.24c-0.08,0.06 -0.18,0.08 -0.28,0.08c-0.08,0 -0.18,-0.02 -0.24,-0.08c-0.16,-0.12 -0.24,-0.32 -0.16,-0.5l1.68,-5.26l-4.46,-3.24c-0.14,-0.1 -0.22,-0.32 -0.16,-0.52c0.06,-0.16 0.24,-0.3 0.42,-0.3l5.54,0l1.68,-5.26c0.14,-0.36 0.74,-0.36 0.88,0l1.7,5.26l5.5,0c0.2,0 0.36,0.14 0.44,0.3c0.06,0.2 -0.02,0.42 -0.16,0.52l-4.46,3.24Z"> </path>
                                </g>
                            </svg>
                        </span>
                    </a>
                    <div class="title-container">
                        <div class="title">
                            <span class="title-text">
                                <div class="content-fakable">
                                    <div class="display-view">
                                        <span><?php echo $value['title'] ?></span>
                                    </div>
                                    <div class="edit-view hidden">
                                        <div class="expandingArea active">
                                            <pre></pre>
                                            <textarea></textarea>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="section section-item detail-date editing">
                        <form action="index.php" method="post" name="frmDueDate">
                            <input type="hidden" name="duedate">
                            <input type="hidden" name='id' value="<?php echo $value['id']?>">
                        </form>
                        <div class="section-icon">
                            <svg class="date" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="date"> <path d="M2.5,7 C2.22,7 2,6.78 2,6.5 L2,3.5 C2,2.68 2.68,2 3.5,2 L16.5,2 C17.32,2 18,2.68 18,3.5 L18,6.5 C18,6.78 17.78,7 17.5,7 L2.5,7 Z M3,6 L17,6 L17,3.5 C17,3.22 16.78,3 16.5,3 L3.5,3 C3.22,3 3,3.22 3,3.5 L3,6 Z M3.5,18 C2.68,18 2,17.32 2,16.5 L2,8.5 C2,8.22 2.22,8 2.5,8 C2.78,8 3,8.22 3,8.5 L3,16.5 C3,16.78 3.22,17 3.5,17 L16.5,17 C16.78,17 17,16.78 17,16.5 L17,8.5 C17,8.22 17.22,8 17.5,8 C17.78,8 18,8.22 18,8.5 L18,16.5 C18,17.32 17.32,18 16.5,18 L3.5,18 Z M8.5,12 C7.68,12 7,11.32 7,10.5 L7,9.5 C7,8.68 7.68,8 8.5,8 C9.32,8 10,8.68 10,9.5 L10,10.5 C10,11.32 9.32,12 8.5,12 L8.5,12 Z M5.5,11 C5.22,11 5,10.78 5,10.5 L5,9.5 C5,9.22 5.22,9 5.5,9 C5.78,9 6,9.22 6,9.5 L6,10.5 C6,10.78 5.78,11 5.5,11 L5.5,11 Z M8.5,9 C8.22,9 8,9.22 8,9.5 L8,10.5 C8,10.78 8.22,11 8.5,11 C8.78,11 9,10.78 9,10.5 L9,9.5 C9,9.22 8.78,9 8.5,9 L8.5,9 Z M11.5,11 C11.22,11 11,10.78 11,10.5 L11,9.5 C11,9.22 11.22,9 11.5,9 C11.78,9 12,9.22 12,9.5 L12,10.5 C12,10.78 11.78,11 11.5,11 L11.5,11 Z M14.5,11 C14.22,11 14,10.78 14,10.5 L14,9.5 C14,9.22 14.22,9 14.5,9 C14.78,9 15,9.22 15,9.5 L15,10.5 C15,10.78 14.78,11 14.5,11 L14.5,11 Z M5.5,15 C5.22,15 5,14.78 5,14.5 L5,13.5 C5,13.22 5.22,13 5.5,13 C5.78,13 6,13.22 6,13.5 L6,14.5 C6,14.78 5.78,15 5.5,15 L5.5,15 Z M8.5,15 C8.22,15 8,14.78 8,14.5 L8,13.5 C8,13.22 8.22,13 8.5,13 C8.78,13 9,13.22 9,13.5 L9,14.5 C9,14.78 8.78,15 8.5,15 L8.5,15 Z M11.5,15 C11.22,15 11,14.78 11,14.5 L11,13.5 C11,13.22 11.22,13 11.5,13 C11.78,13 12,13.22 12,13.5 L12,14.5 C12,14.78 11.78,15 11.5,15 L11.5,15 Z M14.5,15 C14.22,15 14,14.78 14,14.5 L14,13.5 C14,13.22 14.22,13 14.5,13 C14.78,13 15,13.22 15,13.5 L15,14.5 C15,14.78 14.78,15 14.5,15 L14.5,15 Z"></path> </g> </g> </svg>
                        </div>
                        <div class="section-content">
                            <div class="section-title">
                            <?php echo $value['duedate'] ?>
                                <div class="section-description"></div>
                            </div>
                            <input type="text" class="detail-date-input" style="display:none;" value="">
                            
                        </div>
                        <a class="section-delete">
                                <svg class="delete" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                    <g id="delete">
                                        <path d="M10.72,9.9975 L13.86,6.8575 C14.04,6.6575 14.04,6.3375 13.86,6.1375 C13.66,5.9575 13.34,5.9575 13.14,6.1375 L10,9.2775 L6.86,6.1375 C6.66,5.9575 6.34,5.9575 6.14,6.1375 C5.96,6.3375 5.96,6.6575 6.14,6.8575 L9.28,9.9975 L6.14,13.1375 C5.96,13.3375 5.96,13.6575 6.14,13.8575 C6.24,13.9575 6.38,13.9975 6.5,13.9975 C6.62,13.9975 6.76,13.9575 6.86,13.8575 L10,10.7175 L13.14,13.8575 C13.24,13.9575 13.38,13.9975 13.5,13.9975 C13.62,13.9975 13.76,13.9575 13.86,13.8575 C14.04,13.6575 14.04,13.3375 13.86,13.1375 L10.72,9.9975 Z" id="4"></path>
                                    </g>
                                    </g>
                                </svg>
                        </a>
                    </div>
                    <div class="section section-item detail-reminder date">
                        <div class="section-icon date">
                            <svg class="reminder" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="reminder"> <path d="M3.26,6.6 C3.1,6.24 3,5.88 3,5.5 C3,4.12 4.12,3 5.5,3 C6.04,3 6.54,3.18 6.98,3.5 C7.2,3.66 7.52,3.62 7.68,3.4 C7.86,3.18 7.8,2.86 7.58,2.7 C6.98,2.24 6.24,2 5.5,2 C3.58,2 2,3.58 2,5.5 C2,6.02 2.12,6.54 2.38,7.04 C2.46,7.22 2.64,7.32 2.82,7.32 C2.9,7.32 2.98,7.3 3.04,7.28 C3.3,7.14 3.4,6.84 3.26,6.6 L3.26,6.6 Z M14.5,2 C13.76,2 13.04,2.24 12.42,2.7 C12.2,2.86 12.16,3.18 12.32,3.4 C12.48,3.62 12.8,3.66 13.02,3.5 C13.46,3.18 13.98,3 14.5,3 C15.88,3 17,4.12 17,5.5 C17,5.88 16.92,6.24 16.74,6.6 C16.62,6.84 16.72,7.14 16.96,7.28 C17.04,7.3 17.1,7.32 17.18,7.32 C17.36,7.32 17.54,7.22 17.64,7.04 C17.88,6.54 18,6.02 18,5.5 C18,3.58 16.44,2 14.5,2 L14.5,2 Z M17,11 C17,7.14 13.86,4 10,4 C6.14,4 3,7.14 3,11 C3,13 3.84,14.82 5.2,16.1 L4.14,17.14 C3.96,17.34 3.96,17.66 4.14,17.86 C4.24,17.96 4.38,18 4.5,18 C4.62,18 4.76,17.96 4.86,17.86 L5.98,16.72 C7.12,17.52 8.5,18 10,18 C11.5,18 12.88,17.52 14.02,16.72 L15.14,17.86 C15.24,17.96 15.38,18 15.5,18 C15.62,18 15.76,17.96 15.86,17.86 C16.04,17.66 16.04,17.34 15.86,17.14 L14.8,16.1 C16.16,14.82 17,13 17,11 L17,11 Z M4,11 C4,7.7 6.7,5 10,5 C13.3,5 16,7.7 16,11 C16,14.3 13.3,17 10,17 C6.7,17 4,14.3 4,11 L4,11 Z M10.5,7 C10.22,7 10,7.22 10,7.5 L10,11 L7.46,11 C7.2,11 6.96,11.22 6.96,11.5 C6.96,11.78 7.2,12 7.46,12 L10.5,12 C10.78,12 11,11.78 11,11.5 L11,7.5 C11,7.22 10.78,7 10.5,7 L10.5,7 Z" id="…"></path> </g> </g> </svg>
                        </div>
                        <div class="section-content">
                            <div class="section-title repeat">
                            <?php echo $value['reminder_date'] ?>
                            </div>
                            <div class="section-description repeat"></div>
                        </div>
                        <a class="section-delete">
                                <svg class="delete" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                    <g id="delete">
                                        <path d="M10.72,9.9975 L13.86,6.8575 C14.04,6.6575 14.04,6.3375 13.86,6.1375 C13.66,5.9575 13.34,5.9575 13.14,6.1375 L10,9.2775 L6.86,6.1375 C6.66,5.9575 6.34,5.9575 6.14,6.1375 C5.96,6.3375 5.96,6.6575 6.14,6.8575 L9.28,9.9975 L6.14,13.1375 C5.96,13.3375 5.96,13.6575 6.14,13.8575 C6.24,13.9575 6.38,13.9975 6.5,13.9975 C6.62,13.9975 6.76,13.9575 6.86,13.8575 L10,10.7175 L13.14,13.8575 C13.24,13.9575 13.38,13.9975 13.5,13.9975 C13.62,13.9975 13.76,13.9575 13.86,13.8575 C14.04,13.6575 14.04,13.3375 13.86,13.1375 L10.72,9.9975 Z" id="4"></path>
                                    </g>
                                    </g>
                                </svg>
                        </a>
                    </div>
                    <div class="section subtasks">
                        <ul>
                            <?php
                            if (count($value['subtasks']) > 0) {
                                $subtasks = $value['subtasks'];
                                foreach ($subtasks as $subtask) {
                            ?>
                            <li class="section-item subtask">
                                <div class="section-icon">
                                    <a class="subtask-checkbox checkBox <?php echo $subtask[1]==1 ? '' : 'checked' ; ?>">
                                        <svg class="task-check" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.41421;"> <g> <path d="M17.5,4.5c0,-0.53 -0.211,-1.039 -0.586,-1.414c-0.375,-0.375 -0.884,-0.586 -1.414,-0.586c-2.871,0 -8.129,0 -11,0c-0.53,0 -1.039,0.211 -1.414,0.586c-0.375,0.375 -0.586,0.884 -0.586,1.414c0,2.871 0,8.129 0,11c0,0.53 0.211,1.039 0.586,1.414c0.375,0.375 0.884,0.586 1.414,0.586c2.871,0 8.129,0 11,0c0.53,0 1.039,-0.211 1.414,-0.586c0.375,-0.375 0.586,-0.884 0.586,-1.414c0,-2.871 0,-8.129 0,-11Z" style="fill:none;stroke-width:1px"></path> </g> </svg>
                                        <svg class="task-checked" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"> <g> <path d="M9.5,14c-0.132,0 -0.259,-0.052 -0.354,-0.146c-1.485,-1.486 -3.134,-2.808 -4.904,-3.932c-0.232,-0.148 -0.302,-0.457 -0.153,-0.691c0.147,-0.231 0.456,-0.299 0.69,-0.153c1.652,1.049 3.202,2.266 4.618,3.621c2.964,-4.9 5.989,-8.792 9.749,-12.553c0.196,-0.195 0.512,-0.195 0.708,0c0.195,0.196 0.195,0.512 0,0.708c-3.838,3.837 -6.899,7.817 -9.924,12.902c-0.079,0.133 -0.215,0.221 -0.368,0.24c-0.021,0.003 -0.041,0.004 -0.062,0.004"></path> <path d="M15.5,18l-11,0c-1.379,0 -2.5,-1.121 -2.5,-2.5l0,-11c0,-1.379 1.121,-2.5 2.5,-2.5l10,0c0.276,0 0.5,0.224 0.5,0.5c0,0.276 -0.224,0.5 -0.5,0.5l-10,0c-0.827,0 -1.5,0.673 -1.5,1.5l0,11c0,0.827 0.673,1.5 1.5,1.5l11,0c0.827,0 1.5,-0.673 1.5,-1.5l0,-9.5c0,-0.276 0.224,-0.5 0.5,-0.5c0.276,0 0.5,0.224 0.5,0.5l0,9.5c0,1.379 -1.121,2.5 -2.5,2.5"></path> </g> </svg>
                                        <form action="index.php" method="post" name="<?php echo $subtask[0] ?>">
                                            <input type="hidden" name="statusSubtaskTitle" value="<?php echo $subtask[0] ?>">
                                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                        </form>
                                    </a>
                                </div>
                                <div class="section-content">
                                    <div class="section-title">
                                        <div class="content-fakable">
                                            <div class="display-view">
                                                <span style="<?php echo $subtask[1]==1 ? '' : 'text-decoration:line-through' ; ?>"><?php echo $subtask[0] ?></span>
                                            </div>
                                            <div class="edit-view hidden">
                                                <div class="expandingArea">
                                                    <pre style="line-height:20px;font-size:15px;"></pre>
                                                    <form action="index.php" method="post" >
                                                        <textarea style="line-height:20px;font-size:15px;" name="editSubtask"></textarea>
                                                        <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }}
                            ?>
                        </ul>
                        <div class="section-item subtask-add">
                            <div class="section-icon">
                                <svg class="plus-small" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <path d="M10,10l0,6.5c-0.003,0.053 -0.008,0.103 -0.024,0.155c-0.038,0.116 -0.12,0.217 -0.226,0.278c-0.047,0.027 -0.094,0.042 -0.146,0.056c-0.052,0.008 -0.051,0.008 -0.104,0.011c-0.053,-0.003 -0.103,-0.008 -0.155,-0.024c-0.15,-0.05 -0.271,-0.171 -0.321,-0.321c-0.016,-0.052 -0.021,-0.102 -0.024,-0.155l0,-6.5l-6.5,0c-0.046,-0.002 -0.058,-0.001 -0.104,-0.011c-0.103,-0.022 -0.197,-0.076 -0.268,-0.154c-0.169,-0.188 -0.169,-0.482 0,-0.67c0.035,-0.038 0.077,-0.072 0.122,-0.098c0.078,-0.045 0.161,-0.062 0.25,-0.067l6.5,0l0,-6.5c0.005,-0.089 0.022,-0.172 0.067,-0.25c0.126,-0.219 0.406,-0.31 0.636,-0.207c0.048,0.022 0.093,0.05 0.132,0.085c0.078,0.071 0.132,0.165 0.154,0.268c0.01,0.046 0.009,0.058 0.011,0.104l0,6.5l6.5,0c0.046,0.002 0.058,0.001 0.104,0.011c0.103,0.022 0.197,0.076 0.268,0.154c0.169,0.188 0.169,0.482 0,0.67c-0.035,0.038 -0.077,0.072 -0.122,0.098c-0.078,0.045 -0.161,0.062 -0.25,0.067l-6.5,0Z"></path> </g> </svg>
                            </div>
                            <div class="section-content top">
                                <div class="section-title">Add a subtask</div>
                                <div class="section-edit hidden">
                                    <div class="expandingArea">
                                        <pre style="line-height:20px;font-size:15px;">Add a subtask</pre>
                                        <form action="index.php" method="post">
                                            <textarea style="line-height:20px;font-size:15px;" placeholder="Add a subtask" name="addSubtask"></textarea>
                                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section section-item note">
                        <div class="section-icon">
                            <svg class="options rtl-flip" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="options"> <path d="M17.1330617,2.8594383 C15.9930617,1.7194383 14.0130617,1.7194383 12.8930617,2.8594383 L5.5130617,10.2394383 C5.3330617,10.4394383 5.3330617,10.7594383 5.5130617,10.9594383 C5.7130617,11.1394383 6.0330617,11.1394383 6.2330617,10.9594383 L13.5930617,3.5594383 C14.3530617,2.7994383 15.6730617,2.7994383 16.4130617,3.5594383 C17.1730617,4.3194383 17.1930617,5.5594383 16.4130617,6.3394383 L9.0330617,13.7594383 C8.7130617,14.0794383 8.9330617,14.6194383 9.3730617,14.6194383 C9.5130617,14.6194383 9.6330617,14.5594383 9.7330617,14.4594383 L17.1330617,7.0394383 C18.2930617,5.8794383 18.2930617,4.0194383 17.1330617,2.8594383 L17.1330617,2.8594383 Z M8.4930617,15.3594383 C8.0330617,13.4594383 6.5130617,11.9394383 4.6130617,11.4794383 C4.3530617,11.4194383 4.0930617,11.5794383 4.0130617,11.8194383 L2.0330617,17.3194383 C1.8730617,17.7194383 2.2730617,18.1194383 2.6730617,17.9594383 C8.6730617,15.7794383 8.2530617,15.9594383 8.3730617,15.8194383 C8.4930617,15.6994383 8.5330617,15.5194383 8.4930617,15.3594383 L8.4930617,15.3594383 Z M3.3330617,16.6594383 L4.8130617,12.5794383 C6.0130617,12.9994383 6.9730617,13.9794383 7.3930617,15.1794383 L3.3330617,16.6594383 Z" id="N"></path> </g> </g> </svg>
                        </div>
                        <div class="section-content top">
                            <div class="section-title note-add">Add a note...</div>
                            <div class="note-body selectable hidden"></div>
                        </div>
                        <div class="section-attachments">
                            <a class="open-fullscreen-note">
                                <svg class="fullscreen" width="20px" height="20px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"> <g> <path d="M12.5,10c-0.276,0-0.5,0.224-0.5,0.5v3c0,0.275-0.225,0.5-0.5,0.5h-6C5.224,14,5,13.775,5,13.5v-6 C5,7.224,5.224,7,5.5,7h3C8.776,7,9,6.776,9,6.5S8.776,6,8.5,6h-3C4.673,6,4,6.673,4,7.5v6C4,14.327,4.673,15,5.5,15h6 c0.827,0,1.5-0.673,1.5-1.5v-3C13,10.224,12.776,10,12.5,10z"></path> <path d="M14.962,4.309c-0.051-0.122-0.148-0.22-0.271-0.271C14.63,4.013,14.565,4,14.5,4h-4 C10.224,4,10,4.224,10,4.5S10.224,5,10.5,5h2.793l-5.146,5.146c-0.195,0.195-0.195,0.512,0,0.707C8.244,10.951,8.372,11,8.5,11 s0.256-0.049,0.354-0.146L14,5.707V8.5C14,8.776,14.224,9,14.5,9S15,8.776,15,8.5v-4C15,4.435,14.987,4.37,14.962,4.309z"></path> </g> </svg>
                            </a>
                        </div>
                    </div>
                    <div class="section section-files">
                        <div class="section-item files-add">
                            <div class="section-icon add-file">
                                <svg class="clip" width="20" height="20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"> <g> <path id="XMLID_2_" d="M7,17c-1.335,0-2.591-0.521-3.536-1.465S2,13.336,2,12c0-1.335,0.52-2.591,1.464-3.536l5.312-5.312 c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707L4.171,9.171C3.416,9.927,3,10.932,3,12s0.416,2.073,1.171,2.828 c1.511,1.512,4.146,1.512,5.657,0l6.441-6.441c0.473-0.472,0.732-1.1,0.732-1.768c0-0.668-0.26-1.296-0.732-1.768 c-0.945-0.945-2.592-0.943-3.535,0l-6.441,6.441c-0.39,0.39-0.39,1.024,0,1.414c0.378,0.377,1.036,0.377,1.414,0l4.562-4.562 c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707l-4.562,4.562c-0.755,0.756-2.073,0.756-2.828,0 c-0.78-0.779-0.78-2.049,0-2.828l6.441-6.441c1.32-1.321,3.627-1.323,4.949,0c0.661,0.661,1.025,1.54,1.025,2.475 s-0.364,1.814-1.025,2.475l-6.441,6.441C9.591,16.479,8.335,17,7,17z"></path> </g> </svg>
                            </div>
                            <div class="section-content">
                                <div class="section-title files-add-label">Add a file</div>
                            </div>
                            <div class="section-attachments">
                                <span class="add-sound">
                                    <svg class="speech" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="speech"> <path d="M10,13 C11.92,13 13.5,11.42 13.5,9.5 L13.5,5.5 C13.5,3.58 11.92,2 10,2 C8.08,2 6.5,3.58 6.5,5.5 L6.5,9.5 C6.5,11.42 8.08,13 10,13 L10,13 Z M7.5,5.5 C7.5,4.12 8.62,3 10,3 C11.38,3 12.5,4.12 12.5,5.5 L12.5,9.5 C12.5,10.88 11.38,12 10,12 C8.62,12 7.5,10.88 7.5,9.5 L7.5,5.5 Z M15.5,8.5 C15.5,8.22 15.28,8 15,8 C14.72,8 14.5,8.22 14.5,8.5 L14.5,9.5 C14.5,11.98 12.48,14 10,14 C7.52,14 5.5,11.98 5.5,9.5 L5.5,8.5 C5.5,8.22 5.28,8 5,8 C4.72,8 4.5,8.22 4.5,8.5 L4.5,9.5 C4.5,12.36 6.7,14.72 9.5,14.98 L9.5,17 L6,17 C5.72,17 5.5,17.22 5.5,17.5 C5.5,17.78 5.72,18 6,18 L14,18 C14.28,18 14.5,17.78 14.5,17.5 C14.5,17.22 14.28,17 14,17 L10.5,17 L10.5,14.98 C13.3,14.72 15.5,12.36 15.5,9.5 L15.5,8.5 Z" id="O"></path> </g> </g> </svg>
                                </span>
                                <div class="add-dropbox">
                                        <svg class="dropbox" width="20" height="20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"> <g> <polygon points="6.515,2.227 1.535,5.478 4.979,8.236 10,5.135 "></polygon> <polygon points="1.535,10.994 6.515,14.245 10,11.336 4.979,8.236 "></polygon> <polygon points="10,11.336 13.485,14.245 18.465,10.994 15.021,8.236 "></polygon> <polygon points="18.465,5.478 13.485,2.227 10,5.135 15.021,8.236 "></polygon> <polygon points="10.01,11.962 6.515,14.862 5.02,13.886 5.02,14.981 10.01,17.973 15.001,14.981 15.001,13.886 13.505,14.862"></polygon> </g> </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bottom">
                    <a class="detail-close">
                        <svg class="close-right" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="close-right"> <path d="M4.5,18 C3.12,18 2,16.88 2,15.5 L2,4.5 C2,3.12 3.12,2 4.5,2 L15.5,2 C16.88,2 18,3.12 18,4.5 L18,15.5 C18,16.88 16.88,18 15.5,18 L4.5,18 Z M4.5,3 C3.68,3 3,3.68 3,4.5 L3,15.5 C3,16.32 3.68,17 4.5,17 L15.5,17 C16.32,17 17,16.32 17,15.5 L17,4.5 C17,3.68 16.32,3 15.5,3 L4.5,3 Z M7.5,15 C7.38,15 7.24,14.96 7.14,14.86 C6.96,14.66 6.96,14.34 7.14,14.14 L11.3,10 L7.14,5.86 C6.96,5.66 6.96,5.34 7.14,5.14 C7.34,4.96 7.66,4.96 7.86,5.14 L12.36,9.64 C12.54,9.84 12.54,10.16 12.36,10.36 L7.86,14.86 C7.76,14.96 7.62,15 7.5,15 L7.5,15 Z" id="i"></path> </g> </g> </svg>
                    </a>
                    <a class="detail-trash">
                        <svg class="trash" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="trash"> <path d="M12,3.5 C12,2.4 11.1,1.5 10,1.5 C8.9,1.5 8,2.4 8,3.5 L5.5,3.5 C4.68,3.5 4,4.18 4,5 L4,7 C4,7.28 4.22,7.5 4.5,7.5 L15.5,7.5 C15.78,7.5 16,7.28 16,7 L16,5 C16,4.18 15.32,3.5 14.5,3.5 L12,3.5 Z M10,2.5 C10.56,2.5 11,2.94 11,3.5 L9,3.5 C9,2.94 9.44,2.5 10,2.5 L10,2.5 Z M15,6.5 L5,6.5 L5,5 C5,4.72 5.22,4.5 5.5,4.5 L14.5,4.5 C14.78,4.5 15,4.72 15,5 L15,6.5 Z M14.5,8.5 C14.22,8.5 14,8.72 14,9 L14,16 C14,16.28 13.78,16.5 13.5,16.5 L6.5,16.5 C6.22,16.5 6,16.28 6,16 L6,9 C6,8.72 5.78,8.5 5.5,8.5 C5.22,8.5 5,8.72 5,9 L5,16 C5,16.82 5.68,17.5 6.5,17.5 L13.5,17.5 C14.32,17.5 15,16.82 15,16 L15,9 C15,8.72 14.78,8.5 14.5,8.5 L14.5,8.5 Z M9,9 C9,8.72 8.78,8.5 8.5,8.5 C8.22,8.5 8,8.72 8,9 L8,15 C8,15.28 8.22,15.5 8.5,15.5 C8.78,15.5 9,15.28 9,15 L9,9 Z M12,9 C12,8.72 11.78,8.5 11.5,8.5 C11.22,8.5 11,8.72 11,9 L11,15 C11,15.28 11.22,15.5 11.5,15.5 C11.78,15.5 12,15.28 12,15 L12,9 Z" id="j"></path> </g> </g> </svg>
                    </a>
                    <div class="comments">
                        <div class="comments-bottom">
                            <div class="last-comment hidden"></div>
                            <div class="comments-add">
                                <div class="input-fake">
                                    <div class="expandingArea active">
                                        <pre style="line-height:20px; font-size:15px;"><span></span><br></pre>
                                        <textarea placeholder="Add a comment..." style="line-height: 20px; font-size: 15px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-info">Creatd on Sun, January 13</div>
                </div>
            </div>
        </div>
        <?php }}} ?>
    </div>
    <div id="user-popover" class="popover bottom">
        <div class="inner">
            <div class="content">
                <ul class="list-menu">
                    <li class="last-sync disabled">
                        <span>Last sync 2 minutes ago</span>
                    </li>
                    <li class="separator">
                        <a class="sync-now">Sync now</a>
                    </li>
                    <li>
                        <a id="account-settings">Account Settings</a>
                    </li>
                    <li>
                        <a>Change Background</a>
                    </li>
                    <li class="separator">
                        <a>Restore deleted lists</a>
                    </li>
                    <li>
                        <a>Tell Your Friends...</a>
                    </li>
                    <li class="separator">
                        <a>Wunderlist Website</a>
                    </li>
                    <li class="email disabled">phammanhha305@gmail.com</li>
                    <li>
                        <a class="logout">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</body>
<script></script>
</html>