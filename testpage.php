<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container my-5">
  
<h3>Bootstrap 4 HTML5 form validation demo</h3>
  <p><a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLSelectElement/checkValidity">Learn more about form validation via MDN </a></p>
  <p><a href="http://getbootstrap.com/docs/4.1/components/forms/#validation">Bootstrap 4 form validation class documentation </a></p>
  
  
<hr>

  <div class="card bg-light">
<form class="card-body" novalidate="" action="" method="" id="bootstrapForm">
  
    <div class="form-group">
        <label class="h4 form-control-label" for="input1">Company name<abbr class="text-danger" title="This is required">*</abbr></label>
        <input type="text" class="form-control" name="i1" id="input1" required>
        <div class="valid-feedback">Company name looks good</div>
        <div class="invalid-feedback">Please enter your company name. This field is required</div>
    </div>
  
  
    <div class="form-group">
        <label class="h4 form-control-label" for="input1">Phone<abbr class="text-danger" title="This is required">*</abbr></label>
        <input type="tel" placeholder="123-456-7890"
           pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" name="i1" id="input1" required>
        <div class="valid-feedback">Phone # looks good</div>
        <div class="invalid-feedback">Please enter a phone # like 123-456-7890. This field is required.</div>
    </div>
  
    <div class="form-group">
        <label class="h4 form-control-label" for="input3">Website<abbr class="text-danger" title="This is required">*</abbr></label>
        <input type="url" placeholder="https://" class="form-control" name="i3" id="input3" required>
        <div class="valid-feedback">Website looks good.</div>
        <div class="invalid-feedback">Please enter a valid URL. This field is required.</div>
    </div>

  
  
    <div>
        <button type="button" class="btn btn-secondary">Send Form</button>
    </div>  
  
</form>


</div>
<!-- /.card -->

</div>
<!-- /.container -->
<?php include('footer.php'); ?>
<script>
$(".btn-secondary").click(function(event) {

// make selected form variable
var vForm = $("#bootstrapForm");

if (vForm[0].checkValidity() === false) {
  event.preventDefault()
  event.stopPropagation()
} else {
 
  // Replace alert with ajax submit here...
  alert("your form is valid and ready to send");
  
}

// Add bootstrap 4 was-validated classes to trigger validation messages
vForm.addClass('was-validated');


});

</script>