{extends file="admin/template_dashboard_grant.tpl"} 


{block name="addon_styles"}
{/block}

{block name="breadcrumb"}
      <i class="glyphicon glyphicon-home"></i> &nbsp;
	  {$stopbreadcrumb = 0}
      {foreach $data.breadcrumb as $label => $value}
		{if $stopbreadcrumb++ < count($data.breadcrumb)-1}
			<li><a href="{$value}">{$label}</a></li>
		{else}
			<li>{$label}</li>
		{/if}
      {/foreach}
{/block}


{block name="content"}
      <div class="row"> 
          <div class="col-xs-12">
                
                <div class="box box-primary">
                  <div class="box-body box-primary">

                    {if isset($data.alert) and ($data.alert != '')}
                    <div class="callout callout-info">
                      <h4>Info!</h4>
                      <p>{$data.alert}</p>
                    </div>
                    {/if}

                    <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/edit/2/{$data.grant_proyek->id_grant}/save" name="" method="POST" >

                        <div class="box-header">
                            <h3 class="box-title">2. Ringkasn Proyek <small>Input Proposal Baru</small> </h3>
                            <hr/>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" id="id_grant" name="id_grant" placeholder="" value="{(isset($data.grant_proyek->id_grant))?$data.grant_proyek->id_grant:''}" >
                                    <input type="hidden" class="form-control" id="id_grant_proyek" name="id_grant_proyek" placeholder="" value="{(isset($data.grant_proyek->id_proyek))?$data.grant_proyek->id_proyek:''}" >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Judul Proposal</label>
                                            <textarea class="form-control" id="judul" name="proyek_judul" placeholder="" required>{(isset($data.grant_proyek->proyek_judul) )?$data.grant_proyek->proyek_judul:''}</textarea>
                                            <p class="text-danger">Judul Proposal yang akan di-submit</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Lansekap</label>
                                            <input type="input" class="form-control" id="judul" name="proyek_lansekap" placeholder="" value="{(isset($data.grant_proyek->proyek_lansekap) )?$data.grant_proyek->proyek_lansekap:''}" required>
                                            <p class="text-danger">Misal: Nilai Lasekap</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Propinsi</label>
                                            <input type="input" class="form-control" id="judul" name="proyek_provinsi" placeholder="" value="{(isset($data.grant_proyek->proyek_provinsi) )?$data.grant_proyek->proyek_provinsi:''}" required>
                                            <p class="text-danger">Misal: Jawa Barat</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Kabupaten/Kota</label>
                                            <input type="input" class="form-control" id="judul" name="proyek_kota" placeholder="" value="{(isset($data.grant_proyek->proyek_kota) )?$data.grant_proyek->proyek_kota:''}" required>
                                            <p class="text-danger">Misal: Cimahi</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Kecamatan</label>
                                            <input type="input" class="form-control" id="judul" name="proyek_kecamatan" placeholder="" value="{(isset($data.grant_proyek->proyek_kecamatan) )?$data.grant_proyek->proyek_kecamatan:''}" required>
                                            <p class="text-danger">Misal: Tanjung</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Desa/Kelurahan</label>
                                            <input type="input" class="form-control" id="judul" name="proyek_desa" placeholder="" value="{(isset($data.grant_proyek->proyek_desa) )?$data.grant_proyek->proyek_desa:''}" required>
                                            <p class="text-danger">Misal: Cisolok</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Tanggal Mulai</label>
                                            <input type="datetime" class="form-control" id="judul" name="proyek_tgl_mulai" placeholder="" value="{(isset($data.grant_proyek->proyek_tgl_mulai) )?$data.grant_proyek->proyek_tgl_mulai:''}" required>
                                            <p class="text-danger">Misal: 24-04-1988</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Proyeksi Durasi Implementasi</label>
                                            <input type="input" class="form-control" id="judul" name="proyek_durasi" placeholder="" value="{(isset($data.grant_proyek->proyek_durasi) )?$data.grant_proyek->proyek_durasi:''}" required>
                                            <p class="text-danger">Misal: 2 Tahun</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Penerima Manfaat</label>
                                            <textarea class="form-control" id="judul" name="proyek_manfaat" placeholder="" required>{(isset($data.grant_proyek->proyek_manfaat) )?$data.grant_proyek->proyek_manfaat:''}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Luasan Dampak</label>
                                            <input type="input" class="form-control" id="judul" name="proyek_luas_dampak" placeholder="" value="{(isset($data.grant_proyek->proyek_luas_dampak) )?$data.grant_proyek->proyek_luas_dampak:''}" required>
                                            <p class="text-danger">Dalam Hektar (Ha)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!--  -->
                                            <label for="inputEmail3" class="control-label">Tematik Kegiatan</label><br>
                                            {foreach $data.tematik_kegiatan->result() as $row}
                                            <input type="checkbox" class="custom-control-input" name="proyek_tematik_kegiatan[{$row->id_tematik}]" {(in_array($row->id_tematik, $data.proyek_tematik_kegiatan))?'checked':''}><span class="custom-control-description"> {$row->name}</span>
                                            <br/>
                                            {/foreach}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Kategori Kegiatan</label><br>
                                            {foreach $data.kategori_kegiatan->result() as $row}
                                            <input type="checkbox" class="custom-control-input" name="proyek_kategori_kegiatan[{$row->id_kegiatan}]" {(in_array($row->id_kegiatan, $data.proyek_kategori_kegiatan))?'checked':''}><span class="custom-control-description"> {$row->name} </span><br>
                                            {/foreach}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <br/>
                            <div class="btn-group pull-right">
                                <a href="{base_url()}grant/aplikasi/edit/1/{$data.grant_proyek->id_grant}" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-chevron-left"></i> Sebelumnya</a>
                                <button type="submit" class="btn btn-info pull-right"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                            </div>

                        </div><!-- /.box-footer -->
                        <br/><br/>
                    </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
{/block}