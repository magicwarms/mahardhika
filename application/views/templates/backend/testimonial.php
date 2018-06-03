<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title1 = 'Buat Data Testimonial Baru';
$actions = 'savetesti';
$controller = 'testimonial';
if($gettesti->id != NULL){
 $title1 = 'Perbaharui Data Testimonial';
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
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">Daftar Testimonial</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form Testimonial</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Testimoni</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Testimoni</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              if(!empty($listtestimonial)){
                foreach ($listtestimonial  as $key => $testi) { 
                  $id = encode($testi->id);
              ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><img class="img_thumb" src="<?php echo $testi->imageTESTI;?>" alt="<?php echo $testi->name;?>"/></td>
                    <td><?php echo $testi->name; ?></td>
                    <td><?php echo $testi->position; ?></td>
                    <td><?php echo word_limiter($testi->testimoni, 12); ?></td>
                    <td><?php echo date('d F Y H:i', strtotime($testi->created_date));?></td>
                    <td><?php echo date('d F Y H:i', strtotime($testi->updated_date));?></td>
                    <?php
                    $icndel = '&#xE16C;';
                    $msg1 = 'Are you sure want to delete this data ?';
                    $msg2 = 'Are you sure want to change this data ?';
                    $url1 = 'mahardhikaadmin/'.$controller.'/actiondelete_testimonial/'.urlencode($id);
                    $url2 = 'mahardhikaadmin/'.$controller.'/index_testimonial/'.urlencode($id);
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
              <form method="post" name="formtesti" action="<?php echo $url;?>" id="form_validation" enctype="multipart/form-data" class="uk-form-stacked">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                <?php echo form_hidden('id',encode($gettesti->id),'hidden'); ?>
                <h2 class="heading_a">
                  Informasi Halaman Testimonial
                  <span class="sub-heading">Silakan masukkan informasi data halaman testimonial anda sesuai form inputan dibawah.</span>
                </h2>
                <hr class="md-hr"/>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1">
                    <div class="md-card">
                      <div class="md-card-content">
                        <?php
                          if(!empty($gettesti->imageTESTI)){
                        ?>
                        <div class="uk-margin-bottom uk-text-center uk-position-relative">
                            <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Apakah anda yakin akan menghapus gambar ini?', function(){ document.location.href='<?php echo base_url().'mahardhikaadmin/'.$controller."/deleteimgtestimonial/".encode($gettesti->id); ?>'; });"></a>
                            <img src="<?php echo $gettesti->imageTESTI;?>" alt="<?php echo $gettesti->name;?>" class="img_medium"/>
                        </div>
                        <?php } else { ?>
                          <?php echo form_upload('imgTESTI','','class="md-input" required accept="image/png, image/jpg, image/jpeg"'); ?>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Nama<span class="req">*</span></label>
                      <input type="text" class="md-input" name="name" autocomplete value="<?php if($gettesti->name) echo cetak($gettesti->name); else echo set_value('name');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('name'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Jabatan<span class="req">*</span></label>
                      <input type="text" class="md-input" name="position" autocomplete value="<?php if($gettesti->position) echo cetak($gettesti->position); else echo set_value('position');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('position'); ?></p>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1 uk-margin-top">
                    <div class="parsley-row">
                      <label>Testimoni Pelanggan</label>
                      <br>
                      <textarea cols="30" rows="4" name="testimoni" class="md-input"><?php if($gettesti->testimoni) echo cetak($gettesti->testimoni); else echo set_value('testimoni');?></textarea>
                    </div>
                    <p class="text-red"><?php echo form_error('testimoni'); ?></p>
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