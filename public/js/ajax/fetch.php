<?php
session_start();
include '../../includes/dbconnection.php';
include '../../includes/globalvar.php';
$user = $_SESSION['dh_user'];
$sql = "SELECT * FROM tasks WHERE task_subject LIKE '%".$_POST['search']."%'";
$result = mysqli_query($db, $sql);
$output = '';
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        $output .= '
        <div class="flex flex-col border border-stone-300 dark:border-stone-400 p-4 rounded-lg shadow-main relative fadeInBottom">
            <h2 class="text-lg font-bold dark:text-lime-400 truncate">'.$row['task_subject'].'</h2>
            <p>Assignee: <span class="font-bold text-lime-700 dark:text-lime-500">'.$row['created_by'].'</span></p>
            <p>Assigned to: <span class="font-bold text-lime-700 dark:text-lime-500">'.$row['assigned_to'].'</span></p>
            <div class="flex gap-2 justify-between w-full items-center">
                <span class="text-xs dark:text-stone-100/30 text-stone-500">'.$row['created_on'].'</span>
                <div class="flex gap-3">
                    <a href="?tasks=' . $user . '&viewtask=' . $row['ID'].'" class="">
                        <i class="fas fa-eye text-stone-500 hover:text-lime-700 hover:dark:text-lime-600" title="View note"></i>
                    </a>
                </div>
            </div>
        </div>
        ';
        
    }
    echo $output;
} else {
    echo '
    <div class="w-full grid grid-cols-1">
        <div class="searchresults">
            <p class="font-bold ">No Results Found!</p>
        </div>
    </div>
    ';
}
