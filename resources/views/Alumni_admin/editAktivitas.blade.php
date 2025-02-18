@include('alumni_admin.head')
<hr>
<h1 id="judul">Edit Saya</h1>
<section id="welcome" class="tm-section">

            <form action="{{url('simpan/aktivitasEdit')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id_mhs" value="{{$data->id_mahasiswa}}">
                <input type="hidden" name="id_dok" value="{{$foto->id_alumnidok}}">
                <img src="{{url('imgs')}}/{{$foto->file}}" width="250"><br>
                <input  id="uploadFile" placeholder="Pilih File..." disabled="disabled" />
                
                <div class="fileUpload btn btn-primary">
                    <span>Choose file</span>
                    <input name="foto" id="uploadBtn" type="file" class="upload" />
                </div>
                <div class="form-group">
                    <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Keterangan" required>{{$foto->keterangan}}</textarea>
                </div>
                <div class="fileUpload btn btn-primary">
                    <span>Upload</span>
                    <input id="uploadBtn" type="submit" class="upload" />
                </div>
                <hr>
            </form>

        </section>

@include('alumni_admin.foot')