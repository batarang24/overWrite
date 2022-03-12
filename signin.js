var bt=document.getElementById("signin");
bt.addEventListener('click',process);
function process(ev){
    var form=document.getElementById("forms");
    var input=form.getElementsByTagName("input");
    var length=(input.length)-1;
    //alert(length);
    datas={};
    for (var i =0; i <= length; i++) {
        
        var key=input[i].name;
        
        var value=input[i].value;
        switch (key) {
            case "username":
                datas.username=value;
                break;
        
            case "email":
                datas.email=value;
                break;
            case "pass":
                datas.password=value;
                break;
        }
        
        
    }
    datas.type="signin";
    var datass=JSON.stringify(datas);
    sends();
    //alert(datass);

    function sends() {
        var xhr= new XMLHttpRequest();
        console.log(xhr);
        
        xhr.onload=function () {
            if(xhr.readyState==4 || xhr.status==200){
                receive(xhr.responseText);
            }
        }
        xhr.open('POST','api.php',true);
        xhr.send(datass);
    }
   
    function receive(info){       
        //var text=document.getElementById('textfield');
        //alert(info);
        var infos=JSON.parse(info);
        //alert(info);
         

        if(infos.type=="true"){
            window.location='index.php'; 
        }
        else{
            var sicomment=document.getElementById('sicomment');
            sicomment.innerHTML=infos.message;            
        }
    }

    
    //alert(datass)
    //}
}


