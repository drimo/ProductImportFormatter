<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/style.css" />
	<title>Upload page</title>
</head>
<body>
	<div class="container">

        <div class="page-header">
            <div class="row">
                <div class="col-md-10">
                    <h1>Import Categories</h1>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-info btn-block" data-toggle="collapse" data-target="#divHelp">
                        <span class="glyphicon glyphicon-question-sign"></span> Help
                    </button>
                </div>
            </div>

            <div id="divHelp" class="collapse well">
                <h2>Instructions for Importing Categories</h2>
                <ol>
                    <li>Download the Category Export .csv from Americommerce. Use the "Full Export" field option when creating the export file.</li>
					<li>Press the "Choose File" button below to select the .csv that was downloaded from Americommerce</li>
					<li>Press the "Upload" button</li>
                </ol>
            </div>
        </div>

		<div class="panel panel-default">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">
                        <?php
							//Upload File
							if (isset($_POST['submit'])) {

								if(!file_exists($_FILES['filename']['tmp_name']) || !is_uploaded_file($_FILES['filename']['tmp_name'])) {
									print "<div class='alert alert-danger' role='alert'>No file selected</div>";
								} else {
									//http://coyotelab.org/php/upload-csv-and-insert-into-database-using-phpmysql.html
									include('config.php');  //Connect to Database

									$deleterecords = "TRUNCATE TABLE Categories"; //empty the table of its current records
									mysql_query($deleterecords);

									//Import uploaded file to Database
									$handle = fopen($_FILES['filename']['tmp_name'], "r");

									while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
										$import="INSERT into Categories(CategoryId,CategoryList) values('$data[0]','$data[10]')";

										mysql_query($import) or die(mysql_error());
									}

									fclose($handle);

									print "<div class='alert alert-success' role='alert'>Imported successfully</div>";
								}

								//view upload form
							}else {
							?>
								<form enctype='multipart/form-data' action='import.php' method='post'>
									<div class="row">
										<div class="col-md-12">
											<h3>Upload new csv by browsing to file and clicking on Upload</h3>
										</div>
									</div>

									<div class="row">
										<div class="col-md-2">
											<label>File name to import</label>
										</div>
										<div class="col-md-10">
											<input size='50' type='file' name='filename'>
										</div>
									</div>

									<div class="row" style="margin-top: 20px;">
										<div class="col-md-2">
										</div>
										<div class="col-md-3">
											<input type='submit' name='submit' value='Upload' class="btn btn-primary btn-block btn-lg">
										</div>
									</div>
								</form>
							<?php
							}
						?>
                    </div>
                </div>

				

            </div>
        </div>

		<div class="row">
			<div class="col-md-10">
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-default btn-block btn-lg" onclick="window.location='../index.html'">
                    <span class="glyphicon glyphicon-arrow-left"></span> Return
                </button>
			</div>
		</div>

	</div>
</body>
</html>
