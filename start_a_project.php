<?php
	include("header.html");
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title" style="text-align: center">
                    <h1>Enter project details</h1>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-3"></div>
        	<div class="col-lg-6">
	        	<form action="#" method="post">
	        		<div class="modal-body">
		              <div class="input-group">
		                <span class="input-group-addon">Name of Social Entreprenuer</span>
		                <input type="text" name="owner_fn" class="form-control" placeholder="First name">
		                <input type="text" name="owner_ln" class="form-control" placeholder="Last name">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Name of project</span>
		                <input type="text" name="title" class="form-control" placeholder="Enter name of project">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Description</span>
		                <textarea name="description" class="form-control" rows="3" placeholder="Type in description of your project"></textarea>
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Category of project</span>
		                <input type="text" name="category" class="form-control" placeholder="Category">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Target Amount</span>
		                <input type="text" name="target_amount" class="form-control" placeholder="Enter your target amount">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Location</span>
		                <input type="text" name="location" class="form-control" placeholder="Project location">
		              </div></br>
		              <!-- this doesn't have a field in the database yet -->
		              <div class="input-group">
		                <span class="input-group-addon">Website (Optional)</span>
		                <input type="text" name="contact_email" class="form-control" placeholder="URL of your project website">
		              </div></br>
		              <div class="input-group">
		                <span class="input-group-addon">Youtube video (Optional)</span>
		                <input type="text" name="video" class="form-control" placeholder="URL of your promo video on youtube">
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
        	<div class="col-lg-3"></div>
        </div>
    </div>

<?php
	include("footer.html");
	include("fundact.php");

	$obj = new fundact();

	if(isset($_REQUEST["title"])){
		$title = $_REQUEST["title"];
		$owner_fn = $_REQUEST["owner_fn"];
		$owner_ln = $_REQUEST["owner_ln"];
		$description = $_REQUEST["description"];
		$category = $_REQUEST["category"];
		$target_amount = $_REQUEST["target_amount"];
		$v_url = $_REQUEST["video"];

		//no means of taking in a picture yet ... later
		if (!$obj->add_projects($owner_fn, $owner_ln, $title, $description, $category, $target_amount, $v_url)) {
			echo "Error: could not insert into the database";
			exit();
		}

	}
?>