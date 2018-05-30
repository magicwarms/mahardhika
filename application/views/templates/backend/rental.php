<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title1 = 'Buat Data Rental Baru';
$actions = 'saverental';
$controller = 'rental';
if($getrental->id != NULL){
 $title1 = 'Perbaharui Data Rental';
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
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">Daftar Rental</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form Rental</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Nama</th>
                <th>Tahun</th>
                <th>Pintu</th>
                <th>Bag</th>
                <th>Seat</th>
                <th>Status</th>
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
                <th>Tahun</th>
                <th>Pintu</th>
                <th>Bag</th>
                <th>Seat</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              if(!empty($listrental)){
                foreach ($listrental  as $key => $rental) { 
                  $id = encode($rental->id);
                if($rental->status == 1){
                  $status = '<span class="uk-badge uk-badge-success">Available</span>';
                } else {
                  $status = '<span class="uk-badge uk-badge-danger">Not Available</span>';
                }
              ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><img class="img_thumb" src="<?php echo $rental->imageRENTAL;?>" alt="<?php echo $rental->name;?>"/></td>
                    <td><?php echo $rental->name; ?></td>
                    <td><?php echo $rental->year; ?></td>
                    <td><?php echo $rental->door; ?></td>
                    <td><?php echo $rental->bag; ?></td>
                    <td><?php echo $rental->seat; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo date('d F Y H:i', strtotime($rental->created_date));?></td>
                    <td><?php echo date('d F Y H:i', strtotime($rental->updated_date));?></td>
                    <?php
                    $icndel = '&#xE16C;';
                    $msg1 = 'Are you sure want to delete this data ?';
                    $msg2 = 'Are you sure want to change this data ?';
                    $url1 = 'mahardhikaadmin/'.$controller.'/actiondelete_rental/'.urlencode($id);
                    $url2 = 'mahardhikaadmin/'.$controller.'/index_rental/'.urlencode($id);
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
              <form method="post" name="formrental" action="<?php echo $url;?>" id="form_validation" enctype="multipart/form-data" class="uk-form-stacked">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                <?php echo form_hidden('id',encode($getrental->id),'hidden'); ?>
                <h2 class="heading_a">
                  Informasi Halaman Rental Mobil
                  <span class="sub-heading">Silakan masukkan informasi data halaman rental mobil anda sesuai form inputan dibawah.</span>
                </h2>
                <hr class="md-hr"/>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1">
                    <div class="md-card">
                      <div class="md-card-content">
                        <?php
                          if(!empty($getrental->imageRENTAL)){
                        ?>
                        <div class="uk-margin-bottom uk-text-center uk-position-relative">
                            <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Apakah anda yakin akan menghapus gambar ini?', function(){ document.location.href='<?php echo base_url().'mahardhikaadmin/'.$controller."/deleteimgrental/".encode($getrental->id); ?>'; });"></a>
                            <img src="<?php echo $getrental->imageRENTAL;?>" alt="<?php echo $getrental->name;?>" class="img_medium"/>
                        </div>
                        <?php } else { ?>
                          <?php echo form_upload('imgRENTAL','','class="md-input" required accept="image/png, image/jpg, image/jpeg"'); ?>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Nama<span class="req">*</span></label>
                      <input type="text" class="md-input" name="name" autocomplete value="<?php if($getrental->name) echo cetak($getrental->name); else echo set_value('name');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('name'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Tahun<span class="req">*</span></label>
                      <input type="number" class="md-input" name="year" autocomplete value="<?php if($getrental->year) echo cetak($getrental->year); else echo set_value('year');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('year'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Pintu<span class="req">*</span></label>
                      <input type="number" class="md-input" name="door" autocomplete value="<?php if($getrental->door) echo cetak($getrental->door); else echo set_value('door');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('door'); ?></p>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Bag Mobil<span class="req">*</span></label>
                      <input type="text" class="md-input" name="bag" autocomplete value="<?php if($getrental->bag) echo cetak($getrental->bag); else echo set_value('bag');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('bag'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Seat<span class="req">*</span></label>
                      <input type="number" class="md-input" name="seat" autocomplete value="<?php if($getrental->seat) echo cetak($getrental->seat); else echo set_value('seat');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('seat'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <?php
                        $checkdis= '';
                        if($getrental->status == 1) $checkdis = 'checked' ;
                      ?>
                      <input type="checkbox" data-switchery <?php echo $checkdis; ?> data-switchery-size="large" data-switchery-color="#d32f2f" name="status" id="switch_demo_large">
                      <label for="switch_demo_large" class="inline-label"><b>Aktifkan Mobil Rental</b></label>
                    </div>
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