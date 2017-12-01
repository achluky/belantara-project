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
                
                {if isset($data.alert) and ($data.alert != '')}
                <div class="callout callout-info">
                  <h4>Info!</h4>
                  <p>{$data.alert}</p>
                </div>
                {/if}

                <div class="box box-primary">
                  <div class="box-body box-primary">
                    {if isset($data.error_msg) and ($data.error_msg != '')}
                    <div class="callout callout-info">
                      <h4>Info!</h4>
                      <p>{$data.error_msg}</p>
                    </div>
                    {/if}

                    <form role="form" data-toggle="validator" action="{base_url()}grant/profil/save" name="" method="POST" >
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id_biodata" value="{(isset($data.profil->id_biodata))?$data.profil->id_biodata:''}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Nama Depan</label>
                                            <input type="input" class="form-control" id="judul" name="nama_depan" placeholder="" value="{(isset($data.profil->nama_depan))?$data.profil->nama_depan:''}" required>
                                            <p class="text-danger">Misal: Arif</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Nama Belakang</label>
                                            <input type="input" class="form-control" id="judul" name="nama_belakang" placeholder="" value="{(isset($data.profil->nama_belakang))?$data.profil->nama_belakang:''}" required>
                                            <p class="text-danger">Misal: Rahman</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">No HP</label>
                                            <input type="number" class="form-control" id="judul" name="no_hp" placeholder="" value="{(isset($data.profil->no_hp))?$data.profil->no_hp:''}" required>
                                            <p class="text-danger">Misal: 0856 9208 5423</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Email</label>
                                            <input type="email" class="form-control" id="judul" name="email" placeholder="" value="{(isset($data.profil->email))?$data.profil->email:''}" required>
                                            <p class="text-danger">Misal: arif.rahman@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Jabatan</label>
                                            <input type="input" class="form-control" id="judul" name="jabatan" placeholder="" value="{(isset($data.profil->email))?$data.profil->email:''}" required>
                                            <p class="text-danger">Misal: Manajer Lapangan Proyek Laskep Sumatera II</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Nama Lembaga</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_nama" placeholder="" value="{(isset($data.profil->lembaga_nama))?$data.profil->lembaga_nama:''}" required>
                                            <p class="text-danger">Misal: Yayasan Sumatera Abdi</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Alamat Lembaga</label>
                                            <textarea class="form-control" name="lembaga_alamat" required>{(isset($data.profil->lembaga_alamat))?$data.profil->lembaga_alamat:''}</textarea>
                                            <p class="text-danger">Diisi dengan alamat kantor pusat nasional</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Propinsi</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_provinsi" placeholder="" value="{(isset($data.profil->lembaga_provinsi))?$data.profil->lembaga_provinsi:''}" required>
                                            <p class="text-danger">Misalkan: Lampung</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Kota/Kabupaten</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_kota" placeholder="" value="{(isset($data.profil->lembaga_kota))?$data.profil->lembaga_kota:''}" required>
                                            <p class="text-danger">Misalkan: Majalengka</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Kecamatan</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_kecamatan" placeholder="" value="{(isset($data.profil->lembaga_kecamatan))?$data.profil->lembaga_kecamatan:''}" required>
                                            <p class="text-danger">Misalkan: Talaga</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Kode Pos</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_kodepos" placeholder="" value="{(isset($data.profil->lembaga_kodepos))?$data.profil->lembaga_kodepos:''}" required>
                                            <p class="text-danger">Misalkan: 12344</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Tahun Pendirian</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_tahun_berdiri" placeholder="" value="{(isset($data.profil->lembaga_tahun_berdiri))?$data.profil->lembaga_tahun_berdiri:''}" required>
                                            <p class="text-danger">Misalkan: 1999</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Bidang Umum Kegiatan</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_bidang_kegiatan" placeholder="" value="{(isset($data.profil->lembaga_bidang_kegiatan))?$data.profil->lembaga_bidang_kegiatan:''}" required>
                                            <p class="text-danger">Misalkan: Pembagunan Masyarakat</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Profil Singkat</label>
                                            <textarea class="form-control" name="lembaga_profil" required>{(isset($data.profil->lembaga_profil))?$data.profil->lembaga_profil:''}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Telepon</label>
                                            <input type="number" class="form-control" id="judul" name="lembaga_telpon" placeholder="" value="{(isset($data.profil->lembaga_telpon))?$data.profil->lembaga_telpon:''}" required>
                                            <p class="text-danger">Misalkan: 02134433</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Faximili</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_faxmili" placeholder="" value="{(isset($data.profil->lembaga_faxmili))?$data.profil->lembaga_faxmili:''}" required>
                                            <p class="text-danger">Misalkan: 021233233</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Email</label>
                                            <input type="email" class="form-control" id="judul" name="lembaga_email" placeholder="" value="{(isset($data.profil->lembaga_email))?$data.profil->lembaga_email:''}" required>
                                            <p class="text-danger">Misalkan: info@yaysan.com</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Website</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_web" placeholder="" value="{(isset($data.profil->lembaga_web))?$data.profil->lembaga_web:''}" required>
                                            <p class="text-danger">Misalkan: http://sumatera.tropis.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" id="agree" required> 
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description"> &nbsp; Informasi yang diberikan adalah benar dan sesuai ketentuan perundangan yang berlaku</span>
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right simpan"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
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