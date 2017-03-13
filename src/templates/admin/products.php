<?php include "header.php" ?>
  <style type="text/css">
	#procut-container{
		width: 100%;
		height: 70%;
		background-color: red;
		display: flex;
	}
	#products-container{
		width: 30%;
		height: 30%;
		border: 1px solid black;
	}
  </style>
</head>
<body>
<?php include "header.php" ?>
  <div class="row">
    <div class="span5">
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th>ID Du produit</th>
            <th>Prix du produit</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data["users"] as $key => $value) { ?>
 			<tr>
              <td><a href="/admin/users/update?id=<?php echo $value["id"] ?>"><?php echo $value["productID"] ?></a></td>
              <td><?php echo $value["productPrice"] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include "footer.php" ?>
