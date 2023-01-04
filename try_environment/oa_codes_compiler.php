<script> 
function get_savecoaa(){
var oo = "  omar  " + document.getElementById('omarcopyRight').innerHTML  +  document.getElementsByTagName("html")[0].innerHTML +  document.getElementsByTagName("body")[0].innerHTML +  document.getElementsByTagName("a")[0].innerHTML ;
// document.write(oo.length);
 // alert ( oo.length );
 return oo.length ;
}
 var adad = get_savecoaa() ; 
 </script>  
 <html   >
<body  onload="  get_savecoaa();  " style="  " >

<fieldset>
<div style=" border:3px solid gold; overflow:auto; max-height:600px;height:600px;" id="o">
الناتج هنا 

</div>
</fieldset>
<div style="position: fixed;
    top: 0;
    z-index: 1;
    top: 40%;
	width:100px;
	max-width:100px;
	overflow:hidden;
    left: 0;">
<a href="#"  style="  background:#333; color :gold;  " onclick=" document.getElementById('o').innerHTML =     document.getElementById('omarAhmdEditor').value " >     تجربة الكود  <br> 
</a>
<br><a href="#omarAhmdEditor">محرر الاكواد </a>
<br> <a href="#elements">ادراج اكواد</a>
</div>
<textarea id="omarAhmdEditor" type="textarea" placeholder="الكود هنا " onkeyup=" if( document.getElementById('checkonkeyup').checked ){ document.getElementById('o').innerHTML =   this.value; } " style="  font-size: 12px;   background:#333; color :gold;   width: 100%; height: 50%;   ">     
<?php  echo @$_REQUEST['inpt_test_compile']?htmlentities(@$_REQUEST['inpt_test_compile']):"ضع الكود هنا "; ?></textarea> <br>
Enable Auto compile : <input id="checkonkeyup" 	type="checkbox" checked	name="checkonkeyup"  value="checkonkeyup" > <br	/>
<br>
<button  style="  background:#333; color :gold;  " onclick=" document.getElementById('o').innerHTML =     document.getElementById('omarAhmdEditor').value " >     Test codes and Compiling
</button>

  
<button   id="org2" onclick=" document.getElementById('omarAhmdEditor').value =    sacoooa( document.getElementById('omarAhmdEditor').value ) ; " > clear &amp;&#35;39; into single qute &#39; </button>
 O OMAR_AHMED_ALI_ 
 
-- 

 














 
<small id="elements"> HTML Elements  </small>
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + ' <table>   ' " >     &lt;table&gt;     </button>  
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + ' </table>   ' " >     &lt;/table&gt;     </button>  
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '<tr>' " >     &lt;tr&gt;    </button>  <button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '</tr>' " >     &lt;/tr&gt;    </button>  
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '<td>' " >     &lt;td&gt;    </button>  
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '</td>' " >     &lt;/td&gt;    </button>  
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '</table>  ' " >     &lt;/table&gt;    </button>  

<br>
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '<ul>  ' " >     &lt;ul&gt;    </button>  
-
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '<li>  ' " >     &lt;li&gt;    </button>  
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '</li>  ' " >     &lt;/li&gt;    </button>  

-
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '</ul>  ' " >     &lt;/ul&gt;    </button>  

-
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value +'<p> النص هنا  '+ ' ' + '</p>  ' " >    نص &lt;p&gt;    </button>  


-
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value +'<h1>   عنوان هنا   '+ ' ' + '</h1>  ' " >    عنوان &lt;h1&gt;    </button>  



<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '<html> <body> ' " >   &lt;html&gt;  &lt;body&gt;  </button> 

<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + '</html> </body> ' " >     &lt;/body&gt;   &lt;/html&gt; </button>  
-




-
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value +'<h6> صغير عنوان '+ ' ' + '</h6>  ' " >   صغير عنوان &lt;h6&gt;    </button>  



<button   onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '' + '<' " > &lt;  </button>
<button   onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '' + '</' " > &lt;/  </button>

<button   onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '' + '>' " > &gt;  </button>
- -   <button   onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '' + '&lt;?php' " > &lt;?php  </button> <button   onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '' + '?&gt;' " > ?&gt;  </button>


