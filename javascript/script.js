function codeEditorCall() {
    //code here...
    var code = $("#editor")[0];
    var editor = CodeMirror.fromTextArea(code, {
        lineNumbers: true,
        mode: "text/x-php",
        indentUnit: 4,
        indentWithTabs: true,
        matchBrackets: true
    });

    editor.on('change', (editor) => {
        document.getElementById('editor').innerText = editor.doc.getValue();
        console.log("text");
        // return text;
    });
}

function change_lang() {
    var value = $("#lang").val();
    var url = window.location.href;
    var new_url = url.split("=")[0] + "=" + value;
    // alert(new_url);
    window.location.href = new_url;
    codeEditorCall();
}

function formValidation() {
    var name =
        document.forms.RegForm.uname.value;
    var email =
        document.forms.RegForm.uemail.value;
    var password =
        document.forms.RegForm.password.value;
    var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;


    if (name == "") {
        document.getElementById('name_warning').innerHTML = "Please enter your name properly.";
        return false;
    }

    if (email == "" || !regEmail.test(email)) {
        document.getElementById('email_warning').innerHTML = "Please enter a valid e-mail address.";
        return false;
    }

    if (password == "") {
        document.getElementById('pass_warning').innerHTML = "Please enter your valid password";
        return false;
    }

    // if(password.length<6){
    //     document.getElementById('pass_warning').innerHTML = "Password should be atleast 6 character long";
    //     return false;

    // }
    return true;
}



function runCode() {
    
    $.ajax({

        url: "/CodeOnline/compiler.php",

        method: "POST",

        data: {
            language: $("#lang").val(),
            code: $("#editor").val() 
        },
        
        error: function(){
			alert("Some Error occured");
		},

        success: function (response) {
            if(response.length<1000){
                 $("#output").text(response);
            }else{
                 $("#output").text("Error!!!");
            }
           
        }
    })

}

function copyCode() {
    var copied_code = document.getElementById("editor");
    copied_code.select();
    navigator.clipboard.writeText(copied_code.value);
    alert("Copied the Code");
}

function saveCode(uid,currlang,currlangname){   
    let file_name = prompt("Please enter your File name:","Helloworld"); 
    sessionStorage.setItem("tempCode", $('#editor').val()) ;
    let tempCode = sessionStorage.getItem("tempCode");
    var time = Date.now();
    var u_id = uid ; 
    var lang = currlang;
    var langname = currlangname;
    // alert(tempCode);
    $.ajax({
		url:'function.php',
		type:"POST",
		data:{funct:'saveCode',filename:file_name, uid:u_id, code:tempCode, time:time , lang:lang , langname:langname},
		async: false,
		error: function(){
			alert("Some Error occured");
		},
		success: function(response) {
			//location.replace(response);
            alert(response);
		}
	});
}

function getPDF(){

    var HTML_Width = $("#print").width();
    var HTML_Height = $("#print").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width+(top_left_margin*2);
    var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;
    
    var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
    

    html2canvas($("#print")[0],{allowTaint:true}).then(function(canvas) {
        canvas.getContext('2d');
        
        console.log(canvas.height+"  "+canvas.width);
        
        
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
        
        
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        
        pdf.save("code.pdf");
    });
};

function showPreview() {
    var content = " ";
    content += "<style>" + document.getElementById("cssEditor").innerText + "<\/style>";
    content += "<script>" + document.getElementById("jsEditor").innerText + "<\/script>";
    content += "<body>"+document.getElementById("htmlEditor").innerText+"<\/body>";

    var doc = document.getElementById('preview').contentWindow.document;
    doc.open();
    doc.write("<html><head><title></title></head>" + content + "</html>");
    doc.close();
    // document.getElementById("preview").src = "data:text/html; Charset=UTF-8, <html>" + content + "<\/html>";
}



