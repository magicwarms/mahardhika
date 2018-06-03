<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title1 = 'Buat Data Slider Baru';
$actions = 'saveslider';
$controller = 'slider';
if($getslider->id != NULL){
 $title1 = 'Perbaharui Data Slider';
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
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">Daftar Slider</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form Slider</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Title 1</th>
                <th>Title 2</th>
                <th>Title 3</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Title 1</th>
                <th>Title 2</th>
                <th>Title 3</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              if(!empty($listslider)){
                foreach ($listslider  as $key => $slider) { 
                  $id = encode($slider->id);
              ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><img class="img_thumb" src="<?php echo $slider->imageSLIDER;?>" alt="<?php echo $slider->title2;?>"/></td>
                    <td><?php echo $slider->title1; ?></td>
                    <td><?php echo $slider->title2; ?></td>
                    <td><?php echo $slider->title3; ?></td>
                    <td><?php echo date('d F Y H:i', strtotime($slider->created_date));?></td>
                    <td><?php echo date('d F Y H:i', strtotime($slider->updated_date));?></td>
                    <?php
                    $icndel = '&#xE16C;';
                    $msg1 = 'Are you sure want to delete this data ?';
                    $msg2 = 'Are you sure want to change this data ?';
                    $url1 = 'mahardhikaadmin/'.$controller.'/actiondelete_slider/'.urlencode($id);
                    $url2 = 'mahardhikaadmin/'.$controller.'/index_slider/'.urlencode($id);
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
            <!-- END LIST SLIDER -->

            <!-- START FORM INPUT AREA -->
            <li>
              <form method="post" name="formslider" action="<?php echo $url;?>" id="form_validation" enctype="multipart/form-data" class="uk-form-stacked">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                <?php echo form_hidden('id',encode($getslider->id),'hidden'); ?>
                <h2 class="heading_a">
                  Informasi Halaman Slider
                  <span class="sub-heading">Silakan masukkan informasi data halaman slider anda sesuai form inputan dibawah.</span>
                </h2>
                <hr class="md-hr"/>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1">
                    <div class="md-card">
                      <div class="md-card-content">
                        <?php
                          if(!empty($getslider->imageSLIDER)){
                        ?>
                        <div class="uk-margin-bottom uk-text-center uk-position-relative">
                            <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Apakah anda yakin akan menghapus gambar ini?', function(){ document.location.href='<?php echo base_url().'mahardhikaadmin/'.$controller."/deleteimgtestimonial/".encode($getslider->id); ?>'; });"></a>
                            <img src="<?php echo $getslider->imageSLIDER;?>" alt="<?php echo $getslider->name;?>" class="img_medium"/>
                        </div>
                        <?php } else { ?>
                          <?php echo form_upload('imgSLIDER','','class="md-input" required accept="image/png, image/jpg, image/jpeg"'); ?>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Title Pertama<span class="req">*</span></label>
                      <input type="text" class="md-input" name="title1" autocomplete value="<?php if($getslider->title1) echo cetak($getslider->title1); else echo set_value('title1');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('title1'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Title Kedua<span class="req">*</span></label>
                      <input type="text" class="md-input" name="title2" autocomplete value="<?php if($getslider->title2) echo cetak($getslider->title2); else echo set_value('title2');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('title2'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Title Ketiga<span class="req">*</span></label>
                      <input type="text" class="md-input" name="title3" autocomplete value="<?php if($getslider->title3) echo cetak($getslider->title3); else echo set_value('title3');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('title3'); ?></p>
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