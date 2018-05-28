<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="uk-width-medium-1-1">
  <h4 class="heading_a uk-margin-bottom">Daftar Kontak</h4>
  <div class="md-card">
    <div class="md-card-content">
      <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_4'}">
        <li class="uk-width-1-1 uk-active>"><a href="#">Daftar Kontak</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
      <!-- START LIST CONTACT -->
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Judul</th>
                  <th>Masukan</th>
                  <th>Dibuat</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Judul</th>
                <th>Masukan</th>
                <th>Dibuat</th>
              </tr>
            </tfoot>
            <tbody>
            <?php 
            if(!empty($listcontact)){
              foreach ($listcontact  as $key => $contact) {
            ?>
             <tr>
                <td><?php cetak($key+1); ?></td>
                <td><?php cetak($contact->name); ?></td>
                <td><?php cetak($contact->email); ?></td>
                <td><?php cetak($contact->subject); ?></td>
                <td><?php cetak($contact->desc);?></td>
                <td><?php cetak(date('d F Y', strtotime($contact->created_date)));?></td>
              </tr>
            <?php } ?>
            <?php } ?>
            </tbody>
          </table>
        </li>
        <!-- END LIST CONTACT -->
      </ul>
    </div>
  </div>
</div>