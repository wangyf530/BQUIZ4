// JavaScript Document
function lof(x)
{
	location.href=x
}

function del(table, id){
	// confirm();
$.post("./api/del.php",{table,id},function(){
	location.reload();
})
}

