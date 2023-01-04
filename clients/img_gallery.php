<?php include_once "../control/img_gallery.php"; ?>

<p id="galleryAll"> &nbsp; </p>
<style type="text/css">
	.o_cart .btn-readMore {
		background: #0078D4
			/*rgb(254,139,121)darkorange*/
		;
		color: white;
	}

	#omMdal .btn-readMore {
		height: 100%;
		border: 0;
		background: white;
		color: #333;
	}

	.o_cart div {
		overflow: hidden;
		color: gray;
	}

	#omMdal div {
		height: 100%;
		border: 0;
	}

	.btn-readMore {
		padding: 10px;
		margin: 10px;
		border: 2px solid darkpink;
		width: 95%;
		border-radius: 20px;
	}

	.btn-readMore:hover,
	.btn-readMore:active {
		background: #ccc;
		color: black;
	}

	.o_cart {
		background: white;
		align: middle;
		text-align: center;
		float: left;
		padding: 5px;
		margin: 10px;
		overflow: hidden;
		border: 3px solid #f8f8f8;
		border-radius: 1px;
		/* 1 CART */
		/*  width:90%; height:400px; */
		/* 2 CART */
		width: 45%;
		height: 380px;
		/* 3 CART */
		/* 	width:28%; height:380px;   */
		/* 4 CART */
		/*	width:20%; height:380px; */
		/* 5 CART */
		/* width:15%; height:380px; */

		/* Default size cart */
		/* width:300px ; height:300px; */

	}

	/* 1 CART */
	/*  width:90%; height:400px; */
	/* 2 CART */
	/* width:45%; height:380px;  */
	/* 3 CART */
	/* 	width:28%; height:380px;   */
	/* 4 CART */
	/*	width:20%; height:380px; */
	/* 5 CART */
	/* width:15%; height:380px; */

	/* Default size cart */
	/* width:300px ; height:300px; */

	.o_cart img {
		border: 1px solid #ccc;
		border-radius: 5px;
		padding: 5px;
		width: 90%;
		height: 300px;
		/* max-height:60%; */
		/* defult of 300px */
		/* width:250px; height:200px; */
	}

	.cart-btn:hover,
	.cart-btn:active,
	.box-shadow {
		-webkit-box-shadow: rgba(0, 0, 0, 0.20) 8px 8px 8px;
	}

	.cart-btn:hover,
	.cart-btn:active,
	.text-shadow {
		text-shadow: 4px 4px 8px black;
	}

	/* #643590 */
	.cart-btn:hover,
	.cart-btn:active {
		font-weight: bolder;
		background: rgba(0, 0, 0, 0.65);
	}

	.cart-btn {
		background: #0078D4;
		color: white;
		border: 2px solid #333;
		border-radius: 2px;
		padding: 9px;
		margin: 5px;
	}
