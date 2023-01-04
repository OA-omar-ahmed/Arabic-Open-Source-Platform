<?php include_once "../control/proj_comments.php"; ?>




<div class="comment_box">
	 
	<h2>التعليقات <?php echo "<a href='?Co&view_id=" . @$_REQUEST['view_id'] . "'>(" . @$num_comments . ") " . " </a>"; ?></h2>

	<div class="user_comment" id="postComments_1647172642" style="">
		<?php while ($record_row_comment = $database->fetch_array($record_result_comment)) {  ?>
			<table style="width:100%;margin:5px 0px;" id="comment_1646403680" class="uComment">
				<tbody>
					<tr>
						<td style="width:50px;position:relative">
							<div class=" ">
								<img class="user_comment_img" src="<?php echo get_user_photo_by_id($record_row_comment[0]); ?>" width="30" height="30" />
							</div>
						</td>
						<td><a class="userLinkComment" <?php echo " href=\"user_setting.php?Co=1&view_id=" . urlencode($record_row_comment['user_id']) . "\">"; ?> <b>@<?php echo @$get_user_info ? secure_outputs_oa($get_user_info->get_user_name_by_id($record_row_comment['user_id'])) : "Please login to see username"; ?></b>
							</a><span><span style="color: #03A9F4;" data-toggle="tooltip" data-placement="top" title="Verified page" class="fa fa-check-circle verifyUser"></span> </span>
							<p style="word-break: break-word;" id="commentContent_1646403680">
								&nbsp;&nbsp;&nbsp;<span class="spanComment"><?php echo "" . secure_outputs_oa($record_row_comment['comment']); ?></span><br>
							</p><small style="margin: 0; padding: 0;">
								<span class="
				"><?php echo "" . secure_outputs_oa($record_row_comment['date']); ?></span><span id="editedComment_1646403680" style="font-size:11px;color:gray;"></span>
							</small>
							<p>&nbsp;
								<hr />
							</p>
							<div id="CommentLoading_1646403680" style="display: none;">
								<p style="width: 100%;"><img src="imgs/loading_video.gif" style="width:20px;box-shadow: none;height: 20px;"> Loading... </p>
							</div>
							<div id="commentEditBox_1646403680" style="display:none;">
								<textarea dir="auto" class="commentContent_EditBox" id="commEditBox_1646403680">hello</textarea>
								<div style="margin-bottom: 15px;margin-top: 5px;">
									<a href="javascript:void(0)" onclick="editComment_save('1646403680','')" class="default_flat_btn">Save</a>
									<a href="javascript:void(0)" onclick="editComment_cancel('1646403680')" class="silver_flat_btn">Cancel</a>
								</div>
							</div>
						</td>
						<td>
							<div class="dropdown">
								<a class="post_options dropdown-toggle" data-toggle="dropdown" style="float:right;" href="#"><span>•••</span></a>
								<ul class="dropdown-menu dropdown-menu-right" style="top:10px;color:#999;text-align: left;">

									<?php if (($record_row['user_id'] == $userID && $userID) || ($record_row_comment['user_id'] == $userID && $userID)) { ?>
										<li><?php
											echo "<a href='" . "?" . "Co=true&view_id=" . $record_row_comment['project_id'] . "&id_comm3nt_to_del=" . $record_row_comment[0] . "&e#add_comment" . "' >";
											//echo "<a href='". "projects_details.php?"."Co=true&view_id=".$record_row_comment[0]."&id_comm3nt_to_del=".$record_row_comment[0]."&e#add_comment". "' >";
											?></span> حذف <?php echo $record_row_comment['user_id'] == $userID ? " تعليقي " : " التعليق من مشروعي "; ?> </a></li>
									<?php } ?>
								</ul>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		<?php }  ?>

		<br>
		<form action="?view_id=<?php echo @$_REQUEST['view_id']; ?>&Ad=true#add_comment" method="post">
			<input name="input_user_id" type="hidden" required="required" value="<?php echo @$_SESSION['userID']; ?>" placeholder="user_id " title="user_id " />
			<input name="input_project_id" type="hidden" required="required" value="<?php echo @$_REQUEST['view_id']; ?>" placeholder="project_id " title="project_id " />
			<input name="input_date" type="hidden" required="required" value="<?php echo @date("m/d/Y H:i"); ?>" placeholder="date " title="date " />
			<table style="width:90%;" id="add_comment">
				<tr>
					<td> <input type="text" <?php echo $disable_form; ?> name="input_comment" required="required" id="myFilterList_oa_eInput" onkeyup="/* alert('Under Progress..'); */" placeholder="اكتب تعليقك هنا .." title="comment" /> </td>
					<td> <input name="input_submit_comment" type="submit" value="تعليق" /> </td>
				</tr>
			</table>
		</form>
	</div>
</div>