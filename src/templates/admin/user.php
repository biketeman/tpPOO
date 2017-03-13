<?php include "header.php" ?>
<div class="container content">
  <h3><?php echo value($data, "nom") ?></h3>
  <hr>
  <div class="row">
    <form method="post" class="form-horizontal">
      <div class="form-group">
        <div class="col-md-6">
            <h6><strong>Nom</strong></h6>
            <input value="<?php echo value($data, "nom") ?>" name="nom" placeholder="Nom" class="form-control input-md" type="text">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-6">
            <h6><strong>Email</strong></h6>
            <input value="<?php echo value($data, "email") ?>" name="email" placeholder="E-mail" class="form-control input-md" type="text">
        </div>
      </div>
      <hr>
      <button type="submit" class="btn btn-default">Submit</button>
      <br>
    </form>
  </div>
</div>
<?php include "footer.php" ?>