</style>
<center>
	<?php
	//	echo " <button class=\"btn-readMore\" title=\" 1 CART \" onclick=\" document.getElementsByClassName('o_cart')[0].style.width=&#39;90%&#39;;   \" > 	CART 1  </button> ";
	?>

	<fieldset style="width:80%;">

		<?php
		$c1 = "";
		$c2 = "";
		$c3 = "";
		$c4 = "";
		$c5 = "";
		$countNmt = 0;
		if (@$v_num_pic_row <= 0) {
		} else {
			while ($v_pic_row = $database->fetch_array($v_pic_result)) {

				echo "<div ";
				echo " onclick=\" document.getElementById('omMdal').innerHTML = this.innerHTML; document.getElementById('myBtn').onclick(); \"  ";
				echo " class=\"o_cart\">";
				echo "<div class=\"border2\" style=\"height:300px;  width:auto;  \"> ";
				if (strstr($v_pic_row['fkid'], "imgN_projects_tb_rec_record__")) {
					echo  " <a title=' Open Projec ' href='projects_details?view_id=" . str_replace("imgN_projects_tb_rec_record__", "", $v_pic_row['fkid']) . "' >  ";
				}
				if (!empty($v_pic_row['srcfi'])) {
					$g = sec_outpt(trim($v_pic_row['srcfi']));
					// 	echo  " <a title=' Open Image Full Size ' href='$g' > <img  src='$g'  />  Image Full Size  </a> ";
					echo  "  <img  src='$g'  />      ";
				}
				if (strstr($v_pic_row['fkid'], "imgN_projects_tb_rec_record__")) {
					echo  "   </a> ";
				} else {
					echo  " <a title=' Open Image Full Size ' href='$g' >  Image Full Size  </a> ";
				}
				echo "<p>";
				// echo   sec_outpt( trim($v_pic_row['fkid'] )) ;  
				echo "</p>";
				echo "</div>";

				// echo "<cccs style=' background:white; padding:10px auto; color:White;  height:300px; width:100%; '> 
				echo " <button class=\"btn-readMore\" title=\" View All Details \" onclick=\" this.style.display=&#39;none&#39;; document.getElementById('omMdal').innerHTML = this.parentElement.innerHTML ; document.getElementById('myBtn').onclick();   this.style.display=&#39;block&#39;;   /* this.parentElement.parentElement.innerHTML */  \" > 
				 
				..عرض &gt;&gt; </button> ";

				// echo "</cccs> "; 
				echo "  </div>";

				$c1 .= " document.getElementsByClassName('o_cart')[" . $countNmt . "].style.width=&#39;90%&#39;; ";
				$c2 .= " document.getElementsByClassName('o_cart')[" . $countNmt . "].style.width=&#39;45%&#39;; ";
				$c3 .= " document.getElementsByClassName('o_cart')[" . $countNmt . "].style.width=&#39;28%&#39;; ";
				$c4 .= " document.getElementsByClassName('o_cart')[" . $countNmt . "].style.width=&#39;20%&#39;; ";
				$c5 .= " document.getElementsByClassName('o_cart')[" . $countNmt . "].style.width=&#39;15%&#39;; ";
				//	$c1 .= " document.getElementsByClassName('o_cart')[". $countNmt ."].style.width=&#39;90%&#39;; ";

				$countNmt++;
			} // end while
		} // end if


		?>
		<p>&nbsp;</p>

	</fieldset>
	<?php echo " <fieldset id='btns_carts'>
							   <button class=\"cart-btn\" title=\" 1 CART \" onclick=\" " . $c1 . "   \" > 
							CART 1  </button> ";
	echo " <button class=\"cart-btn\" title=\" 2 CART \" onclick=\" " . $c2 . "   \" > 
							CART 2  </button> ";
	echo " <button class=\"cart-btn\" title=\" 3 CART \" onclick=\" " . $c3 . "   \" > 
							CART 3  </button> ";
	echo " <button class=\"cart-btn\" title=\" 4 CART \" onclick=\" " . $c4 . "   \" > 
							CART 4 </button> ";
	echo " <button class=\"cart-btn\" title=\" 5 CART \" onclick=\" " . $c5 . "   \" > 
							CART 5  </button>  
							</fieldset> 
							<script>
								
							// document.getElementById('btns_carts_1').innerHTML =	document.getElementById('btns_carts').innerHTML ;
							</script>
							";

	?>

</center>
<br>
<hr>




<style>
	/* body {font-family: Arial, Helvetica, sans-serif;}
							*/
	/* The Modal (background) */
	.modal {
		display: none;
		/* Hidden by default */
		position: fixed;
		/* Stay in place */
		z-index: 1;
		/* Sit on top */
		padding-top: 100px;
		/* Location of the box */
		left: 0;
		top: 0;

		width: 100%;
		/* Full width */
		height: 100%;
		/* Full height */
		overflow: auto;
		/* Enable scroll if needed */
		background-color: rgb(0, 0, 0);
		/* Fallback color */
		background-color: rgba(0, 0, 0, 0.5);
		/* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
	}


	#omMdal {
		max-height: 80%;
		overflow: auto;
	}

	#omMdal img {
		overflow: auto;
		align: middle;
		text-align: center;
		float: left;
		border: 1px solid #ccc;
		border-radius: 5px;
		padding: 5px;
		width: 90%;
		height: 200px;
	}

	/*#omMdal > fieldset { height:auto; padding:20px auto; margin:20px auto; } 
							*/
	/* #omMdal > .btn-readMore {  display:none; }
							*/
	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
</style>


<!-- Trigger/Open The Modal -->
<!--<button id="myBtn">Open Modal</button>-->

<!-- The Modal -->
<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<div id="omMdal" class="modal-content"> </div>
		<p>Some text in the Modal.. <button style="float:right;" onclick=" this.parentElement.parentElement.parentElement.style.display=&#39;none&#39;; /* document.getElementById('myModal').style.display='none'; */ "> <span class="close">&times; CLOSE
				</span> </button>
		</p>
		<!--	<span class="close">&times; CLOSE </span>-->
	</div>
	<br><br><br><br><br>
</div>

<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>