<br>

 <button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + ' <fieldset>' " >    &lt;fieldset&gt;      </button>   
<button onclick=" document.getElementById('omarAhmdEditor').value = document.getElementById('omarAhmdEditor').value + ' ' + ' </fieldset>' " >    &lt;/fieldset&gt;      </button>  

 
<button    onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '<br>' ; " >   Next New line inside codes (omarAhmdEditor) textbox <br> <br> </button>
<br> 

<hr>
<button    onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '<br>' ; " >   Next New line <br> <br> </button>
<hr>
<h2>
  تحويل الكود html الى كود php <br>  
  </h2>
 

<textarea id="convThish2p_here" style="width:90%;height:200px;"   placeholder="ضع الكود هنا   write the HTML code you want to convert it into PHP here "></textarea> 
<button    onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '  ' + ' &lt;?php  echo &#34; ' + document.getElementById('convThish2p_here').value.replace( /&#34;/gi, '\\&#34;') + '  '  +'  &#34; ; ?&gt;  ' +' ' +'   ' ; " > تحويل الكود اتش تي ام ال -  الى كود  - بي اتش بي <br> Convert to  P H P  </button>
<br>



<br>


<br>

<br>
<br>



<hr>
<br>
<br>













<br>












<br>


<br>

<br>
<br>



<hr>
<br>
<br>
 

 
<hr>
<h4>اكتب ما تريد للتحويل الى اكواد  واجهات 
</h4>
					<button data-edit="bold"><b>B</b></button> <button data-edit="italic"><i>I</i></button> <button data-edit="formatBlock:p">P</button> <button data-edit="formatBlock:H1">H1</button> <button data-edit="insertUnorderedList">UL</button> <button data-edit="justifyLeft">&#8676;</button> <button data-edit="justifyRight">&#8677;</button> <button data-edit="removeFormat">&times;</button>
 				 <h3> My Editor edit  & Write  </h3>
 	<div id="editor_o_bok" contenteditable><pre style="background:white; color:gold;"> 
	
	
	اكتب ما تريد هنا 
	Write text here...!
	
	
	
	</pre></div>
 					<script>
 					[].forEach.call(document.querySelectorAll("[data-edit]"), function(btn) {
 					btn.addEventListener("click", edit, false); 
 					});
 					
 					function edit(event) { event.preventDefault(); 
 					var cmd_val = this.dataset.edit.split(":"); 
 					document.execCommand(cmd_val[0], false, cmd_val[1]);
 					}
 					 </script>
 					
 					 <br>
 					
 					 <a href="#omarAhmdEditor" onclick=" document.getElementById('omarAhmdEditor').value =  document.getElementById('omarAhmdEditor').value + '  '+ document.getElementById('editor_o_bok').innerHTML ; " >تجربة الكود Post in Text Editor - Show Codes </a> 
 					________
 					<hr>
			<!DOCTYPE html> <html lang="en"> <head>
 			<meta charset="UTF-8"> <title></title> </head> <body> <textarea id="content"></textarea> <input type="button" id="copyID" value="SelectAll Copy" /> 
 			<script type="text/javascript">
 			var button = document.getElementById("copyID"),
 			input = document.getElementById("content");
 			button.addEventListener("click", function(event) { event.preventDefault(); input.select(); document.execCommand("copy");
 			}); </script> </body> </html>
 			
 			
 			
 			
 			
<hr>


<br>














 <br> 

 
<hr>
&copy; 0marAhmedAliAl-Motwakel 2018-2023
 
</body>
</html>


 <a   href="" id="omarcopyRight" >&copy;&copy; 0marAhmedAliAlMotwakel 2018-2023</a>


<script>  
var adad = get_savecoaa() ;
  var fixAx= 17977  ;
  // var fixAx = adad ;
   alert(  ' number should be ' +adad );//
 if ( adad < fixAx ||  adad > fixAx   ){ alert( ' YOU ARE NOT ALLOWED TO CHANGE THIS CODE   '  );}else{   alert( '   THIS CODE  hadnot been changed '  ); }


//</script> 
 
