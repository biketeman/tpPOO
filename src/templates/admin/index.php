<?php include "header.php" ?>


<div class="container content">
  <h3>Utilisateurs <a class="btn btn-default" href="/admin/users/add">Ajouter un user</a></h3>
  <hr>
  <div class="row">
    <div class="span5">
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Opérations</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data["users"] as $key => $value) { ?>
            <tr>
              <td><a href="/admin/users/update?id=<?php echo $value["id"] ?>"><?php echo $value["nom"] ?></a></td>
              <td><?php echo $value["email"] ?></td>
              <td><a href="/admin/users/update?id=<?php echo $value["id"] ?>">Editer</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include "footer.php" ?>
