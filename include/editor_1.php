<div class="container-fluid edit-Mcontainer no-padding full-height">
    <div id="print" class="row full-height " style=" width:100%;margin:0px;">
        <div class="col-sm-6" style="padding:0px"><textarea id="editor" cols="" rows=""><?php
                    if($sel_lang_name == "php" ){
                        echo"<?php \n echo'Hello world!, Welcome to Php'; \n?>";
                    }elseif($sel_lang_name == "python"){
                        echo'print("Hello World!, Welcome to python")';
                    }
                    elseif($sel_lang_name == "c"){
                        echo"#include <stdio.h>\n"; 
                        echo"\n";
                        echo"int main() {\n";
                        echo"   printf(\"Hello World!, Welcome to C\");\n"; 
                        echo"   return 0;\n";
                        echo"}"; 
                    }
                    elseif($sel_lang_name == "c++"){
                        echo"#include <iostream>\n";
                        echo"\n";
                        echo"int main() {\n";
                        echo"   std::cout << \"Hello World!, Welcome to C++\";\n";
                        echo"   return 0;\n";
                        echo"}";
                    }
                    else{
                        echo"Hello";
                    }
                ?></textarea></div>
        <div class="col-sm-6" style="padding:0px">
            <div class="output-tag">OUTPUT:</div>
            <div id="output"></div>
        </div>
    </div>
</div>
