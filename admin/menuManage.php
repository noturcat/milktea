<style>

	.card-header{
		color: #502421;
	}

	.modal-content .modal-title{
        color: #502421;
		font-weight: bold;
    }

	.modal-body .btn-success{
        color: #FEF9C2;
        background: #502421;
        font-weight: bold;
        border: 1px solid #502421;
    }

    .modal-body .btn-success:hover{
        color: #FEF9C2;
        background: #502421;
        border: 1px solid #502421;
        font-weight: bold;
        text-shadow: #FC0 1px 0 10px;
    }
    
    .card-body .btn-primary{
        color: #FEF9C2;
        background: #502421;
        font-weight: bold;
        border: 1px solid #502421;
    }

    .card-body .btn-primary:hover{
        color: #FEF9C2;
        background: #502421;
        border: 1px solid #502421;
        font-weight: bold;
        text-shadow: #FC0 1px 0 10px;
    }

    .card-footer .btn-primary{
        color: #FEF9C2;
        background: #502421;
        font-weight: bold;
        border: 1px solid #502421;
    }

    .card-footer .btn-primary:hover{
        color: #FEF9C2;
        background: #502421;
        border: 1px solid #502421;
        font-weight: bold;
        text-shadow: #FC0 1px 0 10px;
    }

</style>

<div class="container-fluid" style="margin-top:98px">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
				<div class="card mb-3">
					<div class="card-header font-weight-bold" style="background-color:rgb(254 249 194);">
						Create New Item
				  	</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Name: </label>
								<input type="text" class="form-control" name="name" required>
							</div>
                            <div class="form-group">
								<label class="control-label">Price</label>
								<input type="number" class="form-control" name="price" required min="1">
							</div>	
							<div class="form-group">
								<label class="control-label">Category: </label>
								<select name="categoryId" id="categoryId" class="custom-select browser-default" required>
								<option hidden disabled selected value>None</option>
                                <?php
                                    $catsql = "SELECT * FROM `categories`"; 
                                    $catresult = mysqli_query($conn, $catsql);
                                    while($row = mysqli_fetch_assoc($catresult)){
                                        $catId = $row['categorieId'];
                                        $catName = $row['categorieName'];
                                        echo '<option value="' .$catId. '">' .$catName. '</option>';
                                    }
                                ?>
								</select>
							</div>
							
							<div class="form-group">
								<label for="image" class="control-label">Image</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="mx-auto">
								<button type="submit" name="createItem" class="btn btn-sm btn-primary"> Create </button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(254 249 194);">
							<tr style="color: #502421;">
									<th class="text-center" style="width:7%;">Cat. Id</th>
									<th class="text-center">Img</th>
									<th class="text-center" style="width:58%;">Item Detail</th>
									<th class="text-center" style="width:18%;">Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $sql = "SELECT * FROM `milktea`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $milkteaId = $row['milkteaId'];
                                    $milkteaName = $row['milkteaName'];
                                    $milkteaPrice = $row['milkteaPrice'];
                                    $milkteaCategorieId = $row['milkteaCategorieId'];

                                    echo '<tr>
                                            <td class="text-center">' .$milkteaCategorieId. '</td>
                                            <td>
                                                <img src="/peteat/img/milktea-'.$milkteaId. '.jpg" alt="image for this item" width="150px" height="150px">
                                            </td>
                                            <td>
                                                <p>Name : <b>' .$milkteaName. '</b></p>
                                                <p>Price : <b>' .$milkteaPrice. '</b></p>
                                            </td>
                                            <td class="text-center">
												<div class="row mx-auto" style="width:120px">
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$milkteaId. '">Edit</button>
													<form action="partials/_menuManage.php" method="POST">
														<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
														<input type="hidden" name="milkteaId" value="'.$milkteaId. '">
													</form>
												</div>
                                            </td>
                                        </tr>';
                                }
                            ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<?php 
    $milkteasql = "SELECT * FROM `milktea`";
    $milkteaResult = mysqli_query($conn, $milkteasql);
    while($milkteaRow = mysqli_fetch_assoc($milkteaResult)){
        $milkteaId = $milkteaRow['milkteaId'];
        $milkteaName = $milkteaRow['milkteaName'];
        $milkteaPrice = $milkteaRow['milkteaPrice'];
        $milkteaCategorieId = $milkteaRow['milkteaCategorieId'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $milkteaId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $milkteaId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(254 249 194);">
        <h5 class="modal-title" id="updateItem<?php echo $milkteaId; ?>">Item Id: <?php echo $milkteaId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" id="milkteaId" name="milkteaId" value="<?php echo $milkteaId; ?>">
					<br>
					<button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/peteat/img/milktea-<?php echo $milkteaId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
				</div>
			</div>
		</form>
		<form action="partials/_menuManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $milkteaName; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
				<div class="form-group col-md-6">
                	<b><label for="price">Price</label></b>
                	<input class="form-control" id="price" name="price" value="<?php echo $milkteaPrice; ?>" type="number" min="1" required>
				</div>
				<div class="form-group col-md-6">
					<b><label for="catId">Category Id</label></b>
                	<input class="form-control" id="catId" name="catId" value="<?php echo $milkteaCategorieId; ?>" type="number" min="1" required>
				</div>
            </div>
            <input type="hidden" id="milkteaId" name="milkteaId" value="<?php echo $milkteaId; ?>">
            <button type="submit" class="btn btn-success" name="updateItem">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	}
?>