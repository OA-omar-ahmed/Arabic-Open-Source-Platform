             
     		
			كلمة المرور  الحالية 
			<input name="input_user_password" type="password" required="required" value="<?php if (isset($row_to_be_changed['user_password'])) {
                                                                                            echo secure_outputs_oa($row_to_be_changed['user_password']);
                                                                                        } ?>" placeholder="Enter user_password ">				
				<br>
             كلمة المرور الجديدة:
            <input name="new_input_user_password" type="password" onkeyup="document.getElementById('notification_pass').innerHTML='سوف يتم تغير كلمة المرور القديمة ';" value="" placeholder="Enter user_password ">
            <span class="alert " id="notification_pass"></span>
            <br>																		
   تاكيد كلمة المرور الجديدة:
            <input name="new_input_user_password_conf" type="password" onkeyup="document.getElementById('notification_pass').innerHTML='سوف يتم تغير كلمة المرور القديمة ';" value="" placeholder="Enter user_password ">
            <span class="alert " id="notification_pass"></span>
            <br>																		
 