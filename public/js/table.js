/** table隔行变色 鼠标移动变色
senfe("表格名称","奇数行背景","偶数行背景","鼠标经过背景","点击后背景");
**/
function senfe(o,a,b,c,d){
 var t=document.getElementById(o).getElementsByTagName("tr");
 for(var i=0;i<t.length;i++){
  
  t[i].style.backgroundColor=(t[i].sectionRowIndex%2==0)?a:b;
  /*
  t[i].onclick=function(){
   if(this.x!="1"){
    this.x="1";
    this.style.backgroundColor=d;
   }else{
    this.x="0";
    this.style.backgroundColor=(this.sectionRowIndex%2==0)?a:b;
   }
  }
  */
  t[i].onmouseover=function(){
   if(this.x!="1")this.style.backgroundColor=c;
  }
  t[i].onmouseout=function(){
   if(this.x!="1")this.style.backgroundColor=(this.sectionRowIndex%2==0)?a:b;
  }
 }
}

// 全选复选框
function selectAll() {
		for (var i = 0; i < document.getElementsByName("ids").length; i++) {
			document.getElementsByName("ids")[i].checked = document.getElementById("checkAll").checked;
		}
}
window.onload = function(){
	var inform = document.getElementsByTagName("select"); 
	/*console.log(inform);*/
	for (var i = 0; i < inform.length; i++) {
		    var index = inform[i].selectedIndex; // 选中索引
			 var val=inform[i].options[index].value;//当前页面select选中的值
			 var va2=inform[i].options[0].value;//当前页面selec第一个options的值 
			 var va3=inform[i].options[1].value;//当前页面selec第二个options的值 
			 /*console.log(va2);*/
			 if(va2==-1 && va3==0){
				 
				  if(val==-1){
				   inform[i].style.color="#999999"
				   }
					else{
						inform[i].style.color=""
						
						}
				 /*inform[i].style.color="#999999";*/
				 
				 }
			  else if(va2==-1 && va3==-2){
				   if(val==-1){
				   inform[i].style.color="#999999"
				   }
					else{
						inform[i].style.color=""
						}
					 }
				 else if(va2==-1 && va3==1){
					  if(val==-1){
				        inform[i].style.color="#999999"
				      }
					   else{
						inform[i].style.color=""
						}
					 
					 
					 }
				else if(va2 != -1 && va3!=0){
					if(val==0 ||val ==""){
				   inform[i].style.color="#999999"
				   }
					}
			   else if(va2=="" && va3==0){
					if(val ==""){
				   inform[i].style.color="#999999"
				   }
					}
			 
		}	
	} 
/*$(document).ready(function(){
 $("select").each(function(i){
	  var text = $(this).val(); 
	
	 
      if(text=="" ||text=="0" || text=="-1")
	      {   
		   $(this).css("color","#999999");	
		  }
		
			  else{ 
			       $(this).css("color","#666");
				  }
})
});*/