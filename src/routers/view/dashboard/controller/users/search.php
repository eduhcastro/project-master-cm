<?php include('src/includes/master/Header.include.php'); ?>
<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header p-3 pb-0">
          <h6 class="mb-1"><?= $lang["users_search_account_title_dashboard"] ?></h6>
          <p class="text-sm mb-0">
            <?= $lang["users_search_account_description_dashboard"] ?>
          </p>
        </div>
        <div class="card-body p-3">
          <label class="form-label">ID-Nick-Email-Login</label>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="1234 - Eduardo - eduardo@skiller.com">
          </div>
          <button class="btn bg-gradient-dark w-100 mb-0" id="find-user"> <?= $lang["users_search_account_button_dashboard"] ?></button>
        </div>
      </div>
    </div>
  </div>

  <?php include('src/includes/master/Footer.include.php'); ?>

  <script>
    $("#find-user").click(function() {

      const user = $("input").val();
      let type = "string";

      if (!isNaN(user)) {
        type = "int";
      }

      $.ajax({
        url: "/client/user/search",
        type: "POST",
        data: {
          user: user,
          type: type
        },
        success: function(data) {
          if (!data.status) {
            alert(data.msg);
            return;
          }
          window.location.href = "/dashboard/controller/users/edit-user?id=" + data.id;
        }
      });


    });
  </script>