  <fieldset>
  <center>
  <br>
            <br>
           <br>
            الاسم :* <input name="input_name" type="search" required="required" value="<?php if (isset($row_to_be_changed['name'])) {
                                                                                        echo secure_outputs_oa($row_to_be_changed['name']);
                                                                                    } ?>" placeholder="Enter name ">
            <br>
            الايميل : *<input name="input_email" type="email" required="required" value="<?php if (isset($row_to_be_changed['email'])) {
                                                                                            echo secure_outputs_oa($row_to_be_changed['email']);
                                                                                        } ?>" placeholder="Enter email ">
            
            <br>
            المستخدم :* <input name="input_user_name" type="search" required="required" value="<?php if (isset($row_to_be_changed['user_name'])) {
                                                                                                echo secure_outputs_oa($row_to_be_changed['user_name']);
                                                                                            } ?>" placeholder="Enter user_name ">
			

            <br>
            الوصف عني :  <textarea name="input_description_profile"   required="required" value="" placeholder="Enter description_profile "><?php if (isset($row_to_be_changed['description_profile'])) {
                                                                                                            echo secure_outputs_oa($row_to_be_changed['description_profile']);
                                                                                                        } ?></textarea>
            <br>
            حالة الحساب :
            <select name="input_account_setting">
                <option title="Open" value="<?php if (isset($row_to_be_changed['account_setting'])) {
                                                echo secure_outputs_oa($row_to_be_changed['account_setting']);
                                            } ?>">
                    <?php if (isset($row_to_be_changed['account_setting'])) {
                        echo secure_outputs_oa($row_to_be_changed['account_setting']);
                    } ?>
                </option>
                <option title="Open" value="العامة">العامة</option>
                <option title="Closed" value="غير مفعل">غير مفعل</option>
            </select>
                
			 
				<br>
             كلمة المرور  :
            <input name="input_user_password" type="password" onkeyup="document.getElementById('notification_pass').innerHTML='سوف يتم تغير كلمة المرور القديمة ';" value="" placeholder="Enter user_password ">
            <span class="alert " id="notification_pass"></span>
            <br>																		

            <br>
</center>
</fieldset>