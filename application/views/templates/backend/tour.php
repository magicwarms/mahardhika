<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title1 = 'Buat Data Paket Tour Baru';
$actions = 'savetour';
$controller = 'tour';
if($gettour->id != NULL){
 $title1 = 'Perbaharui Data Paket Tour';
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
        <li class="uk-width-1-2 <?php echo $tab['data-tab']?>>"><a href="#">Daftar Paket Tour</a></li>
        <li class="uk-width-1-2 <?php echo $tab['form-tab']?>"><a href="#">Form Paket Tour</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Harga Tour</th>
                <th>Harga Pax</th>
                <th>Destinasi</th>
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
                <th>Harga Tour</th>
                <th>Harga Pax</th>
                <th>Destinasi</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              if(!empty($listtour)){
                foreach ($listtour  as $key => $tour) { 
                  $id = encode($tour->id);
                  ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><img class="img_thumb" src="<?php echo $tour->imageTOUR;?>" alt="<?php echo $tour->title;?>"/></td>
                    <td><?php echo $tour->title; ?></td>
                    <td>Rp. <?php echo number_format($tour->price_tour, 0,',','.'); ?></td>
                    <td>Rp. <?php echo number_format($tour->price_pax, 0,',','.'); ?></td>
                    <td><?php echo word_limiter($tour->destination, 12); ?></td>
                    <td><?php echo date('d F Y H:i', strtotime($tour->created_date));?></td>
                    <td><?php echo date('d F Y H:i', strtotime($tour->updated_date));?></td>
                    <?php
                    $icndel = '&#xE16C;';
                    $msg1 = 'Are you sure want to delete this data ?';
                    $msg2 = 'Are you sure want to change this data ?';
                    $url1 = 'mahardhikaadmin/'.$controller.'/actiondelete_tour/'.urlencode($id);
                    $url2 = 'mahardhikaadmin/'.$controller.'/index_tour/'.urlencode($id);
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
                <?php echo form_hidden('id',encode($gettour->id),'hidden'); ?>
                <h2 class="heading_a">
                  Informasi Halaman Paket Tour
                  <span class="sub-heading">Silakan masukkan informasi data halaman Paket Tour sesuai form inputan dibawah.</span>
                </h2>
                <hr class="md-hr"/>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1">Gambar Paket Tour
                    <?php echo form_upload('imgTOUR[]','','class="md-input" multiple accept="image/png, image/jpg, image/jpeg"');?>
                    <ul class="img-edit clearfix">
                      <?php 
                      if(!empty($gettour->map)){
                      foreach ($gettour->map as $key=> $value_img) { ?>
                        <li class="uk-position-relative">
                            <a href="#" class="uk-modal-close uk-close uk-close-alt uk-position-absolute" onclick="UIkit.modal.confirm('Apakah kamu yakin ingin menghapus gambar ini', function(){ document.location.href='<?php echo base_url().'mahardhikaadmin/'.$controller."/deleteimgtour/".encode($gettour->id).'/'.$gettour->imgs[$key]; ?>'; });"></a>
                              <img src="<?php echo $value_img; ?>" class="img_medium"/>
                        </li>
                        <br>
                      <?php } ?>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Judul<span class="req">*</span></label>
                      <input type="text" class="md-input" name="title" autocomplete value="<?php if($gettour->title) echo cetak($gettour->title); else echo set_value('title');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('title'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Harga Tour (tanpa Koma)</label>
                      <input class="md-input" type="number" name="price_tour" value="<?php if($gettour->price_tour) echo cetak($gettour->price_tour); else echo set_value('price_tour');?>" required>
                    </div>
                    <p class="text-red"><?php echo form_error('price_tour'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Harga Pax (tanpa Koma)</label>
                      <input class="md-input" type="number" name="price_pax" value="<?php if($gettour->price_pax) echo cetak($gettour->price_pax); else echo set_value('price_pax');?>" required>
                    </div>
                    <p class="text-red"><?php echo form_error('price_pax'); ?></p>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Max Pax<span class="req">*</span></label>
                      <input type="text" class="md-input" name="max_tour" autocomplete value="<?php if($gettour->max_tour) echo cetak($gettour->max_tour); else echo set_value('max_tour');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('max_tour'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Min Pax<span class="req">*</span></label>
                      <input class="md-input" type="number" name="min_tour" value="<?php if($gettour->min_tour) echo cetak($gettour->min_tour); else echo set_value('min_tour');?>" required>
                    </div>
                    <p class="text-red"><?php echo form_error('min_tour'); ?></p>
                  </div>
                  <div class="uk-width-medium-1-3 uk-margin-top">
                    <div class="parsley-row">
                      <label>Mulai Perjalanan<span class="req">*</span></label>
                      <input type="text" class="md-input" name="start_journey" autocomplete value="<?php if($gettour->start_journey) echo cetak($gettour->start_journey); else echo set_value('start_journey');?>"/>
                    </div>
                    <p class="text-red"><?php echo form_error('start_journey'); ?></p>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1 uk-margin-top">
                    <div class="parsley-row">
                      <label>Destinasi Paket Tour</label>
                      <br>
                      <textarea cols="30" rows="4" name="destination" class="md-input" id="wysiwyg_tinymces">
                        <?php
                        if($gettour->destination != ''){
                          echo cetak($gettour->destination);
                        } else { ?>
                        <li>
                          <h5 class="mt-2 mb-1"><span class="fa fa-play-circle"><strong> START HOTEL, PELABUHAN ATAU BANDARA</strong></span></h5>
                        </li>
                        <li>
                          <h5 class="mt-2 mb-1"><span class="fa fa-play-circle"></span><strong> DESTINASI PERJALANAN:</strong></h5>
                          <ul class="list list-inline list-icons">
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span> Wellcome to batam</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>Jembatan barelang</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>Wisata belanja terkini ( Tas, Parfum, Sofenir, Coklat dll )</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>Wisata permainan ( gocart, flyingfox, painball, cablesky, miniature rumah adat, dll)</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>Fresh seafood</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>Oleh-oleh khas batam ( cake layers, cake lain&rdquo;, kerupuk, dry seafood )</li>
                          </ul>
                        </li>
                      <?php } ?>
                      </textarea>
                    </div>
                    <p class="text-red"><?php echo form_error('destination'); ?></p>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1 uk-margin-top">
                    <div class="parsley-row">
                      <label>Include Paket Tour</label>
                      <br>
                      <textarea cols="30" rows="4" name="include" class="md-input" id="wysiwyg_tinymces_second">
                        <?php
                        if($gettour->include != ''){
                          echo cetak($gettour->include);
                        } else { ?>
                        <li class="col-md-6">
                          <h5 class="mt-2 mb-1"><span class="fa fa-play-circle"></span><strong> INCLUDE:</strong></h5>
                          <ul class="list list-inline list-icons">
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>BUS FULL AC</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>BIAYA PARKIR</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>MAKAN DRIVER</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>AIR MINERAL</li>
                          </ul>
                        </li>
                      <?php } ?>
                      </textarea>
                    </div>
                    <p class="text-red"><?php echo form_error('include'); ?></p>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-1 uk-margin-top">
                    <div class="parsley-row">
                      <label>Exclude Paket Tour</label>
                      <br>
                      <textarea cols="30" rows="4" name="exclude" class="md-input" id="wysiwyg_tinymces_third">
                        <?php
                        if($gettour->exclude != ''){
                          echo cetak($gettour->exclude);
                        } else { ?>
                        <li class="col-md-6">
                          <h5 class="mt-2 mb-1"><span class="fa fa-play-circle"></span><strong> EXCLUDE:</strong></h5>
                          <ul class="list list-inline list-icons">
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>TIP GUIDE</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>BIAYA TIKET WISATA</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>PENAMBAHAN JAM / DESTINASI</li>
                            <li class="list-inline-item"><span class="fa fa-asterisk"></span>BELANJA / MAKAN</li>
                          </ul>
                        </li>
                        <?php } ?>
                      </textarea>
                    </div>
                    <p class="text-red"><?php echo form_error('exclude'); ?></p>
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