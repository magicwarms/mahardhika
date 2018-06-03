<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title1 = 'Buat Data Paket Promo Baru';
$actions = 'savepromo';
$controller = 'promo';
if($getpromo->id != NULL){
 $title1 = 'Perbaharui Data Paket Promo';
} 
$url = base_url().'mahardhikaadmin/'.$controller.'/'.$actions;
?>
<div class="uk-width-medium-1-1">
  <h4 class="heading_a uk-margin-bottom"><?php echo $title1;?></h4>

  <?php if (!empty($message)){ ?>
  <div class="uk-alert uk-alert-<?php echo $message['type']; ?>" data-uk-alert>
    <a href="#" class="uk-alert-close uk-close"></a>
    <h4><?php echo $message['title']; ?></h4>
    <?php echo $message['text']; ?>
  </div>
  <?php } ?>

  <div class="md-card">
    <div class="md-card-content">
      <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_4'}">
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">Daftar Paket Promo</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form Paket Promo</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              if(!empty($listpromo)){
                foreach ($listpromo  as $key => $promo) { 
                  $id = encode($promo->id);
                  ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><img class="img_thumb" src="<?php echo $promo->imagePROMO;?>" alt="<?php echo $promo->title;?>"/></td>
                    <td><?php echo $promo->title; ?></td>
                    <td><?php echo word_limiter($promo->desc, 12); ?></td>
                    <td><?php echo date('d F Y H:i', strtotime($promo->created_date));?></td>
                    <td><?php echo date('d F Y H:i', strtotime($promo->updated_date));?></td>
                    <?php
                    $icndel = '&#xE16C;';
                    $msg1 = 'Are you sure want to delete this data ?';
                    $msg2 = 'Are you sure want to change this data ?';
                    $url1 = 'mahardhikaadmin/'.$controller.'/actiondelete_promo/'.urlencode($id);
                    $url2 = 'mahardhikaadmin/'.$controller.'/index_promo/'.urlencode($id);
                    ?>
                    <td class="uk-text-center">
                      <a href="#" onclick="UIkit.modal.confirm('<?php echo $msg1; ?>', function(){ document.location.href='<?php echo site_url($url1);?>'; });"><i class="md-icon material-icons"><?php echo $icndel; ?></i></a>
                      <a href="#" onclick="UIkit.modal.confirm('<?php echo $msg2; ?>', function(){ document.location.href='<?php echo site_url($url2);?>'; });"><i class="md-icon material-icons">&#xE254;</i></a>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php } ?>
                </tbody>
              </table>
            </li>
            <!-- END LIST TOUR -->

            <!-- START FORM INPUT AREA -->
            <li>
              <form method="post" name="formtour" action="<?php echo $url;?>" id="form_validation" enctype="multipart/form-data" class="uk-form-stacked">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                <?php echo form_hidden('id',encode($getpromo->id),'hidden'); ?>
                <h2 class="heading_a">
                  Informasi Halaman Promo
                  <span class="sub-heading">Silakan masukkan informasi data halaman promo sesuai form inputan dibawah.</span>
                </h2>
                <hr class="md-hr"/>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1">Gambar Promo
                    <?php echo form_upload('imgPROMO[]','','class="md-input" multiple accept="image/png, image/jpg, image/jpeg"');?>
                    <ul class="img-edit clearfix">
                      <?php 
                      if(!empty($getpromo->map)){
                      foreach ($getpromo->map as $key=> $value_img) { ?>
                        <li class="uk-position-relative">
                            <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Apakah kamu yakin ingin menghapus gambar ini', function(){ document.location.href='<?php echo base_url().'mahardhikaadmin/'.$controller."/deleteimgpromo/".encode($getpromo->id).'/'.$getpromo->imgs[$key]; ?>'; });"></a>
                              <img src="<?php echo $value_img; ?>" class="img_medium"/>
                        </li>
                        <br>
                      <?php } ?>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1 uk-margin-top">
                    <div class="parsley-row">
                      <label>Judul<span class="req">*</span></label>
                      <input type="text" class="md-input" name="title" autocomplete value="<?php if($getpromo->title) echo cetak($getpromo->title); else echo set_value('title');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('title'); ?></p>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1 uk-margin-top">
                    <div class="parsley-row">
                      <label>Deskripsi Promo</label>
                      <br>
                      <textarea cols="30" rows="4" name="desc" class="md-input" id="wysiwyg_tinymces"><?php if($getpromo->desc) echo cetak($getpromo->desc); else echo set_value('desc');?></textarea>
                    </div>
                    <p class="text-red"><?php echo form_error('desc'); ?></p>
                  </div>
                </div>
                <div class="uk-width-medium-1-1 uk-margin-top">
                 <div class="uk-form-row">
                   <span class="uk-input-group-addon"><?php echo form_submit('submit', 'SAVE', 'class="md-btn md-btn-primary" id="show_preloader_md"'); ?></span>
                 </div>
               </div>
              </form>
             </div>
          </div>
        </li>
      </ul>