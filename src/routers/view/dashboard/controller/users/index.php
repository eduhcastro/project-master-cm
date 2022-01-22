<?php include('src/includes/master/Header.include.php'); ?>
<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">

    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('https://www.w3.org/WAI/content-images/wai-InvolveUsersAll/video-thumb-involving-users.png');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-4 pt-2"><?= $lang["users_accounts_list_dashboard"] ?></h5>
            <p class="text-white"><?= $lang["users_accounts_list_dashboard_description"] ?></p>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="list">
            <?= $lang["access"] ?>
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('https://www.w3.org/WAI/content-images/wai-InvolveUsersAll/video-thumb-involving-users.png');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-4 pt-2"><?= $lang["users_search_account_dashboard"] ?></h5>
            <p class="text-white"><?= $lang["users_search_account_dashboard_description"] ?></p>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="search">
            <?= $lang["access"] ?>
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('https://www.w3.org/WAI/content-images/wai-InvolveUsersAll/video-thumb-involving-users.png');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-4 pt-2"><?= $lang["users_accounts_ban_list_dashboard"] ?></h5>
            <p class="text-white"><?= $lang["users_accounts_ban_list_dashboard_description"] ?></p>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="list-banneds">
              <?= $lang["access"] ?>
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('https://www.w3.org/WAI/content-images/wai-InvolveUsersAll/video-thumb-involving-users.png');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-4 pt-2"><?= $lang["users_accounts_gms_list_dashboard"] ?></h5>
            <p class="text-white"><?= $lang["users_accounts_gms_list_dashboard_description"] ?></p>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="list-gms">
            <?= $lang["access"] ?>
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include('src/includes/master/Footer.include.php'); ?>