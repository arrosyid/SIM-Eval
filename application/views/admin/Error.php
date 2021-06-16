<section class="content bg-white container text-center py-5" >
  <img src="<?= base_url() ?>assets/img/not_found.jpg"/>
  <h2 class="py-3"><?= $error_msg ?></h2>
  <p class="text-secondary lead"><?= $error_desc ?></p>
  <div class="py-2">
    <button type="button" class="btn btn-success">Request access</button>
    <button type="button" class="btn btn-outline-secondary">Import products</button>
  </div>
</section>