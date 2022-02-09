<?php if (!isset($_GET['tasks'])) : ?>
    echo "You are not allowed to view this.";
<?php else : ?>
    <?php
    $tskid = $_GET['viewtask'];
    $taskquery = mysqli_query($db, "SELECT * FROM tasks WHERE ID='$tskid'");
    $result = mysqli_fetch_array($taskquery);
    if (($user != $result['assigned_to']) && ($user != $result['created_by'])) {
        echo "You are not allowed to view this";
    } else {
    ?>
        <script>
            var title = 'Task #<?php echo $tskid; ?>';
        </script>
        <div class="maincontent">
            <div class="flex flex-col gap-2 w-full">
                <div class="header z-[50] fadeInTop">
                    <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
                    <h1>Task View</h1>
                </div>
            </div>
            <form action="includes/backend/updatetask.php" method="POST" id="taskupdate" class="flex flex-col gap-4">
                <input type="text" value="<?php echo $result['ID']; ?>" name="id" hidden>
                <input type="text" value="<?php echo $user; ?>" name="user" hidden>
                <div class="flex flex-col gap-4 w-full dark:bg-stone-600 bg-stone-300 p-4 rounded-lg smooth shadow-main fadeInBottom">
                    <div class="flex justify-between items-center w-full">
                        <div>
                            <h1 class="dark:text-stone-100 smooth">Task #<?php echo $result['ID']; ?> • <span class="font-normal text-sm text-stone-500 dark:text-stone-400"><em>created at: <?php echo $result['created_on']; ?></span></em> </h1>
                            <h2 class="text-2xl text-lime-700 dark:text-lime-500 font-bold smooth"><?php echo $result['task_subject'] ?></h2>
                        </div>
                        <div class="flex gap-4">
                            <p class="p-4 bg-transparent border-current border rounded-lg"><?php echo $result['design_status'] ?></p>
                            <button type="submit" class="btn-primary 
                            <?php if ($result['post_status'] == 'Posted') {
                                echo 'hidden';
                            } ?>" id="update" form="taskupdate">Update</button>
                            <?php if (($result['created_by'] == $user) && $result['design_status'] != "Approved") : ?>
                                <a href="<?php echo $site . '?tasks=' . $user . '&delete=' . $result['ID']; ?>" class="p-4 bg-red-500 hover:bg-red-700 rounded-lg text-white" onclick="return confirm('Are you sure you want to delete it?')"><i class="fas fa-trash"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div>
                        <p>Task Assignee: <span class="font-bold"><?php echo $result['created_by']; ?></span></p>
                        <p>Assigned to: <span class="font-bold"><?php echo $result['assigned_to']; ?></span></p>
                        <?php if (isset($result['design_started'])) : ?>
                            <span class="font-normal text-sm text-stone-500 dark:text-stone-400"><em>Started at: <?php echo $result['design_started']; ?></span></em>
                        <?php endif; ?>
                        <?php if (isset($result['design_finished'])) : ?>
                            <br>
                            <span class="font-normal text-sm text-stone-500 dark:text-stone-400"><em>Submitted at: <?php echo $result['design_finished']; ?></span></em>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        <div class="task-status">
                            <p class="font-bold text-lime-600 dark:text-lime-700">Design Status:</p>
                            <select name="design_status" id="design_status" class="dark:bg-white smooth" <?php if ($result['design_status'] == "Approved") {
                                                                                                                echo "disabled";
                                                                                                            } ?>>
                                <option value="<?php echo $result['design_status']; ?>" hidden><?php echo $result['design_status']; ?></option>
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Submitted for review">Submitted for review</option>
                                <option value="Approved">Approved</option>
                            </select>
                        </div>
                        <div class="task-status">
                            <p class="font-bold text-lime-600 dark:text-lime-700">Post/Print Status:</p>
                            <select name="post_status" id="post_status" class="dark:bg-white smooth" <?php if ($result['post_status'] == "Posted") {
                                                                                                            echo "disabled";
                                                                                                        } ?>>
                                <option value="<?php echo $result['post_status']; ?>" hidden><?php echo $result['post_status']; ?></option>
                                <option value="Pending">Pending</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Printing">Printing</option>
                                <option value="Posted">Posted</option>
                            </select>
                        </div>
                        <div class="task-status">
                            <p class="font-bold text-lime-600 dark:text-lime-700">Company:</p>
                            <span class=""><?php echo $result['company']; ?></span>
                        </div>
                    </div>
                    <fieldset class="rounded-lg w-full">
                        <legend class="">Task Details</legend>
                        <textarea <?php
                                    if (($user != $result['created_by']) || ($result['post_status'] == "Posted")) {
                                        echo "disabled";
                                    } else {
                                        echo "";
                                    }; ?> name="task_details" id="task_details" class="w-full h-auto box text-lg dark:text-white" rows="5"><?php echo $result['task_details']; ?></textarea>
                    </fieldset>
                    <fieldset class="rounded-lg w-full">
                        <legend class="flex items-center gap-2 text-xl"><i class="fas fa-square-exclamation text-2xl fa-swap-opacity" id="remarksicon"></i> Remarks</legend>
                        <script>

                        </script>
                        <textarea <?php if (($user != $result['created_by']) || ($result['post_status'] == "Posted")) {
                                        echo "disabled";
                                    } else {
                                        echo "";
                                    }; ?> name="remarks" id="remarks" rows="2" class="w-full h-auto box text-lg dark:text-white"><?php echo $result['remarks']; ?></textarea>
                        <script>
                            if ($('#remarks').val() == ""){
                                $("#remarksicon").addClass('text-yellow-500').removeClass('text-lime-600');
                            } else {
                                $("#remarksicon").addClass('text-lime-600').removeClass('text-yellow-500');
                            }
                        </script>
                    </fieldset>
                </div>
            </form>
        </div>
        <?php if (($_SESSION['dh_user'] != "superadmin") || $_COOKIE['dh_user'] != "superadmin") : ?>
            <div class="flex flex-col gap-4 w-full dark:bg-stone-600 bg-stone-300 p-4 rounded-lg smooth shadow-main fadeInBottom">
                <fieldset class="rounded-lg w-full flex flex-col gap-4">
                    <legend class="flex items-center gap-2 text-xl"><i class="fad fa-comment-alt-exclamation text-2xl dark:text-yellow-500 text-yellow-600 fa-swap-opacity"></i>Comments</legend>
                    <div class="flex flex-col gap-2">
                        <?php
                        $commentquery = $db->query("SELECT * FROM task_comments WHERE task_id='$tskid'");
                        ?>
                        <?php foreach($commentquery as $row) : ?>
                        <div class="w-full <?php if($_SESSION['dh_user'] == $row['user']){ echo "bg-gray-transparent"; } else { echo "bg-gray-100"; } ?> p-4 rounded-lg flex flex-col gap-2">
                            <h3 class="text-xl font-bold <?php if($_SESSION['dh_user'] == $row['user']){ echo "text-lime-600"; } else { echo "text-lime-600"; } ?>"><?php  if ($user == $row['user']){ echo "You"; } else { echo $row['created_by']; } ?> <span class=" text-md font-normal <?php if($_SESSION['dh_user'] == $row['user']){ echo "text-stone-500"; } else { echo "text-stone-900/50"; } ?> text-sm"><?php if ($user == $row['user']){ echo "said"; } else { echo "commented"; } ?></span></h3>
                            <div class="flex flex-col gap-1">
                                <textarea disabled class="<?php if($_SESSION['dh_user'] == $row['user']){ echo "bg-gray-200/50 text-stone-800 dark:text-stone-800"; } else { echo "bg-gray-300 dark:text-stone-700 text-stone-700"; } ?>"><?php echo $row['comment']; ?></textarea>
                                <p class="<?php if($_SESSION['dh_user'] == $row['user']){ echo "text-stone-800 dark:text-stone-800"; } else { echo "dark:text-stone-700 text-stone-700"; } ?> text-xs">
                                <?php if ($user == $row['user'] ) : ?>
                                <a href="<?php echo $site.'includes/backend/comment-delete.php/?delete='.$row['ID'].'&tasks='.$user.'&viewtask='.$tskid; ?>" class="dark:text-stone-400 text-stone-400 hover:text-red-500 hover:dark:text-red-500" onclick="return confirm('Are you sure you want to delete?')">
                                <i class="fas fa-trash"></i> delete</a>
                                 • 
                                 <?php endif; ?>
                                <?php echo $row['created_on']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <form action="includes/backend/comment-process.php" method="POST" class="flex gap-2">
                            <input type="text" name="taskid" id="taskid" value="<?php echo $result['ID']; ?>" hidden>
                            <textarea onkeyup="success()" name="comment" id="comment" rows="2" class="w-full bg-stone-200" placeholder="Write a comment..."></textarea>
                            <button type="submit" class="btn-primary disabled:dark:bg-gray-400 disabled:bg-gray-400 disabled:hover:scale-100 disabled:shadow-none" id="send" disabled>Send <i class="fas fa-paper-plane"></i></button>
                            <script>
                                function success() {
                                    if (document.getElementById("comment").value === "") {
                                        document.getElementById('send').disabled = true;
                                    } else {
                                        document.getElementById('send').disabled = false;
                                    }
                                }
                            </script>
                        </form>
                    </div>
                </fieldset>
            </div>
        <?php endif; ?>
    <?php }; ?>
<?php endif;  ?>