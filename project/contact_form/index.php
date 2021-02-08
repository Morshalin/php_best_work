<?php 
	$path = dirname(__FILE__);
	include $path.'/../../inc/header.php'; 
?>
<button id="mbtn"  class="btn btn-primary turned-button">Contact Us</button>

    <div id="modalDialog" class="modal ">
    <div class="modal-dialog modal-md">
    <div class="modal-content animate-top">
        <div class="modal-header">
            <h5 class="modal-title">Contact Us</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="post" id="contactFrm">
        <div class="modal-body">
            <!-- Form submission status -->
            <div class="response"></div>
			
            <!-- Contact form -->
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required="">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required="">
            </div>
            <div class="form-group">
                <label>Message:</label>
                <textarea name="message" id="message" class="form-control" placeholder="Your message here" rows="6"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
</div>
</div>
<?php 
	$path = dirname(__FILE__);
	include $path.'/../../inc/footer.php';
 ?>
 


 <script>
// // Get the modal
var modal = $('#modalDialog');

// Get the button that opens the modal
var btn = $("#mbtn");

// Get the <span> element that closes the modal
var span = $(".close");

$(document).ready(function(){
    // When the user clicks the button, open the modal 
    btn.on('click', function() {
        modal.show();
    });
    
    // When the user clicks on <span> (x), close the modal
    span.on('click', function() {
        modal.hide();
    });
});

// When the user clicks anywhere outside of the modal, close it
$('body').bind('click', function(e){
    if($(e.target).hasClass("modal")){
        modal.hide();
    }
});
</script>

<script>
$(document).ready(function(){
    $('#contactFrm').submit(function(e){
        e.preventDefault();
        $('.modal-body').css('opacity', '0.5');
        $('.btn').prop('disabled', true);
        
        $form = $(this);
        $.ajax({
            type: "POST",
            url: 'ajax_submit.php',
            data: 'contact_submit=1&'+$form.serialize(),
            dataType: 'json',
            success: function(response){
                if(response.status == 1){
                    $('#contactFrm')[0].reset();
                    $('.response').html('<div class="alert alert-success">'+response.message+'</div>');
                }else{
                    $('.response').html('<div class="alert alert-danger">'+response.message+'</div>');
                }
                $('.modal-body').css('opacity', '');
                $('.btn').prop('disabled', false);
            }
        });
    });
});
</script>