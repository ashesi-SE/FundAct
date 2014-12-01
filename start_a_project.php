<?php
	include("header.html");
?>

    <div class="container">
        <div class="row">
            <div class="title">Enter project details</div>
        </div>
        <div class="row">

        	<div class="col-lg-6">
	        	<form action="#" method="post">
	        		<div class="modal-body">
		              <div class="input-group">
		                <span class="input-group-addon">Name of project</span>
		                <input type="text" name="item" class="form-control" placeholder="Enter name of project">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Description</span>
		                <textarea name="description" class="form-control" rows="4" placeholder="Type in description of your project"></textarea>
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Category of project</span>
		                <input type="text" name="location" class="form-control" placeholder="Category">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Target Amount</span>
		                <input type="text" name="contact_name" class="form-control" placeholder="Enter your target amount">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Location</span>
		                <input type="text" name="contact_number" class="form-control" placeholder="Project location">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Website (Optional)</span>
		                <input type="email" name="contact_email" class="form-control" placeholder="URL of your project website">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Youtube promo video (Optional)</span>
		                <input type="email" name="contact_email" class="form-control" placeholder="URL of your promo video on youtube">
		              </div></br>
		              <label for="file"><h4>Select a poster image for your post</h4></label>
		              <input type="file" name="file" id="file"><br>
		              <input type="hidden" id="addTag" name="tag" value="">
		            </div>
		            <div class="modal-footer">
		              <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
	        	</form>
        	</div>
        </div>
    </div>

<?php
	include("footer.html");
?>