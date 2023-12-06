
<div class="web_editor">
<div class="col-sm-12 outerBox">
<div class="col-sm-6 leftBox">
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        HTML
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body" id="htmlEditor" contenteditable="true" onkeyup="showPreview()" >
      &lt;h1&gt; HELLO WORLD !! &lt;/h1&gt; <br>
      &lt;button type="button" <br>
      onclick="showDate()"&gt; <br>
      Click me to display Date and Time.&lt;/button&gt; <br>
      &lt;p id ="demo"&gt; &lt;/p&gt; <br>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        CSS
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body" id="cssEditor" contenteditable="true" onkeyup="showPreview()" >
        h1{ <br>
          color : red; <br>
        }<br>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        JAVASCRIPT
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body" id="jsEditor" contenteditable="true" onkeyup="showPreview()">
      function showDate(){ <br>
        document.getElementById('demo').innerHTML = Date() <br>
      }<br>
      </div>
    </div>
  </div>
</div>
</div>
<div  class="col-sm-6 rightBox">
    <div id="print"><iframe id="preview"></iframe><div>
</div>
</div>
</div>
<script>
 showPreview();
</script>